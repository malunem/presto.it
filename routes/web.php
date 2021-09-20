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
Route::post('/locale/{locale}', [HomeController::class, 'locale'])->name('locale');
Route::get('/announcement',[AnnouncementController::class,'newAnnouncement'])->name('newAnnouncement');
Route::post('/createAnnouncement',[AnnouncementController::class,'createAnnouncement'])->name('create.Announcement');
Route::post('/announcement/images/upload',[AnnouncementController::class,'announcementimages'])->name('announcement.images.upload');
Route::delete('/announcement/images/remove',[AnnouncementController::class,'removeImage'])->name('announcement.images.remove');

Route::delete('/announcement/images',[AnnouncementController::class,'getImage'])->name('announcement.images');

Route::get('/category/{category_id}', [HomeController::class, 'showCategory'])->name('show.Category');
Route::get('/announcement/detail/{announcement}', [AnnouncementController::class, 'showDetailAnnouncement'])->name('show.DetailAnnouncement');
Route::get('/search',[HomeController::class,'search'])->name('search');
Route::get('/revisor/request',[HomeController::class,'revisorRequest'])->name('revisor.request');
Route::post('/revisorSubmit', [HomeController::class, 'revisorSubmit'])->name('revisorSubmit');

// revisor area
Route::get('/revisor/homepage',[RevisorController::class,'index'])->name('revisor.homepage');

Route::post('/revisor/announcement/{id}/accept', [RevisorController::class, 'accept'])->name('revisor.accept');

Route::post('/revisor/announcement/{id}/reject', [RevisorController::class, 'reject'])->name('revisor.reject');
Route::post('/revisor/announcement/{id}/undo', [RevisorController::class, 'undo'])->name('revisor.undo');

