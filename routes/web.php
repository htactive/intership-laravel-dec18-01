<?php
Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'admin/'],function(){
    Route::get('dashboard', 'Admin\DashboardController@index')->name('dashboard');
    Route::get('', function () {
        return redirect(route('dashboard'));
    });
    Route::resource('/categories','Admin\CategoryController');
    Route::resource('/posts','Admin\PostController');
    Route::post('/posts/status/{id}', 'Admin\PostController@status')->name('posts.status');
    Route::resource('/users','Admin\UserController');
});

Route::get('/test', function () {
    return view('client/layouts/master');
});
Route::get('/register', function(){
    return view('client/register');
});

