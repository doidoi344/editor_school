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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        // dd($request);
        $reservations = Reservation::orderBy('date')->orderBy('start_time')->get();

        $keyword = $request->keyword;
        // 全角スペースを半角に変換
        $space_conversion = mb_convert_kana($keyword, 's');
        $keyword_array = explode(" ", $space_conversion);
        if(!empty($keyword_array)) {
            foreach ($keyword_array as $key) {
                $query = Reservation::orderBy('date')->orderBy('start_time');
                $query->where('date', 'LIKE', "%{$key}%")
                ->orWhereHas('user', function ($query) use ($key) {
                    $query->where('name', 'LIKE', "%{$key}%");
                });
                $reservations = $query->get();
            }

        }

        return view('admin.reservations.index', compact('reservations', 'keyword'));
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
