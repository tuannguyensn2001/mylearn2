<!DOCTYPE html>
<html lang="en">
<head>
    <title>Lingua</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Lingua project">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/0/08/Learn_area_logo.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="{{asset('home/styles/bootstrap4/bootstrap.min.css')}}">
    <link href="{{asset('home/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('home/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/plugins/OwlCarousel2-2.2.1/animate.css')}}">
    @yield('css')
    <link rel="stylesheet" type="text/css" href="{{asset('home/styles/responsive.css')}}">
    <style>
        .auth{
            position: relative;
        }
        .auth ul{
            position: absolute;
            list-stype-type:none;
            width: 200px;
            margin-top: 2px;
            left: -80px;
            display: none;

        }
        .auth ul li{
            background-color: #061e9b;
            border: 1px solid #82acff;

        }
        .auth ul li a{
            display: block;
            color: white;
            display: block;
        }
        .auth ul li a:hover{
            color: #8efada;
        }
        .actived{
            display: block !important;
        }

        .focus{
            color: #00413b !important;
            font-weight: 500;

        }
        .underlined{
            border-bottom: 1px solid #022f21;
        }
        .appear{
            display: block !important;
        }

        .tab-content{
            display: none;
        }
        .profile-avatar{
            border-radius: 50%;
        }
        .course-description{
            word-break: break-all;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
        }
    </style>
</head>
<body>

<div class="super_container">

    <!-- Header -->

    @include('layouts_page.nav')


    <!-- Modal -->


    @yield('content')

   @include('layouts_page.footer')
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg   " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
                                                                <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">John Smith</h4>
                                                                <p class="mb-0">@johnny.s</p>
                                                                <div class="text-muted"><small>Last seen 2 hours ago</small></div>

                                                                <div class="mt-2 custom-file">
                                                                    <input type="text" hidden name="id" class="profile-id">
                                                                    <input type="file" name="avatar" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="text-center text-sm-right">
                                                                <span class="badge badge-secondary">administrator</span>
                                                                <div class="text-muted"><small>Joined 09 Dec 2017</small></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <ul class="nav nav-tabs">
                                                        <li class="nav-item item-1 underlined"><a href="" class="active nav-link focus option" data-text="1">Thông tin cá nhân</a></li>

                                                        <li class="nav-item item-2"><a href="" class="active nav-link option " data-text="2">Đổi mật khẩu</a></li>
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
                                                                    <button class="btn btn-primary" type="submit">Save Changes</button>
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

<script src="{{asset('home/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('home/styles/bootstrap4/popper.js')}}"></script>
<script src="{{asset('home/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{asset('home/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{asset('home/plugins/easing/easing.js')}}"></script>


<script>


    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let user=document.querySelector('.auth  a');
        user.onclick=(event)=>{
            event.preventDefault();
            document.querySelector('.auth ul').classList.toggle('actived');
        }
        document.querySelector('.auth ul li a').onmouseover=event=>{
            event.stopPropagation();
        }


        $(".option").click(function(event){
            event.preventDefault();

            $(".tab-content").removeClass("appear");
            $(".nav-item").removeClass("underlined");
            $(".option").removeClass("focus");
            $(".menu-"+$(this).attr('data-text')).addClass('appear');
            $(".item-"+$(this).attr('data-text')).addClass('underlined');
            $(this).addClass("focus");
        });
        $(".user-profile").click(function(){

               $.ajax({
                   url:'{{route('getUser')}}',
                   method:'post',
                   data:{
                   },
                   dataType:'json',
                   success: result=>{
                        let course=result['course'];
                        let data=result['auth'];
                        $(".name").html(data['name'])
                       $(".profile-id").val(data['id']);
                       $(".profile-name").val(data['name']);
                       $(".profile-work_place").val(data['work_place']);
                       $(".profile-email").val(data['email']);
                       $(".profile-about").val(data['about']);
                       $(".profile-created").html(data['created_at']);
                       console.log(data['avatar']);
                        let avatar=data['avatar'];
                       var base_url = window.location.origin;

                       $(".profile-avatar").attr('src',base_url+"/"+avatar);
                        let chunk =[];
                       for(let i=0;i<course.length;i+=3){
                           if (i%3 ==0) {
                               let child_course=[];
                               for(let j=0;j<=2;j++){
                                   child_course.push(course[i+j]);
                               }
                               chunk.push(child_course);
                           }
                       }
                       chunk[chunk.length-1]=chunk[chunk.length-1].filter(index=>{
                           return index != undefined
                       });
                       chunk.forEach((index,i)=>{
                           $('.auth-course').append("<tr class="+i+"> ");
                           index.forEach(item=>{
                               let string="<td><a href='/khoa-hoc/"+item['slug']+"'>"+item['name']+"</a></td>";
                                $(".auth-course ."+i+"").append(string);
                           });
                       });
                   }

               })
        });
    })

</script>
@yield('js')
</body>
</html>
