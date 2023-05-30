<x-users.app>
    <div id="secoundary-container" class="wrapper">
        <h2 class="soft-title">講座一覧</h2>
        <div class="cources-container">
            @foreach ($courses as $course)
                <div class="item">
                    <img src="{{ asset('storage/' . $course->image_path) }}" alt="course-image">
                    <h3>{{ $course->title }}</h3>
                    <p>{{ $course->summary }}</p>
                    <p class="lesson-time"><span>授業時間：{{ $course->duration }}分</span></p>
                </div>
            @endforeach
        </div>
    </div>        
</x-users.app>  
        