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

Route::get('/', function () {
    return view("Welcome");
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profilepicture/{$id}', 'ProfilePictureController@index')->name('user.profilepicture');
		 
		 
Route::group(['middleware'=>'admin'], function(){
	Route::resource('/admin/users', 'AdminUsersController');
	Route::resource('/admin/posts', 'AdminPostController');
	Route::resource('/admin/categories', 'AdminPostCategoriesController');
	Route::get('/admin/comments/{id}', 'AdminPostCommentsController@commentsForPost')->name('post.comments');
    Route::resource('/admin/comments', 'AdminPostCommentsController');
	Route::resource('/admin/comments/replies', 'AdminCommentRepliesController');
	
	
	Route::get('/admin', function(){
	return view('admin.index');
	     });
	});

Route::resource('/user/userposts', 'UserPostsController');
Route::resource('/user/usercomments', 'PostCommentsController');
Route::resource('/user/usercomment/replies', 'CommentRepliesController');

Route::get('/welcomeclone',  'GuestPostController@index');

Route::get('/post/{id}', 'GuestPostController@post')->name('post');

