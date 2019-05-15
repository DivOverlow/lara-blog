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

//Frontend Routes
Route::group(['namespace' => 'Frontend'], function (){
    Route::get('/', 'HomeController@index');
    Route::get('post/{post}', 'PostController@post')->name('post'); // post/slug

    Route::get('post/tag/{tag}', 'HomeController@tag')->name('tag');
    Route::get('post/category/{category}', 'HomeController@category')->name('category');


    //vue routes
    Route::post('getPosts', 'PostController@getAllPosts');

    Route::post('saveLike', 'PostController@saveLike');
});


//Admin(Backend) Routes
Route::group(['namespace' => 'Admin'], function(){

    Route::get('admin/home', 'HomeController@index')->name('admin.home');

    // User Routes
    Route::resource('admin/user', 'UserController');

    // Role Routes
    Route::resource('admin/role', 'RoleController');

    // Permission Routes
    Route::resource('admin/permission', 'PermissionController');

    // Post Routes
    Route::resource('admin/post', 'PostController');

    // Tag Routes
    Route::resource('admin/tag', 'TagController');

    // Category Routes
    Route::resource('admin/category', 'CategoryController');

    // Admin Auth Routs
    Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');

    Route::post('admin-login', 'Auth\LoginController@login');
});



//Route::get('/', function () {
//    return view('frontend.blog');
//});
//
//Route::get('post', function () {
//   return view('frontend.post');
//})->name('post');



//Route::get('admin/home', function () {
//    return view('admin.home');
//})->name('admin');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
