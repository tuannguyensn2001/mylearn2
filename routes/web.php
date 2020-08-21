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

//Route::get('/home', 'HomeController@index')->name('home');

//Admin
Route::get('/admin','AdminController@index')->name('admin');
Route::get('/admin/register','AdminController@register');
Route::post('/admin/login','AdminController@login')->name('adminLogin');
Route::get('/admin/logout','AdminController@logout')->name('adminLogout');
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
});
Route::get('/api/danh-sach-bai-giang/{slug}','LessonController@showLesson')->middleware(['checkUserLogin','checkUserHaveCourse']);
//Client


Route::get('/','HomePageController@index')->name('home');

//Get Course
Route::get('/khoa-hoc/{slug}','CourseController@index');

//Login,signup
Route::get('/dang-nhap','HomePageController@loginPage')->name('login');
Route::post('/dang-nhap','HomePageController@login')->name('login.action');
Route::get('/dang-ky','HomePageController@signupPage')->name('signup');
Route::post('/dang-ky','HomePageController@signup')->name('signup.action');
Route::get('/dang-xuat','HomePageController@logout')->name('logout.action');


//User
Route::post('/nguoi-dung-hien-tai','UserController@show')->name('getUser');
Route::post('/nguoi-dung/edit','UserController@edit')->name('update.user');



?>


