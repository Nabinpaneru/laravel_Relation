<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(IndexController::class)->group(function(){
    Route::get('/addclub','index')->name('add.club');
    Route::post('/storeclub','store')->name('club.store');
    Route::get('/allclub','all_club')->name('all.club');
    Route::get('/editclub/{id}','edit_club')->name('edit.club');
    Route::get('/deletelub/{id}','delete_club')->name('delete.club');
    Route::post('/updateclub/{id}','update_club')->name('update.club');
    Route::get('/allplayer','all_player')->name('all.player');
    Route::get('/addplayer','add_player')->name('add.player');
    Route::post('/storeplayer','store_player')->name('store.player');
    Route::get('/editplayer/{id}','edit_player')->name('edit.player');
    Route::get('/deleteplayer/{id}','delete_player')->name('delete.player');

});



