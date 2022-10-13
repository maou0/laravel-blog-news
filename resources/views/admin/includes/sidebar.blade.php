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
                    <a href="{{ route('admin.post.index') }}" class="nav-link">
                        <i class="fa fa-solid fa-newspaper mr-2"></i>
                        <p>
                            Посты
                        </p>
                    </a>
                </li>
            </div>

            <div class="row">
                <li class="nav-item">
                    <a href="{{ route('admin.category.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-duotone fa-bars mr-2"></i>
                        <p>
                            Категории
                        </p>
                    </a>
                </li>
            </div>

            <div class="row">
                <li class="nav-item">
                    <a href="{{ route('admin.tag.index') }}" class="nav-link">
                        <i class="fa fa-solid fa-tag mr-2"></i>
                        <p>
                            Теги
                        </p>
                    </a>
                </li>
            </div>
        </ul>

    </div>
    <!-- /.sidebar -->
</aside>
