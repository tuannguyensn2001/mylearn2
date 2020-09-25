
@extends('Admin.layouts.main')
@section('title')
  Danh sách khóa học
@endsection
@section('css')
    <style>
        img{
            width: 200px;
            height: 200px;
        }
        .menu > div{
            margin-left: 10px;
            margin-top: 20px;

            cursor: pointer;
        }
        .menu-active{
            border-bottom: 1px solid blue;
        }
        .modal-body{
            display: none;
        }
        .menu-content-active{
            display: block;
        }
    </style>
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Trang chính</a></li>
                        <li class="breadcrumb-item active">Danh sách khóa học</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>

    <section class="content">
        @if(session('edit.done'))
            <div class="alert alert-success" role="alert">
                {{session('edit.done')}}
            </div>
        @endif
        @if(session('edit.failed'))
            <div class="alert alert-danger" role="alert">
                {{session('edit.failed')}}
            </div>
        @endif
        <table class="table ">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên khóa học</th>
                <th scope="col">Chủ đề</th>
                <th scope="col">Giá</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($course as $index)
            <tr>
                <th scope="row">{{$index->id}}</th>
                <td>{{$index->name}}</td>
                <td>{{$index->category}}</td>
                <td>{{$index->price}} Coin</td>
                <td>
                    <a href="" class="btn btn-primary edit" data-toggle="modal" data-target="#modal-lg" course-id="{{$index->id}}">SỬA</a>
                    <a href="" class="btn btn-danger">XÓA</a>


                </td>
            </tr>
            @endforeach
            </tbody>

        </table>

        <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Chỉnh sửa khóa học</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="d-flex menu">
                        <div class="menu-1 menu-title menu-active" number-menu="1"><p>Thông tin chung</p></div>
                        <div class="menu-2 menu-title" number-menu="2"><p>Thông tin chi tiết</p></div>

                    </div>

                    <form action="{{route('editCourse')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="id" value="" class="info-id" hidden>
                    <div class="modal-body menu-content-1 menu-content-active">
                        <div class="form-group">
                            <label for="">Tên khóa học</label>
                            <input type="text" name="name" class="form-control info-name"  >
                        </div>
                        <div class="form-group">
                            <label for="">Ảnh khóa học</label>
                            <img src="upload/course/php.png" alt="" class="info-thumbnail">
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả khóa học</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control info-description"></textarea>
                        </div>
                        <div class="form-group">
                            <select class="custom-select" name="category_id">
                                <option >Danh mục</option>
                                @foreach($category as $index)
                                    <option id="category-{{$index->id}}" value="{{$index->id}}">{{$index->name}}</option>--}}
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Giá khóa học</label>
                            <input type="text" name="price" class="form-control info-price">
                        </div>
                        <div class="custom-file">

                            <input type="file" class="custom-file-input" id="customFile" name="thumbnail">
                            <label class="custom-file-label" for="customFile">Chọn ảnh khóa học</label>
                        </div>

                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="course-status-1" name="status_id" class="custom-control-input" value=1>
                            <label class="custom-control-label" for="course-status-1">Sẵn sàng</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="course-status--1" name="status_id" class="custom-control-input" value=-1>
                            <label class="custom-control-label" for="course-status--1">Chuẩn bị ra mắt</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="course-status-0" name="status_id" class="custom-control-input" value=0>
                            <label class="custom-control-label" for="course-status-0">Chưa sẵn sàng</label>
                        </div>


                    </div>

                        <div class="modal-body menu-content-2">
                            <div class="d-flex justify-content-end">
                                <button class="btn plus-advantage"><i class="fa fa-plus" ></i></button>
                            </div>

                        </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Lưu</button>

                    </div>
                    </form>
                </div>

            </div>

        </div>
    </section>

@endsection


@section('js')
    <script>

        $(document).ready(function () {
            $.ajaxSetup({
                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }
            });
            $('.edit').click(function () {
                let id=$(this).attr('course-id');
                    $('.menu-content-2').empty();
                    $.ajax({
                        type:'POST',
                        url: '{{route('showCourse')}}',
                        data:{
                            id,
                        },

                        success: function(data){
                            let advantage=JSON.parse(data['course']['advantage']);


                            let course=data['course'];

                            $('.info-name').val(course['name']);
                            $('.info-id').val(course['id']);
                            $('.info-description').val(course['description']);
                            $('.info-price').val(course['price']);
                            $('#category-'+course['category_id']).attr('selected','selected')
                            $('.info-thumbnail').attr('src',course['thumbnail']);
                            $('#course-status-'+course['status_id']).attr('checked',true);
                            advantage.forEach((item,index)=>{
                                let count=index+1;
                                let element=` <div class="form-group">
                               <label for="">Lợi ích ${count}</label>
                               <input type="text" class="form-control advantage" name="advantage-${count}" value='${item}'>
                           </div>`;

                                $('.menu-content-2').append(element);
                            });
                        }
                    })

            })
            $('form').submit(function(event){
                const value = $(".info-price").val();
                if (value % 100 != 0){
                    event.preventDefault();
                    alert("Giá khóa học không hợp lệ");
                }
            });
            $('.menu-title').click(function(){
                $('.menu-title').removeClass('menu-active');
                $('.modal-body').removeClass('menu-content-active');
                $(this).addClass('menu-active');
                let number = $(this).attr('number-menu');
                $('.menu-content-'+number).addClass('menu-content-active');
            })
            $('.plus-advantage').click(function(event){
                event.preventDefault();
                let count_advantage=document.querySelectorAll('.advantage').length+1;
                let element=`  <div class="form-group">
                               <label for="">Lợi ích ${count_advantage}</label>
                               <input type="text" class="form-control advantage" name="advantage-${count_advantage}">
                           </div>`
                $('.menu-content-2').append(element);
            })
        })
    </script>
@endsection
