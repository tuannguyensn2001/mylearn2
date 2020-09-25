




@extends('layouts_page.main')
@section('title')
   Khóa học {{$course->name}}
@endsection
@section('css')
    <link rel="stylesheet" href="{{secure_asset('home/styles/course.css')}}" type="text/css">
    <link rel="stylesheet" href="{{secure_asset('home/styles/course_responsive.css')}}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <style>
        .comment{
            width: 100% !important;
            margin-left: 20px;
        }

        .img img{
            border-radius: 50%;
            width: 50px;
            height: 50px;
        }
        .fas{
            padding-top: 4px;
            color: #f05123;
        }
        .content-faqs > p{
            margin-left: 10px;
        }
        .wrapper-faqs > div:first-child{
           margin-top: 20px;
        }
        .wrapper-faqs > div:not(:first-child){

        }
    </style>
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
        <div class="breadcrumbs_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <ul class="breadcrumbs_list d-flex flex-row align-items-center justify-content-start">
                            <li><a href="/">home</a></li>
                            <li><a href="/danh-sach-khoa-hoc">courses</a></li>
                            <li><a href="">{{$course->category}}</a></li>
                            <li>{{$course->name}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Intro -->

    <div class="intro">
        <div style="background-image: url('https://images.pexels.com/photos/1181243/pexels-photo-1181243.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260}') " class="intro_background parallax-window" data-parallax="scroll"  data-speed="0.8"></div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="intro_container d-flex flex-column align-items-start justify-content-end">
                        <div class="intro_content" style="background-color:#2e21df">
                            <div class="intro_price">{{$course->price}} Coin</div>
                            <div class="rating_r rating_r_4 intro_rating"><i></i><i></i><i></i><i></i><i></i></div>
                            <div class="intro_title" style="color: white">{{$course->name}}</div>
                            <div class="intro_meta">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Course -->

    <div class="course">
        <div class="course_top"></div>
        <div class="container">
            <div class="row row-lg-eq-height">

                <!-- Panels -->
                <div class="col-lg-9">
                    <div class="tab_panels">

                        <!-- Tabs -->
                        <div class="course_tabs_container">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="tabs d-flex flex-row align-items-center justify-content-start">
                                            <div class="tab active">Giới thiệu</div>
                                            <div class="tab">Dàn bài</div>
                                            <div class="tab">đánh giá</div>
                                            <div class="tab">thành viên</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="tab_panel description active">
                            <div class="panel_title">Mô tả khóa học</div>
                            <div class="panel_text">
                                <p>{{$course->description}}</p>
                            </div>

                            <!-- Instructors -->
                            <div class="instructors">
                                <div class="panel_title">Mentor khóa học</div>
                                <div class="row instructors_row">
                                    @foreach($mentor as $index)
                                    <div class="col-lg-4 col-md-6">
                                        <div class="instructor d-flex flex-row align-items-center justify-content-start">
                                            <div class="instructor_image"><div><img src="{{secure_asset($index->avatar)}}" alt=""></div></div>
                                            <div class="instructor_content">
                                                <div class="instructor_name"><a href="instructors.html">{{$index->name}}</a></div>
                                                <div class="instructor_title">Teacher</div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach






                                </div>
                            </div>

                            <!-- FAQs -->
                            <div class="faqs">






                                <div class="panel_title">Bạn sẽ học được gì</div>
                                <div class="wrapper-faqs">
                                    @foreach($course->advantage as $index)
                                    <div class="row">
                                        @foreach($index as $item)
                                        <div class="d-flex content-faqs col-lg-6" >
                                            <i class="fas fa-check fa-1x"></i>
                                            <p>{{$item}}</p>
                                        </div>
                                        @endforeach
                                    </div>
                                 @endforeach

                                </div>

                            </div>

                        </div>

                        <!-- Curriculum -->
                        <div class="tab_panel curriculum">

                            <div class="curriculum_items">
                                @foreach($lesson as $key=>$index)
                                    <div class="cur_item">
                                        <div class="cur_title_container d-flex flex-row align-items-start justify-content-start">
                                            <div class="cur_title">Bài giảng {{($key+1)}}</div>
                                            <div class="cur_num ml-auto"></div>
                                        </div>
                                        <div class="cur_item_content">
                                            <div class="cur_item_title">{{$index->name}}</div>
                                            <div class="cur_item_text">
                                                <p>{{$index->description}}</p>
                                            </div>
                                            <div class="cur_contents">
                                                <ul>
                                                    <li>

                                                        <ul>
                                                            <li class="d-flex flex-row align-items-center justify-content-start">
                                                                <i class="fa fa-video-camera" aria-hidden="true"></i><span>Video bài giảng <a href="{{secure_asset("api/danh-sach-bai-giang/$index->slug")}}" class="view" >Xem</a></span>
                                                            </li>



                                                        </ul>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        <div id="myModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title this-title" id="exampleModalLabel">Thông báo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body this-body" id="yt-player">

                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Reviews -->
                        <div class="tab_panel reviews">
                            <div class="panel_title">Review khóa học</div>



                            <div class="cur_reviews">

                                @foreach($review as $index)
                                <div class="review">
                                    <div class="review_title_container d-flex flex-row align-items-start justify-content-start">
                                        <div class="review_title d-flex flex-row align-items-center justify-content-center">
                                            <div class="review_author_image"><div><img src="{{secure_asset($index->avatar)}}" alt="" width="40" height="40"></div></div>
                                            <div class="review_author">
                                                <div class="review_author_name"><a href="#">{{$index->username}}</a></div>
                                                <div class="review_date">{{$index->created_at}}</div>
                                            </div>
                                        </div>
                                        <div class="review_stars ml-auto"><div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div></div>
                                    </div>
                                    <div class="review_text">
                                        <p>{{$index->reviews}}</p>
                                    </div>
                                </div>
                                @endforeach

                                @if($checkUserHaveCourse)
                               <div class="review d-flex justify-content-between">
                                   <div class="img" >
                                       <img src="{{secure_asset(\Illuminate\Support\Facades\Auth::user()->avatar)}}" alt="" >
                                   </div>
                                   <div class="comment d-flex flex-column-reverse " >
                                       <form action="/khoa-hoc/review" method="post">
                                           @csrf
                                            <div class="form-group">
                                                <input type="text" name="course_id" class="form-control" value="{{$course->id}}" hidden>
                                                <input type="text" class="form-control form-comment" name="review" data-text="1">
                                            </div>

                                       </form>
                                   </div>
                               </div>
                                @endif
                            </div>
                        </div>

                        <!-- Members -->
                        <div class="tab_panel members">
                            <div class="panel_title">Thành viên khác</div>
                            <div class="panel_text">
                            </div>
                            <div class="members_list d-flex flex-row flex-wrap align-items-start justify-content-start">




                                @foreach($members as $index)
                                <div class="member">
                                    <div class="member_image"><img src="{{secure_asset($index->avatar)}}" alt="" width="80" height="80"></div>
                                    <div class="member_title"><a href="#">{{$index->name}}</a></div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-3">
                    <div class="sidebar">
                        <div class="sidebar_background"></div>
                        @if($checkUserHaveCourse)
                            <div class="sidebar_top"><a href="#" >ĐÃ MUA</a></div>
                        @else
                            @if(\Illuminate\Support\Facades\Auth::check())
                                <div class="sidebar_top"><a href=""  class="warning_buy_course" data-toggle="modal" data-target="#confirmBuyCourse">MUA KHÓA HỌC</a></div>
                            @else
                                <div class="sidebar_top"><a href=""  class=" warning_have_course">MUA KHÓA HỌC</a></div>
                            @endif

                        @endif

                        <div class="sidebar_content">

                            <!-- Features -->
                            <div class="sidebar_section features">
                                <div class="sidebar_title">Thông tin khóa học</div>
                                <div class="features_content">
                                    <ul class="features_list">

                                        <!-- Feature -->
                                        <li class="d-flex flex-row align-items-start justify-content-start">
                                            <div class="feature_title"><i class="fa fa-clock-o" aria-hidden="true"></i><span>Thời gian học</span></div>
                                            <div class="feature_text ml-auto">2 tháng</div>
                                        </li>

                                        <!-- Feature -->
                                        <li class="d-flex flex-row align-items-start justify-content-start">
                                            <div class="feature_title"><i class="fa fa-bell" aria-hidden="true"></i><span>Bài giảng</span></div>
                                            <div class="feature_text ml-auto">20</div>
                                        </li>

                                        <!-- Feature -->
                                        <li class="d-flex flex-row align-items-start justify-content-start">
                                            <div class="feature_title"><i class="fa fa-id-badge" aria-hidden="true"></i><span>Truy cập mọi lúc mọi nơi</span></div>
                                            <div class="feature_text ml-auto"></div>
                                        </li>




                                    </ul>
                                </div>
                            </div>





                            <div class="sidebar_section like">
                                <div class="sidebar_title">Các khóa học khác</div>
                                <div class="like_items">


                                    @foreach($relationCourse as $index)
                                    <div class="like_item d-flex flex-row align-items-end justify-content-start">
                                        <div class="like_title_container">
                                            <div class="like_title"><a href="/khoa-hoc/{{$index->slug}}">{{$index->name}}</a></div>
                                            <div class="like_subtitle">{{$index->category}}</div>
                                        </div>
                                        <div class="like_price ml-auto">{{$index->price}}</div>
                                    </div>
                                    @endforeach


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

        <div class="modal fade" id="confirmBuyCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="margin-top: 230px">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Mua khóa học này</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Khóa học này trị giá {{$course->price}} coin</p>
                        <p>Bạn có chắc chắn muốn mua chứ ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary confirm-buy-course">Đồng ý</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{secure_asset('home/plugins/parallax-js-master/parallax.min.js')}}"></script>
    <script src="{{secure_asset('home/plugins/progressbar/progressbar.min.js')}}"></script>
    <script src="{{secure_asset('home/js/course.js')}}"></script>
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.view').click(function (event) {
                $('.this-body .alert-danger').remove();
                event.preventDefault();

                let url=$(this).attr('href');
                let element=$(this);
                let course_id={{$course->id}}
                $.ajax({
                    url: url,
                    type: 'get',
                    data:{
                        course_id
                    },
                    success: function (data) {

                        window.location.href+='/'+data;
                        $('.this-body').empty();
                        let name=element.closest('.cur_item_content').children('.cur_item_title').html();
                        $('.this-title').html(name);
                        let video='<iframe width="100%" height="700" src="https://www.youtube.com/embed/'+data+'" frameborder="0" allow="accelerometer;  encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                        $('.this-body').append(video);

                        // window.location.href='/lesson';
                    },
                    error:data=>{

                      if (data['status']==403) window.location.href = '{{route('login')}}';
                        else if(data['status']==401) $(".this-body").append('<div class="alert alert-danger" role="alert"> Bạn vui lòng đăng ký khóa học này !</div>');
                        $('.bd-example-modal-lg').modal({
                            backdrop: 'static',
                            keyboard: false,
                        });

                    }
                })
            })
            $('.bd-example-modal-lg').on('hidden.bs.modal', function () {
               $('iframe').attr('src','');
            });

            $(".form-comment").keydown(function (event) {
               if (event.keyCode == 13 && $(this).val() != ''){
                  this.form.submit();
               }

            })
            $('.warning_have_course').click(function(event){
                event.preventDefault();
                window.location.href = '{{route('login')}}';
            })
            $('.confirm-buy-course').click(function(){
                $('#confirmBuyCourse .modal-body .alert').remove();
                const course_id={{$course->id}};

                $.ajax({
                    url: '{{route('buy.course')}}',
                    method: 'post',
                    data:{course_id},
                    success:function(data){
                       let status=data['status'];
                        if (status == 200){
                                location.reload();
                        } else{
                            const element=`<div class="alert alert-danger" role="alert">
  Mua không thành công, vui lòng kiểm tra lại lượng coin của bạn !
</div>`;
                            $('#confirmBuyCourse .modal-body').append(element);
                        }
                    },
                    error:function(error){
                        const element=`<div class="alert alert-danger" role="alert">
  Mua không thành công, vui lòng kiểm tra lại lượng coin của bạn !
</div>`;
                        $('#confirmBuyCourse .modal-body').append(element);
                    }
                })
            })
            $('.warning_buy_course').click(function(){
                $('#confirmBuyCourse .modal-body .alert').remove();
            })
        })
    </script>
@endsection
