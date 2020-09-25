
@extends('Admin.layouts.main')
@section('title')
   Danh sách đánh giá
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
                    <h1 class="m-0 text-dark">Danh sách đánh giá</h1>

                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Trang chính</a></li>
                        <li class="breadcrumb-item active">Danh sách đánh giá</li>
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
        <table width="100%" class="table">
            <thead>
            <tr>
                <th scope="col">Đánh giá</th>
                <th scope="col">Khóa học</th>
                <th scope="col">Thời gian</th>
                <th scope="col">Phê duyệt</th>
            </tr>

            </thead>
            <tbody>
                @foreach($reviews as $index)
                    <tr>
                        <td>{{$index->reviews}}</td>
                        <td>{{$index->category}}</td>
                        <td>{{$index->created_at}}</td>
                        <td>
                            <a href="admin/danh-sach-danh-gia/set/unchecked/{{$index->id}}" class="btn btn-danger"><i class="fas fa-ban"></i></a>
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

