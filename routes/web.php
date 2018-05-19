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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/posts','PostController');

// Task Routes
Route::group(['prefix' => 'tasks'], function () {
    Route::get('/{id?}', [
        'uses' => 'TaskController@getAllTasks',
        'as' => 'task.index'
    ]);

    Route::post('store', [
        'uses' => 'TaskController@postStoreTask',
        'as' => 'task.store'
    ]);

    Route::patch('{id}/update', [
        'uses' => 'TaskController@postUpdateTask',
        'as' => 'task.update'
    ]);

    Route::delete('{id}/delete', [
        'uses' => 'TaskController@postDeleteTask',
        'as' => 'task.delete'
    ]);
});
