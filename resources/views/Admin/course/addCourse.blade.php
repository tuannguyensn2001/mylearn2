
    @extends('Admin.layouts.main')
    @section('css')
        <style>
        section > div form{
          width: auto;
        }

        </style>
    @endsection

    @section('content')
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Thêm mới khóa học</h1>
                    </div><!-- /.col -->
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
            <div class="container">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('createCourse')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Tên khóa học</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Mô tả khóa học</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                        <div class="form-group">
                            <select class="custom-select" name="category_id">
                                <option selected>Danh mục</option>
                                @foreach($category as $index)
                                    <option value="{{$index->id}}">{{$index->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    <div class="custom-file">

                        <input type="file" class="custom-file-input" id="customFile" name="thumbnail">
                        <label class="custom-file-label" for="customFile">Chọn ảnh khóa học</label>
                    </div>
                    <div class="form-group">
                        <label for="">Giá khóa học</label>
                        <input type="text" name="price" class="form-control info-price">
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline1" name="status_id" class="custom-control-input" value=1 checked>
                        <label class="custom-control-label" for="customRadioInline1">Sẵn sàng</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline2" name="status_id" class="custom-control-input" value=-1>
                        <label class="custom-control-label" for="customRadioInline2">Chuẩn bị ra mắt</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline3" name="status_id" class="custom-control-input" value="0">
                        <label class="custom-control-label" for="customRadioInline3">Chưa sẵn sàng</label>
                    </div>

                    <div>
                        <button class="btn btn-primary">Thêm mới</button>
                    </div>
                </form>
            </div>
        </section>

    @endsection

    @section('title')
        Thêm mới khóa học
    @endsection

    @section('js')
        <script>
            $(document).ready(function(){
                $('form').submit(function(event){
                    const value = $(".info-price").val();
                    if (value % 100 != 0){
                        event.preventDefault();
                        alert("Giá khóa học không hợp lệ");
                    }
                });
            })
        </script>
        @endsection
