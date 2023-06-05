<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Course;
use App\Models\User;
use App\Mail\ReservationCompleted;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($userId)
    {
        $reservations = Reservation::where('user_id', $userId)->orderBy('date')->orderBy('start_time')->get();

        return view('reservations.index', compact('reservations'));
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function eventsIndex()
    {
        $reservations = Reservation::all();

        // FullCalendar用の予約データを作成
        $events = [];
        foreach ($reservations as $reservation) {
            $event = [
                'title' => '予約済',
                'start' => $reservation->date . 'T' . $reservation->start_time, // 開始日時
                'end' => $reservation->date . 'T' . $reservation->end_time, // 終了日時
            ];
            $events[] = $event;
        }

        return response()->json($events);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            // バリデーションルールの定義
            'date' => 'required',
            'course' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',

        ]);
    
        if ($validator->fails()) {
            $errors = $validator->errors();
            return Response::json(['errors' => $errors]);
        }


        // 予約の重複チェック
        $date = $request->date;
        $start_time = $request->start_time;
        $end_time = $request->end_time;

        $existingReservation = Reservation::where('date', $date)
        ->where(function ($query) use ($start_time, $end_time) {
            $query->where(function ($query) use ($start_time, $end_time) {
                $query->where('start_time', '<', $end_time)
                    ->where('end_time', '>', $start_time);
            })
            ->orWhere(function ($query) use ($start_time, $end_time) {
                $query->where('start_time', '>=', $start_time)
                    ->where('start_time', '<', $end_time);
            })
            ->orWhere(function ($query) use ($start_time, $end_time) {
                $query->where('end_time', '>', $start_time)
                    ->where('end_time', '<=', $end_time);
            })
            ->orWhere(function ($query) use ($start_time, $end_time) {
                $query->where('start_time', '<', $start_time)
                    ->where('end_time', '>', $end_time);
            });
        })
        ->first();
        

        if ($existingReservation) {
            $errors = '選んだ時刻はすでに予約が埋まっています。';
            return Response::json(['errors' => ['text' => $errors]]);
        }

        // 営業時間内かどうかのチェック
        if($end_time >= 19) {
            $errors = '営業時間外のためコースを選びなおしてください。';
            return Response::json(['errors' => ['text' => $errors]]);
        }
        

        // フォームデータから必要な値を取得
        $date = $request->date;
        $course = $request->course;
        $start_time = $request->start_time;
        $end_time = $request->end_time;
        $user_id = $request->userId;

        // 講座一覧から該当のレコード情報を抽出
        $course = Course::where('title', $request->course)->first();

        // Reservationsテーブルにデータを保存する
        $reservation = new Reservation();
        $reservation->date = $date;
        $reservation->start_time = $start_time;
        $reservation->end_time = $end_time;
        $reservation->user_id = $user_id;
        $reservation->course_id = $course->id;
        
        $reservation->save();

        // メール送信処理
        $user_name = auth()->user()->name;
        $user_email = auth()->user()->email;
        $course_title = $request->course;

        $data = ['user_name' => $user_name,
                 'date' => $date,
                 'course_title' => $course_title,
                 'start_time' => $start_time,
                 'end_time' => $end_time
                ];

        // 実行する時にコメントアウト解除        
        // Mail::to($user_email)->send(new ReservationCompleted($data));

        return response()->json();

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
        //
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
        //
    }

    /**
     * Delete reservation 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if(isset($request->ids)) {
            $reservation_ids = $request->ids;

            foreach($reservation_ids as $reservation_id) {
                $reservation = Reservation::find($reservation_id);
                $reservation->delete();
            }
            return view('reservations.destroy');

        } else {
            // キャンセル操作取消
            return back();
        }
    }
}
