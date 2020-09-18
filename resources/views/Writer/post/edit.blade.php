

<?php




?>
@extends('Writer.layouts.main')
@section('title')
    Xem khóa học
@endsection
@section('css')
    <style>
        .ck.ck-editor__main>.ck-editor__editable{
            min-height: 500px;
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

        <div>
            <form action="{{Route('writer.edit.post')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Tiêu đề bài viết</label>
                    <input type="text" class="form-control" name="title" value="{{$post->title}}">
                </div>

                <div class="form-group">
                    <label for="">Mô tả bài viết</label>
                    <input type="text" class="form-control" name="description" value="{{$post->description}}">
                </div>
                <div class="form-group">
                    <textarea name="content" id="editor" cols="30" rows="10" >
                        {{$post->content}}
                    </textarea>
                </div>

               <div class="form-group">
                   <select class="custom-select custom-select-md mb-3" required name="category_id">
                       <option selected >Chọn chủ đề</option>
                       @foreach($category as $index)
                           <option value={{$index->id}}  @if($index->id == $post->category_id) selected @endif>{{$index->name}}</option>
                       @endforeach
                   </select>
               </div>
                <div class="form-group ">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="validatedCustomFile" name="thumbnail">
                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                    </div>

                </div>
                <div class="form-group">
                    <div><img src="{{$post->thumbnail}}" alt="" id="thumbnail"></div>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline1" name="is_active" class="custom-control-input" value=1 checked>
                        <label class="custom-control-label" for="customRadioInline1">Hiển thị bài viết</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline2" name="is_active" class="custom-control-input" value=0 @if($post->is_active ==0) checked @endif>
                        <label class="custom-control-label" for="customRadioInline2">Ẩn bài viết</label>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Chỉnh sửa bài viết</button>
                </div>
            </form>
        </div>










    </section>

@endsection


@section('js')
{{--    <script src="https://cdn.ckeditor.com/ckeditor5/21.0.0/classic/ckeditor.js"></script>--}}
<script src="js/ckeditor5-build-classic/build/ckeditor.js"></script>

<script>

        ClassicEditor
            .create( document.querySelector( '#editor' ),{
                minHeight: '300px',
            } )
            .catch( error => {
                console.error( error );
            } );
        $(document).ready(function () {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#thumbnail').attr('src', e.target.result);
                        document.getElementById("thumbnail").style.width="500px";
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
                $("#validatedCustomFile").change(function () {
                    readURL(this);
                })
        })
    </script>
@endsection

