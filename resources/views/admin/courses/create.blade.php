<x-admins.app>
    <div id="secoundary-container" class="wrapper">
        <div class="create-course-container">
            <div class="inner">
                <h3>新規講座登録</h3>
                @if ($errors->any())
                    <div class="error">
                        <ul>
                            <p>
                            <span class="material-symbols-outlined">verified</span>確認
                            </p>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form id="createForm" action="{{ route('admin.courses.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="course-image">アップロードする画像を選択してください (PNG, JPG)</label>
                        <input type="file" id="image" name="image" accept="image/png, image/jpeg">
                        <img id="preview" src="#" alt="Preview Image" style="display: none;">
                    </div>
                    <div class="form-group">
                        <label for="title">タイトル</label>
                        <input type="text" id="title" name="title" value="{{ session('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="duration">授業時間（分）</label>
                        <select name="duration" id="duration">
                            <option value="{{ session()->has('duration') ? session('duration') : '選択してください' }}">{{ session()->has('duration') ? session('duration') : '選択してください' }}</option>
                            <option value="60">60</option>
                            <option value="120">120</option>
                            <option value="180">180</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="summary">説明</label>
                        <textarea name="summary" id="summary" cols="30" rows="5">{{ session('summary') }}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" id="create">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>        
</x-admins.app>  