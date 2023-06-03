<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Course;
use App\Models\User;

class ReservationManagementController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $reservations = Reservation::orderBy('date')->orderBy('start_time')->get();

        return view('admin.reservations.index', compact('reservations'));
    }

    /**
     * delete reservations
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
            return redirect()->route('admin.reservations.index');

        } else {
            return back();
        }
    }
}
