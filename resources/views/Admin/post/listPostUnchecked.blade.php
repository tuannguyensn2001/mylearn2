
@extends('Admin.layouts.main')
@section('title')
   Bài viết chưa kiểm duyệt
@endsection
@section('css')
    <style>
        img{
            width: 200px;
            height: 200px;
        }
    </style>
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Bài viết chưa kiểm duyệt</h1>

                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Trang chính</a></li>
                        <li class="breadcrumb-item active">Bài viết chưa kiểm duyệt</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>

    <section class="content">

        @if (session('check.done'))
            <div class="alert alert-success" role="alert">
               {{session('edit.done')}}
            </div>
        @endif

        @if (session('check.failed'))
                <div class="alert alert-danger" role="alert">
                    {{session('edit.failed')}}
                </div>
            @endif
        <table width="100%" class="table">
            <thead>
            <tr>
                <th scope="col">Tên bài viết </th>
                <th scope="col">Danh mục</th>
                <th scope="col">Tác giả</th>
                <th scope="col">Thời gian</th>
                <th scope="col">Xem chi tiết</th>
                <th scope="col">Phê duyệt</th>
            </tr>

            </thead>
            <tbody>
                @foreach($posts as $index)
                    <tr>
                        <td>{{$index->title}}</td>
                        <td>{{$index->category}}</td>
                        <td>{{$index->name}}</td>
                        <td>{{$index->created_at}}</td>
                        <td><a href="admin/danh-sach-bai-viet/{{$index->slug}}" class="btn btn-primary"><i class="fas fa-info-circle "></i></a></td>
                        <td>
                            <a href="admin/danh-sach-bai-viet/set/checked/{{$index->id}}" class="btn btn-success"><i class="fas fa-check"></i></a>
                            <a href="admin/danh-sach-bai-viet/set/unchecked/{{$index->id}}" class="btn btn-danger"><i class="fas fa-ban"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


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


        })
    </script>
@endsection

