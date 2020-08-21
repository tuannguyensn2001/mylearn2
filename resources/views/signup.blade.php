<!doctype html>
<html lang="en">
<head>
    <title>Đăng ký </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body{
            background-color: #fff;
            font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji;
        }
        body > div{
            display: flex;
            justify-content: center;
            align-items: center;

        }
        .main{
            width: 30%;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
        }
        .form{



            border-radius: 0 0 6px 6px;

            border: 1px solid #d8dee2;
            border-radius: 5px;
        }
        form{
            margin: 20px;
        }
        label {
            font-weight: 600;
        }
        button{
            width: 100%;
            font-weight: 500;
            border-color: rgba(27,31,35,.15);
            box-shadow: 0 1px 0 rgba(27,31,35,.1), inset 0 1px 0 hsla(0,0%,100%,.03);
            border-radius: 20px;
        }
        .main > div{
            margin-top: 5%;
        }
        .img {
            display: flex;
            justify-content: center;
        }
        .intro{
            display: flex;
            justify-content: center;
        }
        .intro p{
            font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji;

            font-size: 22px;
        }
        .signup{
            border: 1px solid #d8dee2;
            border-radius: 5px;
            display: flex;
            justify-content: center;
        }
        .signup div{
            margin: 15px;
        }
        ul{
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            list-style-type:none;
            margin-right: 30px;
            margin-left: -15px;
        }
        ul li a{
            font-size: 12px;
        }
        form p{
            color: red;
            font-size: 13px;
            font-weight: 500;
        }
        .warning{
            border: 1px solid red;
            background-color: #f8cdcd;
            box-shadow: red;
        }


    </style>

</head>
<body>

<div class="container">

    <div class="main">
        <div class="img"><a href="{{route('home')}}"><img src="https://github.githubassets.com/images/modules/logos_page/GitHub-Mark.png" alt="" width="70px" height="70px"></a></div>
        <div class="intro"><p>Đăng ký người dùng</p></div>
        <div>
            @if ($errors->any())
                <div class="alert alert-danger">
                 Đăng ký không thành công
                </div>
            @endif
        </div>
        <div class="form">
            <form action="{{route('signup.action')}}" method="post" >
                @csrf
                <div class="form-group">
                    <label for="username">Tên tài khoản</label>
                    <input type="text" class="form-control" id="username" rules="min:6" name="username">

                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                    @if($errors->has('email'))
                        <p>{{$errors->first('email')}}</p>
                        @endif
                </div>

                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="confirm_password">Nhập lại mật khẩu</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                </div>
                <div class="form-group">

                    <button type="submit" class="btn btn-success">Đăng ký</button>
                </div>

            </form>

        </div>
        <div class="signup">
            <div>Đã có tài khoản  ? <a href="{{route('login')}}">Đăng nhập ngay</a></div>
        </div>
        <div>
            <ul>
                <li><a href="">Điều khoản</a></li>
                <li><a href="">Riêng tư</a></li>
                <li><a href="">Bảo mật</a></li>
                <li><a href="">Liên hệ MyLearn</a></li>
            </ul>
        </div>
    </div>

</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/Validator.js"></script>
<script>

    new Validate([
        ['#username','required','Tên đăng nhập không được để trống'],
        ['#username','min:6','Tên đăng nhập phải có tối thiểu 6 ký tự'],
        ['#email','isEmail',''],
        ['#password','min:6'],
        ['#confirm_password','same:#password','Không trùng mật khẩu rồi bạn']
    ]);
</script>

</body>
</html>
