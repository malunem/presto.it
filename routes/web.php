<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RevisorController;
use App\Models\Announcement;
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

Route::get('/',[HomeController::class,'index'])->name('homepage');
Route::get('/announcement',[AnnouncementController::class,'newAnnouncement'])->name('newAnnouncement');
Route::post('/createAnnouncement',[AnnouncementController::class,'createAnnouncement'])->name('create.Announcement');
Route::get('/category/{category_id}', [HomeController::class, 'showCategory'])->name('show.Category');
Route::get('/announcement/detail/{announcement}', [AnnouncementController::class, 'showDetailAnnouncement'])->name('show.DetailAnnouncement');


// revisor area
Route::get('/revisor/homepage',[RevisorController::class,'index'])->name('revisor.homepage');

Route::post('/revisor/announcement/{id}/accept', [RevisorController::class, 'accept'])->name('revisor.accept');

Route::post('/revisor/announcement/{id}/reject', [RevisorController::class, 'reject'])->name('revisor.reject');
