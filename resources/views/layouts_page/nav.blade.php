
<header class="header">

    <!-- Top Bar -->
    <div class="top_bar">
        <div class="top_bar_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
                            <div class="top_bar_phone"><span class="top_bar_title">phone:</span>+84 9565910</div>
                            <div class="top_bar_right ml-auto">

                                <!-- Language -->
                                <div class="top_bar_lang">
                                    <span class="top_bar_title">Ngôn ngữ</span>
                                    <ul class="lang_list">
                                        <li class="hassubs">
                                            <a href="#">Tiếng Việt<i class="fa fa-angle-down" aria-hidden="true"></i></a>

                                        </li>
                                    </ul>
                                </div>

                                <!-- Social -->
                                <div class="top_bar_social">
                                    <span class="top_bar_title social_title">follow us</span>
                                    <ul>
                                        <li><a href="https://facebook.com/tuannguyensn2001"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="https://github.com/tuannguyensn2001"><i class="fa fa-github" aria-hidden="true"></i></a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Content -->
    <div class="header_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header_content d-flex flex-row align-items-center justify-content-start">
                        <div class="logo_container mr-auto">
                            <a href="/">
                                <div class="logo_text">MyLearn</div>
                            </a>
                        </div>
                        <nav class="main_nav_contaner">
                            <ul class="main_nav">
                                <li class="active"><a href="/">Trang chủ</a></li>
                                <li><a href="/danh-sach-khoa-hoc">Khóa học</a></li>

                                <li><a href="/danh-sach-bai-viet">Blog</a></li>
                                <li><a href="contact.html">Liên hệ</a></li>
                            </ul>
                        </nav>
                        <div class="header_content_right ml-auto text-right">
                            <div class="header_search">
                                <div class="search_form_container">

                                </div>
                            </div>

                            <!-- Hamburger -->
                            @if(\Illuminate\Support\Facades\Auth::check())
                                <div class="user auth " >
{{--                                    <a href=""><i class="fa fa-user" aria-hidden="true"></i>--}}
                                    <a href=""><img style="border-radius: 50%" src="{{asset(\Illuminate\Support\Facades\Auth::user()->avatar)}}" alt="" width="40" height="40">

                                        <ul>
                                            <li><a href="#" data-toggle="modal" data-target="#exampleModal1" class="user-profile" >Tài khoản</a></li>
                                            <li><a href="{{route('logout.action')}}">Đăng xuất</a></li>
                                        </ul>
                                    </a>
                                </div>
                            @else
                            <div class=" user " >
                                <a href="{{route('login')}}"><i class="fas fa-user" aria-hidden="true"></i></a>
                            </div>
                            @endif


                            <div class="hamburger menu_mm">
                                <i class="fa fa-bars menu_mm" aria-hidden="true"></i>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>





</header>

<div class="modal-test">
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg   " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa thông tin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row flex-lg-nowrap">


                        <div class="col">
                            <div class="row">
                                <div class="col mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="e-profile">
                                                <form action="{{route('update.user')}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-12 col-sm-auto mb-3">
                                                            <div class="mx-auto" style="width: 140px;">
                                                                <div class="d-flex justify-content-center align-items-center rounded profile-avatar" style="height: 140px; background-color: rgb(233, 236, 239);">
                                                                    <img src="" alt="" class="profile-avatar" width="140" height="140">

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                                            <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                                <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap name">John Smith</h4>



                                                                <div class="mt-2 custom-file">
                                                                    <input type="text" hidden name="id" class="profile-id">
                                                                    <input type="file" name="avatar" class="form-control">
                                                                    <hr>
                                                                    <b class="profile-coin"></b>
                                                                </div>
                                                            </div>
                                                            <div class="text-center text-sm-right">
                                                                <span class="badge badge-secondary">Thành viên</span>
                                                                <div class="text-muted profile-created"><small></small></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <ul class="nav nav-tabs">
                                                        <li class="nav-item item-1 underlined"><a href="" class="active nav-link focus option" data-text="1">Thông tin cá nhân</a></li>

                                                        <li class="nav-item item-2"><a href="" class="active nav-link option " data-text="2">Đổi mật khẩu</a></li>
                                                        <li class="nav-item item-3"><a href="" class="active nav-link option " data-text="3">Khóa học của tôi</a></li>
                                                    </ul>
                                                    <div class="tab-content pt-3 menu-1 appear">
                                                        <div class="tab-pane active ">


                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label>Họ và tên</label>
                                                                                <input class="form-control profile-name" type="text" name="name" >
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label>Nơi làm việc</label>
                                                                                <input class="form-control profile-work_place" type="text" name="work_place"  >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label>Email</label>
                                                                                <input class="form-control profile-email" type="text" name="email">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col mb-3">
                                                                            <div class="form-group">
                                                                                <label>Mô tả</label>
                                                                                <textarea class="form-control profile-about" rows="5" name="about"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col d-flex justify-content-end">
                                                                    <button class="btn btn-primary" type="submit">Lưu</button>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                    <div class="tab-content pt-3 menu-2 ">
                                                        <div class="tab-pane active ">

                                                            <div class="row" >
                                                                <div class="col-12 col-sm-6 mb-3  " >
                                                                    <div class="mb-2"><b>Change Password</b></div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label>Current Password</label>
                                                                                <input class="form-control" type="password" placeholder="••••••" name="old_password">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label>New Password</label>
                                                                                <input class="form-control" type="password" placeholder="••••••" name="new_password">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label>Confirm <span class="d-none d-xl-inline">Password</span></label>
                                                                                <input class="form-control" type="password" placeholder="••••••" name="confirm_new_password"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                <div class="col d-flex justify-content-end">
                                                                    <button class="btn btn-primary" type="submit">Save Changes</button>
                                                                </div>
                                                            </div>







                                                        </div>
                                                    </div>
                                                    <div class="tab-content pt-3 menu-3 ">
                                                        <div class="tab-pane active ">
                                                        <table class="auth-course" width="100%">


                                                                </table>








                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>


