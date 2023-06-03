// 各種ボタンクリック時の制御
$(document).ready(function() {
    $('.destroy-button').click(function(event) {
      event.preventDefault(); // デフォルトのリンクの動作をキャンセル
      
      if (confirm('削除してもよろしいですか？')) {
        // OKボタンがクリックされた場合の処理
        var url = $(this).attr('href'); // 削除リンクのURLを取得
        window.location.href = url; // リンクのURLに遷移（削除処理）
      } else {
        // キャンセルボタンがクリックされた場合の処理
        console.log('削除をキャンセルしました');
      }
    }),
    $('.delete-button').click(function(event) {
        var confirmation = confirm('キャンセルしてもよろしいですか？');
        if (!confirmation) {
          event.preventDefault();
      }
    }),
    $('.unregister-button').click(function(event) {
        var confirmation = confirm('登録解除してもよろしいですか？');
        if (!confirmation) {
          event.preventDefault();
      }
    }),
    $('#image').on('change', function(e) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#preview').attr('src', e.target.result).show();
        };
        reader.readAsDataURL(e.target.files[0]);
     });

});

