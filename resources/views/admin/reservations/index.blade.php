<x-admins.app>
    <div id="secoundary-container" class="wrapper">
        <div class="search-container">   
            <h1 class="reservation-history-title">予約一覧</h1>
            <div class="inner">
                <form action="{{ route('admin.reservations.index') }}" method="GET">
                    <input type="text" id="keyword" name="keyword" value="{{ isset($keyword) ? $keyword : '' }}" placeholder="キーワードを入力">
                    <button type="submit" name="search">検索</button>
                </form>
            </div>
        </div>    
        <div class="reservation-history-container">
            <form action="{{ route('admin.reservations.destroy') }}" method="POST" id="deleteForm">
                @csrf
                <table class="reservation-history-table">
                    <thead>
                        <tr class="th-bg" id="admin-reservation-title">
                            <th></th>
                            <th>日付</th>
                            <th>開始時刻</th>
                            <th>終了時刻</th>
                            <th>生徒名</th>
                            <th>講座名</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($reservations as $reservation) 
                            <tr>
                                <td><input type="checkbox" name="ids[]" value="{{ $reservation->id }}"></td>
                                <td>{{ $reservation->date }}</td>
                                <td>{{ \Carbon\Carbon::parse($reservation->start_time)->format('H:i') }}</td>
                                <td>{{ \Carbon\Carbon::parse($reservation->end_time)->format('H:i') }}</td>
                                <td>{{ $reservation->user->name }}</td>
                                <td>{{ $reservation->course->title }}</td>
                            </tr>
                        @empty
                            <p id="no-hit">検索結果はありません。</p>
                        @endforelse
                    </tbody>
                </table>
                <div class="delete-button-container">
                    <button type="submit" class="delete-button">
                        <span class="material-symbols-outlined">delete</span>予約取消
                    </button>
                </div>
            </form>
        </div>
    </div> 
</x-admins.app>  
        