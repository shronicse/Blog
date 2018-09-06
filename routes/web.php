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

Route::get('/','WelcomeController@index');
Route::get('/homepage', 'WelcomeController@index');
Route::get('/support', 'WelcomeController@support');
Route::get('/about', 'WelcomeController@about');
Route::get('/blog', 'WelcomeController@blog');
Route::get('/contact', 'WelcomeController@contact');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/add-category','CategoryController@addCategory');
Route::post('/save-category','CategoryController@saveCategory');
Route::get('/manage-category','CategoryController@manageCategory');
Route::get('/edit-category/{edit_id}','CategoryController@editCategory');
Route::post('/update-category','CategoryController@updateCategory');
Route::get('/delete-category/{id}','CategoryController@deleteCategory');


Route::get('/add-blog','BlogController@addblog');
Route::post('/save-blog','BlogController@saveblog');
Route::get('/manage-blog','BlogController@manageblog');
Route::get('/view-blog/{id}','BlogController@viewblog');
Route::get('/edit-blog/{id}','BlogController@editblog');
Route::post('/update-blog','BlogController@updateblog');
Route::get('/delete-blog/{id}','BlogController@deleteblog');

