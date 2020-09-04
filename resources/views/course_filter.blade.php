
@extends('layouts_page.main')
@section('css')
    <link rel="stylesheet" href="{{asset('home/styles/courses.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/styles/courses_responsive.css')}}" type="text/css">
    <style>
        .course_image img{
            width: 100%;
            height: 300px;
        }
        .list-category{
            margin-top: 30px;
            display: flex;
            justify-content: space-between;


        }
        .list-category li{

        }
        .list-category a{
            color: #001f3f;
            font-size: 17px;
        }
        .list-category a:hover{
            color: #0e84b5;
        }
    </style>
@endsection
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
    <div class="breadcrumbs_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="breadcrumbs_list d-flex flex-row align-items-center justify-content-start">
                        <li><a href="/">home</a></li>
                        <li><a href="/danh-sach-khoa-hoc">courses</a></li>
                        <li>{{$category_name}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Language -->

<div class="language">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="language_title">Học lập trình dễ dàng hơn với MyLearn</div>
            </div>
        </div>
        <div class="row">
            <div class="col">
              <ul class="list-category">
                  <li><a href="/danh-sach-khoa-hoc">Tất cả</a></li>
                  @foreach($category as $index)
                  <li><a href="/danh-sach-khoa-hoc/{{$index->slug}}" >{{$index->name}}</a></li>
                  @endforeach
              </ul>
            </div>
        </div>

    </div>
</div>

<!-- Courses -->

<div class="courses">
    <div class="container">
        <div class="row courses_row">

            @foreach($course as $index)
            <div class="col-lg-4 course_col">
                <div class="course">
                    <div class="course_image"><img src="{{asset($index->thumbnail)}}" alt=""></div>
                    <div class="course_body">
                        <div class="course_title"><a href="/khoa-hoc/{{$index->slug}}">{{$index->name}}</a></div>
                        <div class="course_info">
                            <ul>

                                <li><a href="/danh-sach-khoa-hoc/{{$index->cate_slug}}">{{$index->category}}</a></li>
                            </ul>
                        </div>
                        <div class="course_text">
                            <p>{{$index->description}}</p>
                        </div>
                    </div>
                    <div class="course_footer d-flex flex-row align-items-center justify-content-start">
                        <div class="course_students"><i class="fa fa-user" aria-hidden="true"></i><span>{{$index->count}}</span></div>
                        <div class="course_rating ml-auto"><i class="fa fa-star" aria-hidden="true"></i><span>4,5</span></div>
                        <div class="course_mark course_free trans_200"><a href="#">Free</a></div>
                    </div>
                </div>
            </div>
            @endforeach


        </div>


    </div>
</div>



@section('js')
    <script src="{{asset('home/plugins/parallax-js-master/parallax.min.js')}}"></script>
    <script src="{{asset('home/plugins/progressbar/progressbar.min.js')}}"></script>
    <script src="{{asset('home/js/courses.js')}}"></script>
    <script>




    </script>
@endsection
