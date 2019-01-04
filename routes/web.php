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
});

