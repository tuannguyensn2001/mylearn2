


@extends('layouts_page.main')
@section('title')
{{$posts->title}}
@endsection
@section('css')
    <link rel="stylesheet" href="{{secure_asset('home/styles/blog_single.css')}}" type="text/css">
    <link rel="stylesheet" href="{{secure_asset('home/styles/blog_single_responsive.css')}}" type="text/css">
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
    <div class="home">
        <div class="breadcrumbs_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <ul class="breadcrumbs_list d-flex flex-row align-items-center justify-content-start">
                            <li><a href="index.html">home</a></li>
                            <li><a href="blog.html">blog</a></li>
                            <li><a href="blog.html">travel</a></li>
                            <li>falmin' hot indulgence</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Blog Image -->

    <div class="blog_top_image">
        <div class="blog_top">
            <div class="blog_background parallax-window" data-parallax="scroll"  data-speed="0.8">
                <img src="https://images.pexels.com/photos/546819/pexels-photo-546819.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
            </div>
        </div>
    </div>

    <!-- Blog Content -->

    <div class="blog_container">
        <div class="container">
            <div class="row blog_content_row">
                <div class="col">
                    <div class="blog_content">
                        <div class="blog_post_title_container">
                            <div class="blog_category"><a href="#">{{$posts->category}}</a></div>
                            <div class="blog_title">{{$posts->title}}</div>
                            <h6>{{$posts->description}}</h6>
                        </div>
                        <div class="blog_text">

                           {!! $posts->content !!}
                        </div>
                        <div class="blog_tags">
                            <ul>
                                @foreach($category as $index)
                                <li><a href="/danh-sach-khoa-hoc/{{$index->slug}}">{{$index->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="blog_post_footer d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
                            <div class="blog_post_author d-flex flex-row align-items-center justify-content-start">
                                <div class="author_image"><div><img src="{{secure_asset($posts->avatar)}}" alt="" width="34" height="34"></div></div>
                                <div class="author_info">
                                    <ul>
                                        <li><a href="#">{{$posts->author}}</a></li>
                                        <li>{{$posts->updated_at}}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="blog_post_share ml-lg-auto">
                                <span>share</span>
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Similar Posts -->

            <div class="row similar_posts">

                <!-- Blog Post -->
                @foreach($relatedPost as $index)
                <div class="col-lg-6">
                    <div class="blog_post">
                        <div class="blog_image" style="background-image:url({{secure_asset($index->thumbnail)}})">

                        </div>
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


                <!-- Blog Post -->

            </div>

            <div class="row register">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register_form_title">Để lại bình luận của bạn</div>
                    <div class="register_form_container">
                        <form action="{{route('create.comment')}}" id="register_form" class="register_form" method="post">
                            @csrf
                            <div class="row register_row">
                                <div class="col-lg-6 register_col">
                                    <div><label for=""><b>Tên</b></label></div>
                                    <input type="text" class="form_input"  required="required" name="name">
                                </div>
                                <div class="col-lg-6 register_col">
                                    <div><label for=""><b>Email</b></label></div>
                                    <input type="email" class="form_input"  required="required" name="email">
                                </div>
                                <div class="col-lg-12">
                                    <div><label for=""><b>Bình luận</b></label></div>
                                    <textarea class="form_input form_text"  required="required" name="comment"></textarea>
                                </div>
                                <div class="col">
                                    <button type="submit" class="form_button trans_200">Đăng bình luận</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row comments">
                <div class="col-lg-6 offset-lg-3">
                    <div class="comments_title">Bình luận <span>({{$comment->count()}})</span></div>
                    <div class="comments_container">
                        <ul class="comments_list">
                            @foreach($comment as $index)
                            <li class="comment">
                                <div class="comment_content">
                                    <div class="comment_title_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="comment_image"><div><img src="{{secure_asset('upload/users/avatar/default.png')}}" alt=""></div></div>
                                        <div class="comment_info">
                                            <div class="comment_name"><a href="#">{{$index->name}}</a></div>
                                            <div class="comment_time">{{$index->created_at}}</div>
                                        </div>
                                    </div>
                                    <div class="comment_text">
                                        <p>{{$index->comment}}</p>
                                    </div>
                                </div>

                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="comments_more">
                        <div class="comments_more_button"><a href="#">load more</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script src="{{secure_asset('home/js/blog_single.js')}}"></script>
    <script>

    </script>
@endsection
