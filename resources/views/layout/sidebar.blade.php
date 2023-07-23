<nav id="sidebarMenu" class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('home') }}">
                    <i class="fa-solid fa-graduation-cap"></i>
                    Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('students.index') }}">
                    <i class="fa-solid fa-graduation-cap"></i>
                    Sinh viên
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('teachers.index') }}">
                    <i class="fa-solid fa-graduation-cap"></i>
                    Giảng viên
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('courses.index') }}">
                    <i class="fa-solid fa-graduation-cap"></i>
                    Môn học
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('semesters.index') }}">
                    <i class="fa-solid fa-graduation-cap"></i>
                    Kì học
                </a>
            </li>
    </div>
</nav>
