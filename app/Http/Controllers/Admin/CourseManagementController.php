<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        // 登録・編集フォームのセッション削除
        $request->session()->forget(['title', 'duration', 'summary']);
        $courses = Course::all();

        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // dd($request->all());

        // セッションにデータを保存
        session(['title' => $request->title]);
        session(['duration' => $request->duration]);
        session(['summary' => $request->summary]);

        $validatedData = $request->validate([
            'image' => ['required'],
            'title' => ['required', 'max:15'],
            'duration' => ['required'],
            'summary' => ['required', 'max:70']
        ]);
        
        // 画像データをstorageディレクトリへ保存
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/images', $filename);
    
        $course = new Course;
        $course->image_path = 'images/' . $filename;
        $course->title = $request->title;
        $course->summary = $request->summary;
        $course->duration = $request->duration;
    
        $course->save();

        // セッション削除
        $request->session()->forget(['title', 'duration', 'summary']);

        return view('admin.courses.store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) 
    {   
        $course = Course::find($id);

        return view('admin.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());

        // セッションにデータを保存
        session(['title' => $request->title]);
        session(['duration' => $request->duration]);
        session(['summary' => $request->summary]);

        $validatedData = $request->validate([
            'title' => ['required', 'max:15'],
            'duration' => ['required'],
            'summary' => ['required', 'max:70']
        ]);

        $course = Course::find($id);

        if ($request->hasFile('image')) {
            $imagePath = $course->image_path; // 現状の画像ファイルのパスを取得
            Storage::disk('public')->delete($imagePath); // 画像ファイルをstorageディレクトリから削除

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $filename); // storageディレクトリへ保存
            $course->image_path = 'images/' . $filename; // データベースへ保存
        }

        $course->title = $request->title;
        $course->duration = $request->duration;
        $course->summary = $request->summary;
        $course->save();

        // セッション削除
        $request->session()->forget(['title', 'duration', 'summary']);

        return view('admin.courses.update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();

        $imagePath = $course->image_path; // 画像ファイルのパスを取得
        Storage::disk('public')->delete($imagePath); // 画像ファイルをstorageディレクトリから削除

        return redirect()->route('admin.courses.index');
    }
}
