<x-admins.app>
    <div id="secoundary-container" class="wrapper">
        <div class="edit-course-container">
            <div class="inner">
                <h3>講座情報編集</h3>
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
                <form id="editForm" action="{{ route('admin.courses.update', ['id' => $course->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="image">画像</label>
                        <input type="file" id="image" name="image">
                        <p>※ 未選択の場合は編集前の画像が設定されます。</p>
                    </div>
                    <div class="form-group">
                        <label for="title">タイトル</label>
                        <input type="text" id="title" name="title" value="{{ session()->has('title') ? session('title') : $course->title }}">
                    </div>
                    <div class="form-group">
                        <label for="duration">授業時間（分）</label>
                        <select name="duration" id="duration">
                            <option value="{{ session()->has('duration') ? session('duration') : $course->duration }}">{{ session()->has('duration') ? session('duration') : $course->duration }}</option>
                            <option value="60">60</option>
                            <option value="120">120</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="summary">説明</label>
                        <textarea name="summary" id="summary" rows="5" >{{ session()->has('summary') ? session('summary') : $course->summary }}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit">更新</button>
                    </div>
                </form>
            </div>
        </div>
    </div>        
</x-admins.app>  