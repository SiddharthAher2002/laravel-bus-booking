<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\Index;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\FrontendController;

use Illuminate\Support\Facades\Auth;


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



// Frontend Controller routes

Route::get('/',[FrontendController::class,'index'])->name('home');

Route::group(['prefix'=>'bus','middleware' => ['auth']],function(){
    Route::get('/reg-form/create',[FrontendController::class,'showBusRegPage'])->name('bus.reg.show');
    Route::post('/reg-form/create',[FrontendController::class,'storeBusDetails'])->name('bus.reg.post');
});

Route::group(['prefix'=>'bus-book','middleware' => ['auth']],function(){

    Route::get('/create',[FrontendController::class,'showBookingForm'])->name('cus.show.booking');
    Route::post('/create',[FrontendController::class,'postBookingForm'])->name('cus.post.booking');
    Route::get('/{booking_date?}',[FrontendController::class,'retrieveBookingDetails'])->name('bus.on.date');
    Route::get('/{from?}/{to?}',[FrontendController::class,'getAvailableBuses'])->name('bus.get.available');
});

// Backend Admin routes
Route::group(['prefix'=>'admin','middleware' => ['auth', 'checkRole']],function(){
    Route::get('/index',[AdminController::class,'showDashboard'])->name('admin.index');
    
    Route::get('/bus-list/{searchTxt?}',[AdminController::class,'showBusList'])->name('admin.show.buslist');

    Route::get('/reg-form/create',[AdminController::class,'showRegForm'])->name('admin.bus.add');
    Route::post('/reg-form/create',[AdminController::class,'storeBusDetails'])->name('admin.bus.post');

    Route::get('/reg-form/{busId}/edit',[AdminController::class,'showEditRecord'])->name('admin.edit.bus');
    Route::post('/reg-form/{busId}',[AdminController::class,'updateEditRecord'])->name('admin.edit.post');
    
    // -----------------------------

    Route::get('/reg-form/{busId?}',[AdminController::class,'deleteBusReord'])->name('admin.delete.bus');

    Route::post('/bus-list/{busId?}',[AdminController::class,'updateActiveStatus'])->name('admin.toggle.isactive');

    Route::get('/bus-list/view/{busId?}',[AdminController::class,'showViewBus'])->name('admin.view.bus');
    Route::get('/bus-list/view/{busId?}/{date?}',[AdminController::class,'viewBusDetails'])->name('admin.view.seat.details');
});
Auth::routes();


