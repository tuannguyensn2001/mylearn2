

@extends('layouts_page.main')



@section('css')
    <link rel="stylesheet" href="{{asset('home/styles/main_styles.css')}}" type="text/css">
    <style>
        .home{
           height: 1000px;
        }
        .background{
         margin-top: -70px;
        }
        .blog_category_image{
            width: 165px;
            height: 60px;
        }
    </style>
@endsection
@section('title')
        MyLearn - Học lập trình dễ dàng
@endsection

@section('content')
    <div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
        <div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
        <div class="search">
            <form action="#" class="header_search_form menu_mm">
                <input type="search" class="search_input menu_mm" placeholder="Search" required="required">
                <button class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
                    <i class="fa fa-search menu_mm" aria-hidden="true"></i>
                </button>
            </form>
        </div>
        <nav class="menu_nav">
            <ul class="menu_mm">
                <li class="menu_mm"><a href="index.html">Home</a></li>
                <li class="menu_mm"><a href="courses.html">Courses</a></li>
                <li class="menu_mm"><a href="instructors.html">Instructors</a></li>
                <li class="menu_mm"><a href="#">Events</a></li>
                <li class="menu_mm"><a href="blog.html">Blog</a></li>
                <li class="menu_mm"><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
        <div class="menu_extra">
            <div class="menu_phone"><span class="menu_title">phone:</span>+44 300 303 0266</div>
            <div class="menu_social">
                <span class="menu_title">follow us</span>
                <ul>
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Home -->

    <div class="home">
        <div class="home_background" style="background-image: url('https://images.pexels.com/photos/3888151/pexels-photo-3888151.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260')"></div>
        <div class="home_content">
            <div class="container">
                <div class="row background">
                    <div class="col text-center">
                        <h1 class="home_title" style="color:#e8e8e8">Học lập trình với MyLearn</h1>
                        <div class="home_button trans_200"><a href="/danh-sach-khoa-hoc">bắt đầu ngay !</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Language -->



    <!-- Courses -->

    <div class="courses">
        <div class="courses_background"></div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="section_title text-center">Các khóa học nổi bật </h2>
                </div>
            </div>
            <div class="row courses_row">

                <!-- Course -->
                @foreach($course as $index)
                <div class="col-lg-4 course_col">
                    <div class="course">
                        <div class="course_image"><img src="{{$index->thumbnail}}" alt="" height="200px" width="100%"></div>
                        <div class="course_body">
                            <div class="course_title"><a href="/khoa-hoc/{{$index->slug}}">{{$index->name}}</a></div>
                            <div class="course_info">
                                <ul>
                                    <li><a href="instructors.html">Sarah Parker</a></li>
                                    <li><a href="#">{{$index->category}}</a></li>
                                </ul>
                            </div>
                            <div class="course_text course-description">
                                <p>{{$index->description}}</p>
                            </div>
                        </div>
                        <div class="course_footer d-flex flex-row align-items-center justify-content-start">
                            <div class="course_students"><i class="fa fa-user" aria-hidden="true"></i><span>{{$index->count}}</span></div>
                            <div class="course_rating ml-auto"><i class="fa fa-star" aria-hidden="true"></i><span>4,5</span></div>
                            <div class="course_mark course_free trans_200"><a href="#">{{$index->price}}</a></div>
                        </div>
                    </div>
                </div>
                @endforeach



            </div>
        </div>
    </div>



    <div class="register">
        <div class="container">
            <div class="row">

                <!-- Register Form -->

                <div class="col-lg-6">
                    <div class="register_form_container">
                        <div class="register_form_title">Nhận thông tin về các khóa học khuyến mãi</div>
                        <form action="#" id="register_form" class="register_form">
                            <div class="row register_row">
                                <div class="col-lg-6 register_col">
                                    <input type="text" class="form_input" placeholder="Họ tên" required="required">
                                </div>
                                <div class="col-lg-6 register_col">
                                    <input type="email" class="form_input" placeholder="Email" required="required">
                                </div>
                                <div class="col-lg-6 register_col">
                                    <input type="tel" class="form_input" placeholder="SĐT">
                                </div>
                                <div class="col-lg-6 register_col">
                                    <input type="url" class="form_input" placeholder="Địa chỉ">
                                </div>
                                <div class="col">
                                    <button type="submit" class="form_button trans_200">Nhận thông tin</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Register Timer -->

                <div class="col-lg-6">
                    <div class="register_timer_container">
                        <div class="register_timer_title">Đăng ký ngay </div>
                        <div class="register_timer_text">


                        </div>
                        <div class="timer_container">
                            <ul class="timer_list">
                                <li><div id="day" class="timer_num">00</div><div class="timer_ss">days</div></li>
                                <li><div id="hour" class="timer_num">00</div><div class="timer_ss">hours</div></li>
                                <li><div id="minute" class="timer_num">00</div><div class="timer_ss">minutes</div></li>
                                <li><div id="second" class="timer_num">00</div><div class="timer_ss">seconds</div></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Events -->


    <!-- Blog -->

    <div class="blog">
        <div class="container">
            <div class="row row-lg-eq-height">

                <!-- Blog Left -->
                <div class="col-lg-6">
                    <div class="blog_left">
                        <div class="blog_title">Blog của chúng tôi</div>
                        <div class="blog_text">
                            <p>Ghé thăm blog để đọc những thông tin về công nghệ, chia sẻ kinh nghiệm</p>
                        </div>
                        <div class="blog_categories">
                            <div class="row categories_row">

                               @foreach($category as $index)
                                <div class="col-md-4 blog_category_col">
                                    <a href="/danh-sach-bai-viet?category={{$index->name}}">
                                        <div class="blog_category">
                                            <div class="blog_category_image"><img src="{{asset($index->thumbnail)}}" alt=""></div>
                                            <div class="blog_category_title">{{$index->name}}</div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>

                <!-- Blog Right -->

                <div class="col-lg-6">
                    <div class="blog_right">
                        <div class="blog_image" style="background-image:url({{asset($post->thumbnail)}})"></div>
                        <div class="blog_title_container">
                            <div class="blog_right_category"><a href="#">{{$post->category}}</a></div>
                            <div class="blog_right_title"><a href="">{{$post->title}}</a></div>
                            <div class="blog_right_text">
                                <p>{{$post->description}}</p>
                            </div>
                            <div class="read_more"><a href="blog_single.html">Read More <img src="images/right.png" alt=""></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
@endsection


@section('js')
    <script src="{{asset('home/js/custom.js')}}"></script>

    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url:'http://testlaravel.com/api/danh-sach-khoa-hoc',
                type:'get',

                success: function(data){
                    console.log(data);
                },
                error:error=>console.log(error),
            })
        })
    </script>
    @endsection
