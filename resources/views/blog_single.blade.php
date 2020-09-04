


@extends('layouts_page.main');

@section('css')
    <link rel="stylesheet" href="{{asset('home/styles/blog_single.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/styles/blog_single_responsive.css')}}" type="text/css">
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
                                <div class="author_image"><div><img src="{{asset($posts->avatar)}}" alt="" width="34" height="34"></div></div>
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
                <div class="col-lg-6">
                    <div class="blog_post">
                        <div class="blog_image" style="background-image:url(images/blog_7.jpg)"></div>
                        <div class="blog_title_container">
                            <div class="blog_post_category"><a href="#">travel</a></div>
                            <div class="blog_post_title"><a href="blog_single.html">Design Better Forms</a></div>
                            <div class="blog_post_text">
                                <p>Whether it is a signup flow, a multi-view stepper, or a monotonous data entry interface, forms are one of the most important components of digital product design.</p>
                            </div>
                            <div class="read_more"><a href="blog_single.html">Read More <img src="images/right.png" alt=""></a></div>
                        </div>
                    </div>
                </div>

                <!-- Blog Post -->
                <div class="col-lg-6">
                    <div class="blog_post">
                        <div class="blog_image" style="background-image:url(images/blog_8.jpg)"></div>
                        <div class="blog_title_container">
                            <div class="blog_post_category"><a href="#">travel</a></div>
                            <div class="blog_post_title"><a href="blog_single.html">Art Helps Healing</a></div>
                            <div class="blog_post_text">
                                <p>Whether it is a signup flow, a multi-view stepper, or a monotonous data entry interface, forms are one of the most important components of digital product design.</p>
                            </div>
                            <div class="read_more"><a href="blog_single.html">Read More <img src="images/right.png" alt=""></a></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row register">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register_form_title">Post a Comment</div>
                    <div class="register_form_container">
                        <form action="#" id="register_form" class="register_form">
                            <div class="row register_row">
                                <div class="col-lg-6 register_col">
                                    <input type="text" class="form_input" placeholder="Name" required="required">
                                </div>
                                <div class="col-lg-6 register_col">
                                    <input type="email" class="form_input" placeholder="Email" required="required">
                                </div>
                                <div class="col-lg-12">
                                    <textarea class="form_input form_text" placeholder="Comment" required="required"></textarea>
                                </div>
                                <div class="col">
                                    <button type="submit" class="form_button trans_200">post a comment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row comments">
                <div class="col-lg-6 offset-lg-3">
                    <div class="comments_title">Comments <span>(12)</span></div>
                    <div class="comments_container">
                        <ul class="comments_list">
                            <li class="comment">
                                <div class="comment_content">
                                    <div class="comment_title_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="comment_image"><div><img src="images/blog_author.jpg" alt=""></div></div>
                                        <div class="comment_info">
                                            <div class="comment_name"><a href="#">Sarah Parker</a></div>
                                            <div class="comment_time">Sep 29, 2017 at 9:48 am</div>
                                        </div>
                                    </div>
                                    <div class="comment_text">
                                        <p>Nam egestas lorem ex, sit amet commodo tortor faucibus a. Suspendisse commodo, turpis a dapibus fermentum, turpis ipsum.</p>
                                    </div>
                                </div>
                                <ul>
                                    <li class="comment">
                                        <div class="comment_content">
                                            <div class="comment_title_container d-flex flex-row align-items-center justify-content-start">
                                                <div class="comment_image"><div><img src="images/blog_author.jpg" alt=""></div></div>
                                                <div class="comment_info">
                                                    <div class="comment_name"><a href="#">Sarah Parker</a></div>
                                                    <div class="comment_time">Sep 29, 2017 at 9:48 am</div>
                                                </div>
                                            </div>
                                            <div class="comment_text">
                                                <p>Sed imperdiet ante quis felis tempor hendrerit.</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="comment">
                                <div class="comment_content">
                                    <div class="comment_title_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="comment_image"><div><img src="images/blog_author.jpg" alt=""></div></div>
                                        <div class="comment_info">
                                            <div class="comment_name"><a href="#">Sarah Parker</a></div>
                                            <div class="comment_time">Sep 29, 2017 at 9:48 am</div>
                                        </div>
                                    </div>
                                    <div class="comment_text">
                                        <p>Nam egestas lorem ex, sit amet commodo tortor faucibus a. Suspendisse commodo, turpis a dapibus fermentum, turpis ipsum.</p>
                                    </div>
                                </div>
                            </li>
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
    <script src="{{asset('home/js/blog_single.js')}}"></script>
    <script>

    </script>
@endsection
