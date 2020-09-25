<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here"/>
    <link rel="shortcut icon" href="{{secure_asset('logo.png')}}" type="image/png" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.2/plyr.css" />
    <link rel="stylesheet" href="{{secure_asset('/home/style.css')}}">
    <title>{{$lesson->name}}</title>
    <style>
        .logo_text{
            margin-top: 20px;

            font-size: 24px;
            font-weight: 700;
            line-height: 0.75;
            color: #00ffe7;
            vertical-align: middle;
            -webkit-transition: all 200ms ease;
            -moz-transition: all 200ms ease;
            -ms-transition: all 200ms ease;
            -o-transition: all 200ms ease;
            transition: all 200ms ease;
        }
    </style>
</head>
<body>

<header>
    <nav >
        <div class="row ">
            <a class="back_button col-1" href="/khoa-hoc/{{$course->slug}}">
                <i class="fas fa-arrow-left fa-1x"></i>
            </a>
            <div class="home_page col-1 ">
                <a href="/"><div class="logo_text">MyLearn</div>
                </a>
            </div>
            <div class="lesson_name col-9 ">
                <p>{{$lesson->name}}</p>
            </div>
        </div>
    </nav>

</header>

<section>
    <div style="width:100%">
        <div class="row">
            <div class="col-lg-8 col-sm-12 content  ">

                <div class="video d-flex justify-content-evenly col-sm-12">
                    <div class="video_direction ">
                        @if($previousNext['previous'] != null)
                        <a href="/khoa-hoc/{{$course->slug}}/{{$previousNext['previous']->slug}}" class="btn btn-direction btn-primary"><i class="fas fa-arrow-left fa-1x"></i></a>
                        @endif
                    </div>
{{--                    <div id="player" data-plyr-provider="youtube" data-plyr-embed-id="bTqVqk7FSmY"></div>--}}
{{--                    <iframe width="85%" height="700" src="https://www.youtube.com/embed/{{$lesson->video}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>--}}
                   <div class="iframe" style=" --plyr-color-main: red">
                       <div id="player" data-plyr-provider="youtube" data-plyr-embed-id="{{$lesson->video}}"></div>
                   </div>
                    <a href="" class="show-list-lesson"><i class="fas fa-arrow-right fa-2x"></i></a>
                    <div class="video_direction">
                        @if($previousNext['next'] != null)
                        <a href="/khoa-hoc/{{$course->slug}}/{{$previousNext['next']->slug}}" class="btn btn-direction btn-primary"><i class="fas fa-arrow-right fa-1x"></i></a>
                        @endif
                    </div>
                </div>


                <div class="container section-course">
                    <div class="d-flex">
                        <div class="menu responsive-lesson " number-menu=3><h6>Bài học</h6></div>
                        <div class="menu menu-main menu-active" number-menu=1><h6>Tổng quan</h6></div>
                        <div class="menu " number-menu=2><h6>Liên quan</h6></div>
                    </div>
                    <hr>

                    <div>
                        <div class="menu-content menu-content-1 menu-content-active">
                            <p>Tham gia nhóm học tập trên Facebook</p>
                            <p>Hãy subscribe kênh nhé</p>
                            <h4>@if ($list_comment['count'] > 0) {{$list_comment['count']}}
                                @else Chưa có
                                @endif
                                hỏi đáp</h4>

                            <div class="my-comment d-flex">
                                <img src="{{secure_asset(\Illuminate\Support\Facades\Auth::user()->avatar)}}" alt="">
                                <div>
                                    <form action="/khoa-hoc/binh-luan" method="post">
                                        @csrf
                                        <input type="text" hidden value={{$lesson->id}} name="lesson_id">
                                        <input type="text" name="comment">

                                    </form>
                                    <div class="wrapper-my-comment-action">
                                        <div class="d-flex my-comment-action ">
                                            <div class="my-comment-cancel"><p>HỦY</p></div>
                                            <div class="my-comment-comment"><p>BÌNH LUẬN</p></div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="comment">
                                @foreach($list_comment['comment'] as $index)
                                <div class="other-comment d-flex">
                                    <img src="{{secure_asset($index->avatar)}}" alt="">
                                    <div>
                                        <div>
                                            <div class="other-comment-username"><p>{{$index->name}}</p></div>
                                            <div class="other-comment-comment"><p>{{$index->comment}}</p></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="menu-content menu-content-2">b</div>
                    </div>
                </div>



            </div>
            <div class="col-lg-4 menu-lesson  ">
                <div class="title d-flex justify-content-between">
                    <div>
                        <h4>{{$course->name}}</h4>
                        <p></p>
                    </div>
                    <a href="" class="hide-list-lesson"><i class="fas fa-arrow-left fa-2x"></i></a>
                </div>
                <div class="list-lesson">
                    @foreach($list_lesson as $key=>$index)
                    <div class="child-lesson d-flex {{$index->slug}}" data-text="{{$course->slug}}/{{$index->slug}}" >
                        <div class="number-lesson">
                            <p>{{$key+1}}</p>
                        </div>
                        <div class="name-lesson">
                            <p>{{$index->name}}</p>
                        </div>
                    </div>
                    @endforeach



                </div>
            </div>


        </div>
    </div>
</section>


<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
<script src="https://cdn.plyr.io/3.6.2/plyr.polyfilled.js"></script>
<script src='{{secure_asset('/home/scripts.js')}}'></script>
<script>

   $(document).ready(function(){
       const player = new Plyr('#player', {
           blankVideo:'https://cdn.plyr.io/static/blank.mp4',
           captions: { active: false, language: 'auto', update: false },
           youtube:	{ noCookie: false, rel: 0, showinfo: 0, iv_load_policy: 0, modestbranding: 0 }
       });
       console.log(player);

       // Expose player so it can be used from the console
       window.player = player;
   })
</script>




</body>
</html>
