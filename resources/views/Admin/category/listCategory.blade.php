
@extends('Admin.layouts.main')
@section('title')
    Xem khóa học
@endsection
@section('css')
    <style>
        .form-group img{
            width: 300px;
            height: 300px;
        }
    </style>
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>

                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>

                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>

    <section class="content">

        <table class="table table-borderless">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên chủ đề</th>

                <th scope="col"><button class="btn btn-success create" data-toggle="modal" data-target="#modal-lg-1" >THÊM MỚI</button></th>
            </tr>
            </thead>
            <tbody>
            @foreach($category as $index)
                <tr>
                    <th scope="row">{{$index->id}}</th>
                    <td>{{$index->name}}</td>

                    <td>
                        <a href="" class="btn btn-primary edit" data-toggle="modal" data-target="#modal-lg" category-id="{{$index->id}}">SỬA</a>
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
                        <h4 class="modal-title">Chỉnh sửa danh mục</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('editCategory')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="id" value="" class="info-id" hidden>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Tên khóa học</label>
                                <input type="text" name="name" class="form-control info-name"  >
                            </div>
                            <div class="form-group ">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="validatedCustomFile" required name="thumbnail">
                                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div><img src="#" alt="" id="thumbnail"></div>
                            </div>




                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>

                        </div>
                    </form>
                </div>

            </div>

        </div>

        <div class="modal fade" id="modal-lg-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm mới danh mục</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('createCategory')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Tên khóa học</label>
                                <input type="text" name="name" class="form-control "  >
                            </div>
                            <div class="form-group ">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="validatedCustomFile1" required name="thumbnail">
                                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div><img src="#" alt="" id="thumbnail1"></div>
                            </div>





                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>

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
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#thumbnail1').attr('src', e.target.result);
                        $('#thumbnail').attr('src', e.target.result);
                        document.getElementById("thumbnail").style.width="500px";
                        document.getElementById("thumbnail1").style.width="500px";
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#validatedCustomFile").change(function () {
                readURL(this);
            });
            $("#validatedCustomFile1").change(function () {
                readURL(this);
            });
            $('.edit').click(function () {

                let id=$(this).attr('category-id');
                $.ajax({
                    type:'POST',
                    url: '{{route('showCategory')}}',
                    data:{
                        id,
                    },

                    success: function(data){
                        $("#thumbnail").attr('src',data['thumbnail']);
                        $('.info-id').val(data['id']);
                        $('.info-name').val(data['name']);

                    }
                })

            })
        })
    </script>
@endsection

