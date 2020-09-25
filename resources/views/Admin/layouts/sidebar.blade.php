<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
        <img src="backend/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-check elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">QUẢN TRỊ ADMIN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('upload/admin/avatar/admin.jpg')}}" class="img-check elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::guard('admin')->user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview ">
                    <a href="/admin" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                           Tổng quan

                        </p>
                    </a>

                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>
                          Quản lý khóa học
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{Route('viewCourse')}}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Danh sách khóa học</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Route('addCourse')}}" class="nav-link">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>Thêm mới khóa học</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-bars"></i>
                        <p>
                            Quản lý chủ đề
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{Route('listCategory')}}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Danh sách chủ đề</p>
                            </a>
                        </li>



                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                        <p>
                            Quản lý bài giảng
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{Route('listLesson')}}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Danh sách bài giảng</p>
                            </a>
                        </li>



                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Quản lý người dùng
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{Route('list.user')}}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Danh sách người dùng</p>
                            </a>
                        </li>



                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>
                            Quản lý mentor
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{Route('list.mentor')}}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Danh sách mentor</p>
                            </a>
                        </li>



                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-comment-alt"></i>
                        <p>
                            Quản lý đánh giá
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{Route('list.unchecked.review')}}" class="nav-link">
                                <i class="fas fa-sync-alt nav-icon"></i>
                                <p>Đang chờ duyệt</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Route('list.review')}}" class="nav-link">
                                <i class="fas fa-check nav-icon"></i>
                                <p>Đã duyệt</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Route('list.reject.review')}}" class="nav-link">
                                <i class="fas fa-ban nav-icon"></i>
                                <p>Không duyệt</p>
                            </a>
                        </li>



                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-edit"></i>
                        <p>
                            Quản lý các tác giả
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{Route('list.writer')}}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Danh sách tác giả</p>
                            </a>
                        </li>



                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Quản lý bài viết
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{Route('list.unchecked.post')}}" class="nav-link">
                                <i class="fas fa-sync-alt nav-icon"></i>
                                <p>Đang chờ duyệt</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Route('list.post')}}" class="nav-link">
                                <i class="fas fa-check nav-icon"></i>
                                <p>Đã duyệt</p>
                            </a>
                        </li>




                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>
                            Quản lý giao dịch
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{Route('list.transaction')}}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Danh sách giao dịch</p>
                            </a>
                        </li>





                    </ul>
                </li>




            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
