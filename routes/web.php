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

Route::get('/', 'Home\MainPageController@show')
    ->name('home.mainPage');

Route::get('/freights', 'Freight\FreightController@list')
    ->name('freight.list.active');

Route::get('/freights/details/{id}', 'Freight\FreightController@details')
    ->name('freight.details');

Route::group(['middleware' => ['auth']], function() {




    //FREIGHTS
    Route::get('/freights/new', 'Freight\FreightController@new')
        ->name('freight.new');

    Route::post('/freights/save', 'Freight\FreightController@save')
        ->name('freight.save');

    Route::get('/freights/archive', 'Freight\FreightController@archive')
        ->name('freight.list.archive');

    Route::post('/freight/disable', 'Freight\FreightController@disable')
        ->name('freight.disable');




    //USERS
    Route::get('/users', 'User\UserController@list')
        ->name('user.list');

    Route::post('/users/disable', 'User\UserController@disableUser')
        ->name('user.disable');

    Route::get('/users/disabled', 'User\UserController@disableList')
        ->name('user.disable.list');

    Route::post('users/enable', 'User\UserController@enableUser')
        ->name('user.enable');

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

    //MY PROFILE
    Route::get('/profile', 'User\UserController@showProfile')
        ->name('user.profile.show');

    Route::post('/profile/update', 'User\UserController@updateProfile')
        ->name('user.profile.update');










//    Route::get('/users/edit', 'User\UserController@edit')
//        ->name('user.edit.get');









    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});



//Route::get('/trans/addresses', '');

Auth::routes(['register' => false]);


