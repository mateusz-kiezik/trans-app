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

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});



//Route::get('/trans/addresses', '');

Auth::routes(['register' => false]);


