

@extends('Admin.layouts.main')
@section('title')
    Danh sách giao dịch
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
                    <h1 class="m-0 text-dark">Danh sách giao dịch</h1>

                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Trang chính</a></li>
                        <li class="breadcrumb-item active">Danh sách giao dịch</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>

    <section class="content">


        <table  class="table">
            <thead>
            <tr>
                <th scope="col">Người dùng</th>

                <th scope="col">Thời gian</th>
                <th scope="col">Ghi chú</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Khóa học</th>
            </tr>

            </thead>
            <tbody>
            @foreach($transaction as $index)
                <tr>
                    <td>{{$index->user}}</td>

                    <td>{{$index->created_at}}</td>
                    <td>
                        @if($index->course_id !=0) {{$index->notes}}
                            @else {{$index->notes.$index->coin}}
                            @endif
                    </td>
                    <td>
                    @if($index->is_active == 1) Thành công
                        @else Không thành công
                        @endif
                    </td>
                    <td>{{$index->course}}</td>
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

