// クリック時に予約フォームを表示する処理
var openForm = function() {
  var overlay = document.getElementById('reservationForm-overlay');
  overlay.classList.add('active');
};

// フォームを閉じる処理
var closeForm = function() {
  var overlay = document.getElementById('reservationForm-overlay');
  overlay.classList.remove('active');
};
// オーバーレイをクリックした際にフォーム以外の領域をタッチしている場合にフォームを閉じる処理
var overlayClick = function(event) {
  if (event.target.id === 'reservationForm-overlay') {
    closeForm();
  }
};
// 予約フォームの終了時間を講座選択から自動計算する処理
var courseSelect = document.getElementById('course');
var startTimeInput = document.getElementById('start_time');
var endTimeInput = document.getElementById('end_time');


courseSelect.addEventListener('change', updateEndtime);
startTimeInput.addEventListener('change', updateEndtime);

function updateEndtime() {
  var selectedOption = courseSelect.options[courseSelect.selectedIndex];
  var duration = parseInt(selectedOption.getAttribute('data-duration'), 10); // durationを整数値として取得

  // 開始時刻を取得
  var startTime = startTimeInput.value;
  var courseValue = courseSelect.value;

  if(startTime !== "" && courseValue !== ""){
    var startTimeParts = startTime.split(':');
    var startHour = parseInt(startTimeParts[0], 10);
    var startMinute = parseInt(startTimeParts[1], 10);

    // 終了時刻を計算
    var totalMinutes = startHour * 60 + startMinute + duration;
    var endHour = Math.floor(totalMinutes / 60);
    var endMinute = totalMinutes % 60;

    // 終了時刻が60分を超える場合は調整
    if (endMinute >= 60) {
        endHour += 1;
        endMinute -= 60;
    }

    // 終了時刻を設定
    var endTime = ('0' + endHour).slice(-2) + ':' + ('0' + endMinute).slice(-2);
    endTimeInput.value = endTime;
    
  } else if(startTime == "" || courseValue == ""){
      endTimeInput.value = "";
  } 
}

// FullCalendar
// ------------------------------------------------
document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'timeGridWeek',
    views: {
      timeGrid: {
        allDaySlot: false // "All-day"表示を非表示にする
      }
    },
    locale: 'ja', // ロケールを日本語に設定
    firstDay: 1, // 月曜日を週の先頭に設定
    slotMinTime: '09:00:00', // 例: 9時から
    slotMaxTime: '18:00:00', // 例: 18時まで
    slotDuration: '01:00:00', // スロットの時間間隔を1時間に設定
    height: 'auto', // カレンダーの高さを自動調整
    contentHeight: 'auto', // コンテンツの高さを自動調整
    slotLabelInterval: { hours: 1 }, // 時間枠の高さを調整
    headerToolbar: {
      left: 'customPrevButton,customNextButton customTodayButton',
      center: 'title',
      right: 'customMonthButton,customWeekButton'
    },
    slotLabelFormat: {
      hour: 'numeric',
      minute: '2-digit',
      omitZeroMinute: false,
      meridiem: 'narrow'
    },
    customButtons: {
      customPrevButton: {
        text: '< 前週', // 前の週ボタンのテキストを変更
        click: function() {
          calendar.prev();
        }
      },
      customNextButton: {
        text: '次週 >', // 次の週ボタンのテキストを変更
        click: function() {
          calendar.next();
        }
      },
      customTodayButton: {
        text: '今日', // 今日ボタンのテキストを変更
        click: function() {
          calendar.today();
        }
      },
      customMonthButton: {
        text: '月', // 月ボタンのテキストを変更
        click: function() {
          calendar.changeView('dayGridMonth'); // 月表示に切り替え
        }
      },
      customWeekButton: {
        text: '週', // 週ボタンのテキストを変更
        click: function() {
          calendar.changeView('timeGridWeek'); // 週表示に切り替え
        }
      }
    },
      // 予約データの取得と表示(laravelのルートからイベントデータ取得)
      events: 'eventsIndex',
  });

    // オーバーレイのクリックイベントを設定
    var overlay = document.getElementById('reservationForm-overlay');
    overlay.addEventListener('click', overlayClick);

  calendar.render();

});
