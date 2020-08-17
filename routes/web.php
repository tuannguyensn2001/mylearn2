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
Route::prefix('/admin')->group(function () {
    //Login admin
    Route::post('/login','AdminController@login')->name('adminLogin');
    Route::get('/logout','AdminController@logout')->name('adminLogout');

    //Admin
    Route::get('/','AdminController@index')->name('admin');


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

});

//Client


Route::get('/','HomePageController@index')->name('home');
Route::get('/khoa-hoc/{slug}','CourseController@index');


?>


