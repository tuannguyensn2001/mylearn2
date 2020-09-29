
@extends('layouts_page.main')

@section('title')
    Danh sách khóa học
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('home/styles/courses.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/styles/courses_responsive.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/styles/blog.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/styles/blog_responsive.css')}}" type="text/css">
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
        .blog_category_image{
            width: 150px;
            height: 60px;
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
                        <li><a href="/">Trang chủ</a></li>
                        <li><a href="/danh-sach-khoa-hoc">Khóa học</a></li>

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
            <div class="col d-flex justify-content-between">
                <div class="language_title">Học lập trình dễ dàng hơn với MyLearn</div>
                <select class="custom-select filter">
                    <option selected>Sắp xếp</option>

                </select>
            </div>
        </div>
        <div class="row">
            <div class="col">
              <ul class="list-category">


                      @foreach($category as $index)
                          <div class="col-xl-2 col-lg-4 col-md-6 blog_category_col">
                              <a href="/danh-sach-khoa-hoc/{{$index->slug}}">
                                  <div class="blog_category">
                                      <div class="blog_category_image"><img src="{{asset($index->thumbnail)}}" alt=""></div>
                                      <div class="blog_category_title">{{$index->name}}</div>
                                  </div>
                              </a>
                          </div>
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

        <div class="row">
            <div class="col">
                <div class="load_more_button" ><a href="#">load more</a></div>

            </div>
        </div>
    </div>
</div>


@endsection
@section('js')
    <script src="{{asset('home/plugins/parallax-js-master/parallax.min.js')}}"></script>
    <script src="{{asset('home/plugins/progressbar/progressbar.min.js')}}"></script>
    <script src="{{asset('home/js/courses.js')}}"></script>
    <script>
        let filter=['Giá tăng dần','Giá giảm dần','Số học viên tăng dần','Số học viên giảm dần'];
        function removeCourse(){
            $('.courses_row').empty();
        }

        function sortByPrice(condition){
            let element=document.querySelectorAll('.course_col');
            let course=[];
            element.forEach(item=>course.push(item));

            course.sort((a,b)=>{

                let first=parseInt(a.childNodes[1].childNodes[5].childNodes[5].childNodes[0].innerHTML);
                let second=parseInt(b.childNodes[1].childNodes[5].childNodes[5].childNodes[0].innerHTML);
                return condition == 'asc' ? first - second : second - first;
            })
            removeCourse();
            course.forEach(item=>$('.courses_row').append(item));


        }

        function sortByStudents(condition){
            let element=document.querySelectorAll('.course_col');
            let course=[];
            element.forEach(item=>course.push(item));

            course.sort((a,b)=>{

                let first=parseInt(a.childNodes[1].childNodes[5].childNodes[1].childNodes[1].innerHTML);
                let second=parseInt(b.childNodes[1].childNodes[5].childNodes[1].childNodes[1].innerHTML);
                return condition == 'asc' ? first - second : second - first;
            })
            removeCourse();
            course.forEach(item=>$('.courses_row').append(item));
        }

        function renderChoice(filter){

            filter.forEach((item,index)=>{
                let option = document.createElement('option');
                option.value=index;
                let content = document.createTextNode(item);
                option.append(content);
                document.querySelector('.filter').appendChild(option);
            })
        }

        function listenerChange(value){
            switch (value){
                case '0':
                    sortByPrice('asc');
                    break;
                case '1':
                    sortByPrice('desc');
                    break;
                case '2':
                    sortByStudents('asc');
                    break;
                case '3':
                    sortByStudents('desc');
                    break;
            }
        }
        renderChoice(filter);
        sortByStudents('asc');

        document.querySelector('.filter').addEventListener('change',function(event){
                listenerChange(event.target.value);
        })
    </script>
    <script>
        function renderCourse(data){
            data.forEach(item=> {

                let element = ` <div class="col-lg-4 course_col">
                <div class="course">
                    <div class="course_image"><img src="${item['thumbnail']}" alt=""></div>
                    <div class="course_body">
                        <div class="course_title"><a href="/khoa-hoc/${item['slug']}">${item['name']}</a></div>
                        <div class="course_info">
                            <ul>

                                <li><a href="/danh-sach-khoa-hoc/${item['cate_slug']}">${item['category']}</a></li>
                            </ul>
                        </div>
                        <div class="course_text course-description">
                            <p>${item['description']}</p>
                        </div>
                    </div>
                    <div class="course_footer d-flex flex-row align-items-center justify-content-start">
                        <div class="course_students"><i class="fa fa-user" aria-hidden="true"></i><span>${item['count']}</span></div>
                        <div class="course_rating ml-auto"><i class="fa fa-star" aria-hidden="true"></i><span>4,5</span></div>
                        <div class="course_mark course_free trans_200"><a href="#">${item['price']}</a></div>
                    </div>
                </div>
            </div>`;
                $(".courses_row").append(element);
            })
            listenerChange(document.querySelector('.filter').value);
        }


        $('.load_more_button').click(function (event) {
            let loadmore = $(this);
            event.preventDefault();
            let count=document.getElementsByClassName("course_col").length;
                $.ajax({
                    url: '{{route('load.more.course')}}',
                    type:'get',
                    data: {
                        count,
                    },
                    success: function (data) {
                        let status=data['status'];
                        if (status == 0) loadmore.remove();
                        renderCourse(data['courses'])

                    },
                    error: data=>{
                        console.log(data);
                    }
                })
        })
    </script>

@endsection
