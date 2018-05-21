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
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware'=>'auth'],function (){
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/posts','PostController');

//====== Example of Gate authorization
//Route::get('/subscribe',function (){
//    if(Gate::allows('subs_only',Auth::user())){
//        return view('subscribe');
//    }else{
//        return "You are not subscriber yet!";
//    }
//})->name('subscribe');

    //====== Example of Policy authorization
    Route::get('/subscribe','HomeController@subscribe')->name('subscribe');

    //Bugsnag example
    Route::get('/bugsnag','HomeController@bugsnag')->name('bugsnag');
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

});

//-- Example of sending SMS with Nexmo service
Route::get('/sms/send/{to}', function(\Nexmo\Client $nexmo, $to){
    $message = $nexmo->message()->send([
        'to' => $to,
        'from' => env('NEXMO_NUMBER'),
        'text' => 'Last Laravel test!!!!!!!'
    ]);
    Log::info('sent message: ' . $message['message-id']);
    return "Sent correctly";
});