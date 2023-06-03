<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {   
        if(isset($request->ids)){

            $userIds = $request->ids;

            foreach ($userIds as $id) {
                $user = User::find($id);
                $user->reservations()->delete(); // userに紐づく予約データを削除
                $user->delete();
            }
            return redirect()->route('admin.users.index');

        } else {
            return back();
        }
    }
}
