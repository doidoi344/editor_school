<x-admins.app>
    <div id="secoundary-container" class="wrapper">
        <div class="edit-course-container">
            <div class="inner">
                <h3>講座情報編集</h3>
                <form id="editForm" action="{{ route('admin.courses.update', ['id' => 1]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="course-image">画像</label>
                        <input type="file" id="course-image" name="course-image" value="">
                    </div>
                    <div class="form-group">
                        <label for="course-title">タイトル</label>
                        <input type="text" id="course-title" name="course-title" value="アニメーション">
                    </div>
                    <div class="form-group">
                        <label for="duration">授業時間（分）</label>
                        <select name="duration" id="duration">
                            <option value="選択してください">選択してください</option>
                            <option value="60">60</option>
                            <option value="120">120</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="summary">説明</label>
                        <textarea name="summary" id="summary" cols="30" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit">更新</button>
                    </div>
                </form>
            </div>
        </div>
    </div>        
</x-admins.app>  