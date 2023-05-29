<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservationManagementController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.reservations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $request
     * @return void
     */
    public function destroy(Request $request)
    {
        // 処理のみ
    }
}
