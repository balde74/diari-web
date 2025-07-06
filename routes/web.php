<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\Frontend\HomeController;

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
    Route::resource('carousel',CarouselController::class);
    Route::resource('project',ProjectController::class);
    Route::resource('post',PostController::class);
    Route::resource('section',SectionController::class);
    Route::resource('page', PageController::class);

    Route::get('post/{id}/section',[PostController::class,'section'])->name('section');
    Route::get('section/{id}/create',[SectionController::class,'new_section'])->name('section_create');


    //status des status des events et post
    Route::get('event/{id}/action',[EventController::class,'publish'])->name('publish_event');
    Route::get('post/{id}/action',[PostController::class,'publish'])->name('publish_post');
    Route::get('page/{id}/action',[PageController::class,'publish'])->name('publish_page');


});
Auth::routes(['register'=> false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('pages/{slug}',[HomeController::class,'pageShow'])->name('page_show');
Route::get('posts/{slug}',[HomeController::class,'postShow'])->name('post_show');
Route::get('evenements/{id}',[HomeController::class,'eventShow'])->name('event_show'); //mettre a jour pour utiliser le slug a la place de l'ID
Route::get('projet/{slug}',[HomeController::class,'projectShow'])->name('project_show');
Route::get('realisations',[HomeController::class,'projects'])->name('projects');
// Route::get('en-cours-de-realisations',[HomeController::class,'projects'])->name('projects');
// web.php
Route::get('/projects/{status}', [HomeController::class, 'projectsByStatus'])->name('projects_by_status');


