
@extends('Admin.layouts.main')
@section('title')
   {{$post->title}}
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
                    <h1 class="m-0 text-dark"></h1>

                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Trang chính</a></li>

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
        <h1>{{$post->title}}</h1>
        <h2>{{$post->description}}</h2>
           <p>
               Được đăng bởi {{$post->name}} vào lúc {{$post->created_at}}
           </p>
        <div>{!! $post->content !!}</div>


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

