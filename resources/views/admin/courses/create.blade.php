<x-admins.app>
    <div id="secoundary-container" class="wrapper">
        <div class="create-course-container">
            <div class="inner">
                <h3>新規講座登録</h3>
                <form id="createForm" action="{{ route('admin.courses.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="course-image">アップロードする画像を選択してください (PNG, JPG)</label>
                        <input type="file" id="image_path" name="image_path" accept="image/png, image/jpeg">
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
                        <button type="submit" id="create">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>        
</x-admins.app>  