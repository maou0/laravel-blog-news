<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">

        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <div class="row">
                <li class="nav-item">
                    <a href="{{ route('personal.main.index') }}" class="nav-link">
                        <i class="fa fa-solid fa-house-user mr-2"></i>
                        <p>
                            Главная
                        </p>
                    </a>
                </li>
            </div>
            <div class="row">
                <li class="nav-item">
                    <a href="{{ route('personal.liked.index') }}" class="nav-link">
                        <i class="fa fa-solid fa-heart mr-2"></i>
                        <p>
                            Понравившиеся посты
                        </p>
                    </a>
                </li>
            </div>
            <div class="row">
                <li class="nav-item">
                    <a href="{{ route('personal.comment.index') }}" class="nav-link">
                        <i class="fa fa-solid fa-comment mr-2"></i>
                        <p>
                            Комментарии
                        </p>
                    </a>
                </li>
            </div>
        </ul>

    </div>
    <!-- /.sidebar -->
</aside>
