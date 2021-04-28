<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            @if (Auth::check())
            <div class="sidebar-brand-text mx-3">{{ Auth::user()->name }} <sup></sup></div>
            @endif

        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-university"></i>
                <span>Quản lý khóa học</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Các khóa học</h6>
                    <a class="collapse-item" href="">Khóa học cơ bản</a>
                    <a class="collapse-item" href="">Tiếng anh giao tiếp</a>
                    <a class="collapse-item" href="">Tiếng anh phổ thông</a>
                    <a class="collapse-item" href="{{route('course.index')}}">Danh sách khóa học</a>
                    <a class="collapse-item" href="{{route('course.create')}}">Thêm khóa học</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-graduation-cap"></i>
                <span>Quản lý bài học</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Các bài học</h6>
                    <a class="collapse-item" href="">Từ vựng tiếng anh</a>
                    <a class="collapse-item" href="">Luyện nghe tiếng anh</a>
                    <a class="collapse-item" href="">Trò chơi tiếng anh</a>
                    <a class="collapse-item" href="">Học tiếng anh quản phim</a>
                    <a class="collapse-item" href="{{route('lesson.index')}}">Danh sách bài học</a>
                    <a class="collapse-item" href="{{route('lesson.create')}}">Thêm bài học</a>
                </div>
            </div>
        </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Quản lý chủ đề</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Các chủ đề</h6>
                        <a class="collapse-item" href="login.html">Family</a>
                        <a class="collapse-item" href="register.html">House</a>
                        <a class="collapse-item" href="forgot-password.html">Vegetable</a>
                        <a class="collapse-item" href="forgot-password.html">Weather</a>
                        <a class="collapse-item" href="forgot-password.html">Food and drinks</a>
                        <a class="collapse-item" href="forgot-password.html">Myhome</a>
                        <a class="collapse-item" href="{{route('topics.create')}}">Thêm chủ đề</a>
                        <a class="collapse-item" href="{{route('topics.index')}}">Danh sách chủ đề</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesone"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Quản lý từ vựng</span>
                </a>
                <div id="collapsePagesone" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"></h6>
                        <a class="collapse-item" href="login.html">Danh sách từ vựng</a>
                        <a class="collapse-item" href="register.html">Từ vựng theo chủ đề </a>
                        <a class="collapse-item" href="{{route('vocabulary.create')}}">Thêm từ vựng</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesthree"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-users"></i>
                    <span>Quản lý User</span>
                </a>
                <div id="collapsePagesthree" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"></h6>
                        <a class="collapse-item" href="">Danh sách User</a>
                        <a class="collapse-item" href="">Thêm User</a>

                    </div>
                </div>
            </li>
    </li>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
