<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\DocumentationController;

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

Route::middleware('auth')->group(function()
{
    Route::resource('district',DistrictController::class);
    Route::resource('user',UserController::class);
    Route::resource('event',EventController::class);
    Route::resource('staff',StaffController::class);
    Route::resource('partner',PartnerController::class);
    Route::resource('documentation',DocumentationController::class);

    //status des evenements
    Route::get('event/{id}/action',[EventController::class,'publish'])->name('publish_event');


});
Auth::routes(['register'=> false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
