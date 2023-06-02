<x-users.app>
    <div id="secoundary-container" class="wrapper">
    <h1 class="reservation-history-title">予約履歴</h1>
        <div class="reservation-history-container">
            <form action="{{ route('reservations.destroy') }}" method="POST" id="deleteForm">
                @csrf
                <table class="reservation-history-table">
                    <thead>
                        <tr class="th-bg">
                            <th></th>
                            <th>日付</th>
                            <th>開始時刻</th>
                            <th>終了時刻</th>
                            <th>講座名</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $reservation)
                            <tr>
                                <td><input type="checkbox" name="ids[]" value="{{ $reservation->id }}"></td>
                                <td>{{ $reservation->date }}</td>
                                <td>{{ \Carbon\Carbon::parse($reservation->start_time)->format('H:i') }}</td>
                                <td>{{ \Carbon\Carbon::parse($reservation->end_time)->format('H:i') }}</td>
                                <td>{{ $reservation->course->title }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="delete-button-container">
                    <button type="submit" class="delete-button">
                        <span class="material-symbols-outlined">delete</span>キャンセル
                    </button>
                </div>
            </form>
        </div>
    </div> 
</x-users.app>  
        