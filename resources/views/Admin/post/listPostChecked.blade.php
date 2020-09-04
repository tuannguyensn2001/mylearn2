
@extends('Admin.layouts.main')
@section('title')
    Xem khóa học
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

        @if (session('edit.done'))
            <div class="alert alert-success" role="alert">
               {{session('edit.done')}}
            </div>
        @endif

        @if (session('edit.failed'))
                <div class="alert alert-danger" role="alert">
                    {{session('edit.failed')}}
                </div>
            @endif
        <table width="100%">
            <thead>
            <tr>
                <th scope="col">Tên bài viết </th>
                <th scope="col">Danh mục</th>
                <th scope="col">Tác giả</th>
                <th scope="col">Thời gian</th>
                <th scope="col">Xem chi tiết</th>
                <th scope="col">Hiển thị</th>
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
                            @if(!$index->is_active==1)
                            <a href="admin/danh-sach-bai-viet/set/view/{{$index->id}}" class="btn btn-success"><i class="fas fa-check"></i></a>
                            @else
                                <a href="admin/danh-sach-bai-viet/set/unview/{{$index->id}}" class="btn btn-danger"><i class="fas fa-ban"></i></a>
                                @endif
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

