{{ $data['user_name'] }} さん<br><br>

授業講座の予約が完了いたしました。<br><br>
予約日程を下記よりご確認ください。<br>
--------------------------------------------------------------------<br><br>

・受講日時：{{ $data['date'] }}<br>
・講座タイトル：{{ $data['course_title'] }}<br>
・開始時刻：{{ \Carbon\Carbon::parse($data['start_time'])->format('H:i') }}<br>
・終了時刻：{{ \Carbon\Carbon::parse($data['end_time'])->format('H:i') }}<br>
