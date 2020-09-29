


@extends('layouts_page.main')
@section('title')
    Blog MyLearn
    @endsection
@section('css')
    <link rel="stylesheet" href="{{asset('home/styles/blog.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/styles/blog_responsive.css')}}" type="text/css">
    <style>
        .blog_category_image{
            width: 165px;
            height: 80px;
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
    <div class="blog">
        <div class="container">
            <div class="row">
            </div>
            <div class="row categories_row">
            </div>
            <div class="row">
            </div>
            <div class="row categories_row">
            </div>
            <div class="row">
            </div>
            <div class="row categories_row">
            </div>
            <div class="row">
            </div>
            <div class="row categories_row">
            </div>


            <!-- Blog Posts -->
            <div class="row">
                <div class="col">
                    <div class="welcome_title">Chào mừng đến với blog của chúng tôi !</div>
                </div>
            </div>
            <div class="row categories_row">

               @foreach($category as $index)
                <div class="col-xl-2 col-lg-4 col-md-6 blog_category_col">
                    <a href="/danh-sach-bai-viet?category={{$index->slug}}">
                        <div class="blog_category">
                            <div class="blog_category_image"><img src="{{asset($index->thumbnail)}}" alt=""></div>
                            <div class="blog_category_title">{{$index->name}}</div>
                        </div>
                    </a>
                </div>
                    @endforeach

            </div>

            <div class="row blog_row">

                @foreach($post as $index)
                <div class="col-lg-6">
                    <div class="blog_post">
                        <div class="blog_image" style="background-image:url({{$index->thumbnail}})"></div>
                        <div class="blog_title_container">
                            <div class="blog_post_category"><a href="#">{{$index->category}}</a></div>
                            <div class="blog_post_title"><a href="/danh-sach-bai-viet/{{$index->slug}}">{{$index->title}}</a></div>
                            <div class="blog_post_text">
                                <p>{{$index->description}}</p>
                            </div>
                            <div class="read_more"><a href="blog_single.html">Read More <img src="images/right.png" alt=""></a></div>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>

            <!-- Load More -->
            <div class="row">
                <div class="col">
                    <div class="load_more_button"><a href="#">load more</a></div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script src="{{asset('home/js/blog.js')}}"></script>
    <script>
        $(document).ready(function(){
            $(".load_more_button").click(function(event){
                event.preventDefault();
                let count=document.getElementsByClassName("blog_post").length;
                $.ajax({
                    url: 'danh-sach-bai-viet/load-more',
                    type:'post',
                    data:{count},

                    success:function(data){
                      let status=data['status'];
                      if (status == 0) $(".load_more_button").remove();
                      let posts=data['post'];
                      posts.forEach(item=>{
                         let element=`   <div class="col-lg-6">
                    <div class="blog_post">
                        <div class="blog_image" style="background-image:url(${item['thumbnail']})"></div>
                        <div class="blog_title_container">
                            <div class="blog_post_category"><a href="#">${item['category']}</a></div>
                            <div class="blog_post_title"><a href="/danh-sach-bai-viet/${item['slug']}">${item['title']}</a></div>
                            <div class="blog_post_text">
                                <p>${item['description']}</p>
                            </div>
                            <div class="read_more"><a href="blog_single.html">Read More <img src="images/right.png" alt=""></a></div>
                        </div>
                    </div>
                </div>`;
                              $(".blog_row").append(element);
                      })
                    }
                })
            })
        })
    </script>
@endsection
