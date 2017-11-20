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

use Illuminate\Support\Facades\Auth;

Route::post('/signup', [
    'uses' => 'UserController@postSignUp',
    'as' => 'signup',
]);

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('/signin', [
    'uses' => 'UserController@postSignIn',
    'as' => 'signin',
]);


Route::group(['middleware' => 'web'], function() {

    Route::get('/logout', [
        'uses' => 'UserController@getLogout',
        'as' => 'logout',
        'middleware' => 'auth'
    ]);

    Route::get('/account', [
       'uses' => 'UserController@getAccount',
        'as' => 'account',
        'middleware' => 'auth'
    ]);

    Route::post('/updateaccount', [
       'uses' => 'UserController@postSaveAccount',
        'as' => 'account.save'
    ]);

    Route::get('/userimage/{filename}', [
        'uses' => 'UserController@getUserImage',
        'as' => 'account.image'
    ]);

    Route::get('/Register_Login', ['as' => 'login', 'uses' => 'UserController@goToHome']);

    Route::get('/dashboard', [
         'uses' => 'PostController@getDashboard',
         'as' => 'dashboard',
         'middleware' => 'auth'
     ]);

     Route::post('/createpost', [
         'uses' => 'PostController@postCreatePost',
         'as' => 'post.create'
     ]);

     Route::get('/delete-post/{post_id}', [
         'uses' => 'PostController@getDeletePost',
         'as' => 'post.delete'
     ]);

     Route::post('/edit', [
        'uses' => 'PostController@postEditPost',
         'as' => 'edit'
     ]);

     Route::post('/like', [
         'uses' => 'PostController@postLikePost',
         'as' => 'like'
     ]);
});