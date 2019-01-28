<?php
Route::group(['prefix'=>'/'],function(){
    Route::get('index', 'Client\HomeController@index')->name('home');
    Route::get('', function () {
        return redirect(route('home'));
    });
    Route::post('', 'Admin\AdminController@register')->name('register');
});
Route::group(['prefix'=>'admin/'],function(){
    Route::get('dashboard', 'Admin\DashboardController@index')->name('dashboard');
    Route::get('', function () {
        return redirect(route('dashboard'));
    });
    Route::resource('/categories','Admin\CategoryController');
    Route::post('/categories/status/{id}', 'Admin\CategoryController@status')->name('categories.status');
    Route::resource('/posts','Admin\PostController');
    Route::post('/posts/status/{id}', 'Admin\PostController@status')->name('posts.status');
    Route::resource('/users','Admin\UserController');
    Route::post('/users/status/{id}', 'Admin\UserController@status')->name('users.status');
});



