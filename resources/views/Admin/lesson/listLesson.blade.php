
@extends('Admin.layouts.main')
@section('title')
    Danh sách bài giảng
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
                    <h1 class="m-0 text-dark">Danh sách bài giảng</h1>

                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Trang chính</a></li>
                        <li class="breadcrumb-item active">Danh sách bài giảng</li>
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
        <select class="custom-select select-category">
            <option selected value=-1>Chọn chủ đề</option>

        </select>

        <select class="custom-select select-course">
            <option selected>Chọn khóa học</option>

        </select>
        <table class="table ">
            <thead>

            </thead>
            <tbody>



            </tbody>

        </table>


    </section>


    <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm mới bài giảng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('create.lesson')}}" method="post">
                    @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Khóa học</label>
                        <input type="text" class="form-control course_name" disabled>
                        <input type="text" hidden name="course_id" class="course_id">
                    </div>
                    <div class="form-group">
                        <label for="">Tên bài giảng</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="">Link video</label>
                        <input type="text" class="form-control" name="video">
                    </div>
                    <div class="form-group">
                        <label for="">Mô tả bài giảng</label>
                        <input type="text" class="form-control" name="description">
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="course-status-1" name="status_id" class="custom-control-input" value=1 checked>
                        <label class="custom-control-label" for="course-status-1">Sẵn sàng</label>
                    </div>

                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="course-status-0" name="status_id" class="custom-control-input" value=0>
                        <label class="custom-control-label" for="course-status-0">Chưa sẵn sàng</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sửa bài giảng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('edit.lesson')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Khóa học</label>
                            <input type="text" class="form-control info_course_name" disabled>
                            <input type="text" hidden name="lesson_id" class="info_lesson_id">
                        </div>
                        <div class="form-group">
                            <label for="">Tên bài giảng</label>
                            <input type="text" class="form-control info_lesson_name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="">Link video</label>
                            <input type="text" class="form-control info_lesson_video" name="video">
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả bài giảng</label>
                            <input type="text" class="form-control info_lesson_description" name="description">
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="course-status-11" name="lesson_status_id" class="custom-control-input info_lesson_status" value=1 >
                            <label class="custom-control-label" for="course-status-11">Sẵn sàng</label>
                        </div>

                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="course-status-00" name="lesson_status_id" class="custom-control-input info_lesson_status" value=0>
                            <label class="custom-control-label" for="course-status-00">Chưa sẵn sàng</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection


@section('js')
    <script>

        $(document).ready(function () {

            $.ajaxSetup({
                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }
            });
            $.ajax({
                type:'GET',
                url: '{{route('api.getLesson')}}',
                data:{

                },

                success: function(data){
                  const category=data['category'];
                   const course=data['course'];
                   const lesson=data['lesson'];
                   const objectCourse={};
                   course.forEach(function(index){
                       objectCourse[index.id]=[];
                   })
                    lesson.forEach(function(index){
                        objectCourse[index['course_id']].push(index);
                    })
                    console.log(objectCourse);
                  category.forEach(function(index){
                     let option='<option value='+index['id']+'>'+index['name']+'</option>';
                     $('.select-category').append(option);
                  });

                  $('.select-category').change(function () {
                      $('thead').empty();
                      $('tbody').empty();
                      $('.select-course').empty();
                      $('.select-course').append('<option selected>Chọn khóa học</option>');
                      let category_id=$(this).val();
                      let found=[];
                      course.forEach(function(index){
                          if (index['category_id'] == category_id) found.push(index);
                      })
                      found.forEach(function(index){
                          let option='<option value='+index['id']+'>'+index['name']+'</option>';
                          $('.select-course').append(option);
                      });
                  })

                    $('.select-course').change(function(){
                        $('thead').empty();
                        $('tbody').empty();
                        let course_id=$('.select-course').val();
                        let lesson_course=objectCourse[course_id];
                        let tr='   <tr>\n' +
                            '                <th scope="col">STT</th>\n' +
                            '                <th scope="col">Tên bài  giảng</th>\n' +
                            '\n' +
                            '                <th scope="col"><button class="btn btn-success create" data-toggle="modal" data-target="#exampleModal" >THÊM MỚI</button></th>\n' +
                            '            </tr>';
                        $('thead').append(tr);
                        lesson_course.forEach(function(index,i){
                            let item=i;
                            item++;

                            let td=' <tr lesson_id='+index['id']+'>\n' +
                                '                <td>'+item+'</td>\n' +
                                '                    <td>'+index['name']+'</td>\n' +
                                '                    <td>\n' +
                                '                        <button class="btn btn-primary edit" data-toggle="modal" data-target="#exampleModal1">SỬA</button>\n' +
                                '                        <a href="" class="btn btn-danger delete""> XÓA</a>\n' +
                                '                    </td>\n' +
                                '\n' +
                                '\n' +
                                '\n' +
                                '                </tr>';
                            $('tbody').append(td);
                        })


                    });
                    $(document).on('click','.edit',function(){
                        let lesson_id=$(this).closest('tr').attr('lesson_id');
                        let lesson_current=lesson.find(function(index){
                            return index['id']==lesson_id;
                        })
                        $('.info_lesson_id').val(lesson_current['id']);
                        $('.info_course_name').val(lesson_current['course']);
                        $('.info_lesson_name').val(lesson_current['name']);
                        $('.info_lesson_description').val(lesson_current['description']);
                        $('.info_lesson_video').val(lesson_current['video']);
                        let ready=$('.info_lesson_status')[0];
                        let unready=$('.info_lesson_status')[1];
                        if (lesson_current['status'] == 1) ready.setAttribute('checked',true);
                        else unready.setAttribute('checked',true);

                    })
                    $(document).on("click","thead",function(){

                        let course_id=$('.select-course').val();
                        let course_name=course.find(function(index){
                            return index['id']==course_id;
                        });
                        course_name=course_name['name'];
                        $('.course_name').val(course_name);
                        $('.course_id').val(course_id);
                    })
                }
            });

        })
    </script>
@endsection

