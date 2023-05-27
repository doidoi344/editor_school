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
    slotMinTime: '08:00:00', // 例: 8時から
    slotMaxTime: '20:00:00', // 例: 19時まで
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
    // クリック時の処理
    dateClick: function(info) {
      // クリックした時間枠の情報を取得
      var clickedDate = info.date;

      // 予約フォームを表示
      openForm();

      // 予約フォームのデータを送信する処理
      var form = document.getElementById('reservationForm');
      form.addEventListener('submit', function(event) {
        event.preventDefault();

        // 予約データを収集
        var day = document.getElementById('day').value;
        var reservation = document.getElementById('reservation').value;
        var startTime = document.getElementById('start_time').value;
        var endTime = document.getElementById('end_time').value;

        // 予約データをサーバーに送信（Ajaxリクエストなどを使用）

        // 予約フォームを非表示にする
        closeForm();
      });
    },
    events: [
      {
        title: '予約済',
        start: '2023-05-25T09:00:00', // 開始時間
        end: '2023-05-25T11:00:00',   // 終了時間
        backgroundColor: '#ff0000'     // 枠の色
      }
    ]
  });

    // オーバーレイのクリックイベントを設定
    var overlay = document.getElementById('reservationForm-overlay');
    overlay.addEventListener('click', overlayClick);

  calendar.render();
});
