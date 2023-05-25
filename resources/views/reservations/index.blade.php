<x-users.app>
    <div id="secoundary-container" class="wrapper">
        <div class="reservation-history-container">
            <h1 class="reservation-history-title">予約履歴</h1>
            <table class="reservation-history-table">
                <thead>
                    <tr>
                        <th>日付</th>
                        <th>開始時刻</th>
                        <th>終了時刻</th>
                        <th>講座名</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>6月9日</td>
                        <td>11:00</td>
                        <td>12:00</td>
                        <td>アニメーション</td>
                        <td class="cancel-button-container">
                            <a href="{{ route('reservations.destroy', ['id' => 1]) }}" class="cancel-button">キャンセル</a>
                        </td>
                    </tr>
                    <tr>
                        <td>6月12日</td>
                        <td>13:00</td>
                        <td>14:00</td>
                        <td>トリミング</td>
                        <td class="cancel-container">
                            <a href="" class="cancel-button">キャンセル</a>
                        </td>
                    </tr>
                    <tr>
                        <td>6月15日</td>
                        <td>15:00</td>
                        <td>17:00</td>
                        <td>音声挿入</td>
                        <td class="cancel-container">
                            <a href="" class="cancel-button">キャンセル</a>
                        </td>
                    </tr>
                    <tr>
                        <td>6月16日</td>
                        <td>15:00</td>
                        <td>16:00</td>
                        <td>自作動画</td>
                        <td class="cancel-container">
                            <a href="" class="cancel-button">キャンセル</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-users.app>  
        