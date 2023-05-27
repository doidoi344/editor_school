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
                        <tr>
                            <td><input type="checkbox" name="ids[]" value="1"></td>
                            <td>6月9日</td>
                            <td>11:00</td>
                            <td>12:00</td>
                            <td>アニメーション</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="ids[]" value="2"></td>
                            <td>6月12日</td>
                            <td>13:00</td>
                            <td>14:00</td>
                            <td>トリミング</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="ids[]" value="3"></td>
                            <td>6月15日</td>
                            <td>15:00</td>
                            <td>17:00</td>
                            <td>音声挿入</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="ids[]" value="4"></td>
                            <td>6月16日</td>
                            <td>15:00</td>
                            <td>16:00</td>
                            <td>自作動画</td>
                        </tr>
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
        