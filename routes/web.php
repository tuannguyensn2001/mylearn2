<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/course',function(){
    return 1;
});


//Day la cai ma e muon goi
//Admin

Route::get('/admin','AdminController@index')->name('admin');
Route::get('/admin/register','AdminController@register');
Route::post('/admin/login','AdminController@login')->name('adminLogin');
Route::get('/admin/logout','AdminController@logout')->name('adminLogout');
Route::get('/writer','WriterController@index')->name('writer');
Route::post('/writer/login','WriterController@login')->name('writer.login');
Route::get('/writer/logout','WriterController@logout')->name('writer.logout');
Route::group(['prefix'=>'writer'],function (){
    Route::get('/danh-sach-bai-viet/them-moi','WriterPostController@add')->name('writer.add.post');
    Route::post('/danh-sach-bai-viet/them-moi','WriterPostController@create')->name('writer.create.post');
    Route::get('/danh-sach-bai-viet','WriterPostController@index')->name('writer.show.post');
    Route::get('/danh-sach-bai-viet/{slug}','WriterPostController@details');
    Route::get('/danh-sach-bai-viet/chinh-sua/{id}','WriterPostController@editView');
    Route::post('/danh-sach-bai-viet/chinh-sua','WriterPostController@edit')->name('writer.edit.post');
});
Route::group(["prefix"=>"admin",'middleware'=>'checkAdmin'],function (){



    //Course
    Route::get('/danh-sach-khoa-hoc','AdminCourseController@viewCourse')->name('viewCourse');
    Route::post('/danh-sach-khoa-hoc/hien-thi','AdminCourseController@show')->name('showCourse');
    Route::post('/danh-sach-khoa-hoc/chinh-sua','AdminCourseController@edit')->name('editCourse');
    Route::get('/them-khoa-hoc','AdminCourseController@addCourse')->name('addCourse');
    Route::post('/them-khoa-hoc','AdminCourseController@create')->name('createCourse');

    //Category

    Route::get('/danh-sach-chu-de','AdminCategoryController@index')->name('listCategory');
    Route::post('danh-sach-chu-de/xem','AdminCategoryController@show')->name('showCategory');
    Route::post('danh-sach-chu-de/chinh-sua','AdminCategoryController@update')->name('editCategory');
    Route::post('danh-sach-chu-de/them-moi','AdminCategoryController@create')->name('createCategory');

    //Lesson

    Route::get('/danh-sach-bai-giang','AdminLessonController@index')->name('listLesson');
    Route::post('danh-sach-bai-giang/them-bai-giang','AdminLessonController@create')->name('create.lesson');
    Route::post('/danh-sach-bai-giang/sua-bai-giang','AdminLessonController@edit')->name('edit.lesson');

    //User
    Route::get('/danh-sach-nguoi-dung','AdminUserController@index')->name('list.user');
    Route::post('danh-sach-nguoi-dung/thong-tin-chi-tiet','AdminUserController@show')->name('show.user');
    Route::post('/danh-sach-nguoi-dung/thay-doi-khoa-hoc','AdminUserController@setCourse')->name('set.course.user');

    //Instructors
    Route::get('/danh-sach-mentor','AdminInstructorController@index')->name('list.mentor');
    Route::post('danh-sach-mentor/thong-tin-chi-tiet','AdminInstructorController@show')->name('show.mentor');
    Route::post('danh-sach-mentor/chinh-sua','AdminInstructorController@edit')->name('edit.mentor');
    Route::post('/danh-sach-mentor/thay-doi-khoa-hoc','AdminInstructorController@setCourse')->name('set.course.mentor');
    Route::post('/danh-sach-mentor/them-moi','AdminInstructorController@create')->name('create.mentor');

    //Review
    Route::get('/danh-sach-danh-gia/unchecked','AdminReviewController@unchecked')->name('list.unchecked.review');
    Route::get('danh-sach-danh-gia/set/checked/{id}','AdminReviewController@setCheck');
    Route::get('danh-sach-danh-gia/set/unchecked/{id}','AdminReviewController@setUnCheck');
    Route::get('danh-sach-danh-gia','AdminReviewController@index')->name('list.review');
    Route::get('danh-sach-danh-gia/reject','AdminReviewController@reject')->name('list.reject.review');

    //Write
    Route::get('/danh-sach-tac-gia','AdminWriterController@index')->name('list.writer');
    Route::post('/danh-sach-tac-gia/them-tac-gia','AdminWriterController@create')->name('create.writer');
    Route::post('danh-sach-tac-giac/thong-tin-chi-tiet','AdminWriterController@show')->name('show.writer');
    Route::post('/danh-sach-tac-gia/chinh-sua-tac-gia','AdminWriterController@edit')->name('edit.writer');


    //Post
    Route::get('/danh-sach-bai-viet/unchecked','AdminPostController@unchecked')->name('list.unchecked.post');
    Route::get('danh-sach-bai-viet/set/checked/{id}','AdminPostController@setCheck');
    Route::get('danh-sach-bai-viet/set/unchecked/{id}','AdminPostController@setUnCheck');
    Route::get('danh-sach-bai-viet/set/view/{id}','AdminPostController@View');
    Route::get('danh-sach-bai-viet/set/unview/{id}','AdminPostController@UnView');
    Route::get('danh-sach-bai-viet','AdminPostController@index')->name('list.post');
    Route::get('danh-sach-bai-viet/reject','AdminPostController@reject')->name('list.reject.post');
    Route::get('danh-sach-bai-viet/{slug}','AdminPostController@details');

    //Transcation
    Route::get('/danh-sach-giao-dich','AdminTransactionController@index')->name('list.transaction');
});


Route::get('/api/danh-sach-bai-giang/{slug}','LessonController@showLesson')->middleware(['checkUserLogin','checkUserHaveCourse']);

//Client


Route::get('/','HomePageController@index')->name('home');

//Get Course
Route::get('/khoa-hoc/{slug}','CourseController@index');
Route::get('/khoa-hoc/{course}/{lesson}','LessonController@index')->middleware('checkUserHaveCourse');
Route::post('/khoa-hoc/binh-luan','LessonController@addComment');
Route::get('/danh-sach-khoa-hoc/load-more','CourseController@loadMore')->name('load.more.course');
Route::post('/khoa-hoc/mua-khoa-hoc','CourseController@buy')->name('buy.course');


//Login,signup
Route::get('/dang-nhap','HomePageController@loginPage')->name('login');
Route::post('/dang-nhap','HomePageController@login')->name('login.action');
Route::get('/dang-ky','HomePageController@signupPage')->name('signup');
Route::post('/dang-ky','HomePageController@signup')->name('signup.action');
Route::get('/dang-xuat','HomePageController@logout')->name('logout.action');


//User
Route::post('/nguoi-dung-hien-tai','UserController@show')->name('getUser');
Route::post('/nguoi-dung/edit','UserController@edit')->name('update.user');

//Menu
Route::get('/danh-sach-khoa-hoc','CourseController@course');
Route::get('danh-sach-khoa-hoc/{slug}','CourseController@filter');


//Review
Route::post('/khoa-hoc/review','ReviewController@create');

//Post
Route::get('/danh-sach-bai-viet','PostController@index');
Route::get('/danh-sach-bai-viet/{slug}','PostController@details');
Route::post('/danh-sach-bai-viet/load-more','PostController@loadmore');



//Comment
Route::post('/danh-sach-bai-viet/dang-binh-luan','CommentController@create')->name('create.comment');
?>


