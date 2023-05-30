<x-admins.app>
    <div id="secoundary-container" class="wrapper">
        <h2 class="soft-title">講座一覧</h2>
        <div class="cources-container">
            @foreach ($courses as $course)
                <div class="item">
                    <img src="{{ asset('storage/' . $course->image_path) }}" alt="course-image">
                    <h3>{{ $course->title }}</h3>
                    <p>{{ $course->summary }}</p>
                    <p class="lesson-time"><span>授業時間：{{ $course->duration }}分</span></p>
                    <div class="edit-btn-box">
                        <a href="{{ route('admin.courses.edit', ['id' => $course->id]) }}" class="edit-button">
                            <span class="material-symbols-outlined">edit_document</span>編集
                        </a>
                        <a href="{{ route('admin.courses.destroy', ['id' => $course->id]) }}" class="destroy-button">
                            <span class="material-symbols-outlined">delete</span>
                        </a>
                    </div>
                </div>
            @endforeach
            <div class="add-item">
                <a href="{{ route('admin.courses.create') }}" class="add-item-button">
                    <span class="material-symbols-outlined">add_to_photos</span>
                </a>
            </div>
        </div>
    </div>        
</x-admins.app>  
        