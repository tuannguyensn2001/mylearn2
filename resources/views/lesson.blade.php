<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        nav{
            height: 60px;
            background-color: #29303b;

        }
        .row{
            height: 100%;
            width: 100%;
        }


        .back_button {
            height: 100%;
            color: #ffffff;
        }
        .back_button:hover{
            background-color: rgba(0,0,0,.1);
            cursor: pointer;
            color: #ffffff;
        }
        .back_button i{
            margin-top: 15%;
            margin-left: 40%;
        }

        .home_page{
            display: none;
            height: 100%;
        }

        .home_page a{
            width: 100%;
            color: #ffffff;
            text-decoration: none;
        }

        .home_page a img{
            margin-top: 10%;
            width: 100%;
        }

        .home_page::after{
            border: 1px solid white;
        }

        .lesson_name{
            height: 100%;
        }

        .lesson_name p{
            margin-top: 1.2%;
            font-size: 20px;
            color: #ffffff;

            margin-left: 20px;

        }

        .main{
            display: flex;
            flex-direction: column;
        }

        section{
            width: 100%;
        }

        .menu-lesson{
            min-height: 800px;
            background-color: #f7f8fa;
            padding-right: 0;

        }
        .content{

            min-height: 800px;
            background-color: #14171c;

        }
        .video_direction button {
            margin-top: 300px;
            margin-left: 0;
            margin-right: 0;
        }
        iframe{
            margin-left: 12px;

        }

        ul{
            list-style-type: none;
        }

        .child-lesson:hover{
            background-color: #f1f1f1;
            cursor: pointer;
            transition: background-color .3s ease-in-out;
        }

        .name-lesson{
            margin-left: 5px;
            width: 100%;

        }

        @media (min-width: 576px) {  }


        @media (min-width: 768px) {

        }

        @media(max-width: 767px){
            .back_button i{
                margin-top: 90%;
                margin-left: 40%;
            }

        }

        @media (min-width: 992px) {
            .home_page{
                display: block;
            }
        }


        @media (min-width: 1200px) {  }
    </style>
    <title>Title</title>
</head>
<body>

<header>
    <nav >
        <div class="row ">
            <a class="back_button col-1">
                <i class="fas fa-arrow-left fa-1x"></i>
            </a>
            <div class="home_page col-1 ">
                <a href="">  <img src="https://fullstack.edu.vn/assets/images/f8_text_logo.png" alt="" width="90px" height="30px">
                </a>
            </div>
            <div class="lesson_name col-9 ">
                <p>Tên bài giảng</p>
            </div>
        </div>
    </nav>

</header>
<section>

    <div class="row">
        <div class="col-lg-8 content ">

            <div class="video d-flex justify-content-evenly">
                <div class="video_direction">
                    <button class="btn btn-primary"><i class="fas fa-arrow-left fa-1x"></i></button>
                </div>
                <iframe width="85%" height="800" src="https://www.youtube.com/embed/81YLcQn-EyY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="video_direction">
                    <button class="btn btn-primary"><i class="fas fa-arrow-right fa-1x"></i></button>
                </div>
            </div>


        </div>
        <div class="col-lg-4 menu-lesson ">
            <div class="title d-flex justify-content-between">
                <div>
                    <h6>Xây dựng khóa học với NodeJS</h6>
                    <p>Chưa hoàn thành bài học nào</p>
                </div>
                <a href=""><i class="fas fa-arrow-right fa-2x"></i></a>
            </div>
            <div class="list-lesson">
                <div class="child-lesson d-flex">
                    <div class="number-lesson">
                        <p>9</p>
                    </div>
                    <div class="name-lesson">
                        Template
                    </div>
                </div>
                <div class="child-lesson d-flex">
                    <div class="number-lesson">
                        <p>9</p>
                    </div>
                    <div class="name-lesson">
                        Template
                    </div>
                </div>



            </div>
        </div>


    </div>

</section>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
</body>
</html>
