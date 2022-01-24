<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['middleware' => ['auth']], function() {

    Route::get('/', 'Home\MainPageController@show')
        ->name('home.mainPage');

    Route::get('/freights', 'Freight\FreightController@show')
        ->name('freights.mainPage');

    Route::get('/freights/{id}', 'Freight\FreightController@details')
        ->name('freights.showDetails');


    //USERS
    Route::get('/users', 'User\UserController@list')
        ->name('user.list');

    Route::get('/users/details/{id}', 'User\UserController@details')
        ->name('user.details');

    Route::get('/users/new', 'User\UserController@new')
        ->name('user.new');

    Route::post('/users/save', 'User\UserController@save')
        ->name('user.save');

    Route::get('/users/edit/{id}', 'User\UserController@edit')
        ->name('user.edit');

    Route::post('/users/update', 'User\UserController@update')
        ->name('user.update');











//    Route::get('/users/edit', 'User\UserController@edit')
//        ->name('user.edit.get');









    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});



//Route::get('/trans/addresses', '');

Auth::routes(['register' => false]);


