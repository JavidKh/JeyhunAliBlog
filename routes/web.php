<?php

use App\Http\Controllers\Admin\AboutMeController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\InstagramController;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\WorkHistoryController;
use App\Http\Controllers\Admin\YoutubeController;
use App\Http\Controllers\Helpers\FileController;
use App\Http\Controllers\Helpers\FileV2Controller;
use App\Http\Controllers\TestController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');


    Route::get('slider', [SliderController::class, 'index'])->name('slider');
    Route::get('slider/create', [SliderController::class, 'create'])->name('slider.create');

    Route::delete('slider/{id}/delete', [SliderController::class, 'delete'])->name('slider.delete');
    Route::post('slider/{id}/update/', [SliderController::class, 'update'])->name('slider.update');
    Route::post('slider/add', [SliderController::class, 'add'])->name('slider.add');


    Route::get('about-me', [AboutMeController::class, 'index'])->name('about_me');
    Route::post('about-me', [AboutMeController::class, 'update'])->name('about_me.update');


    Route::get('/work-history', [WorkHistoryController::class, 'index'])->name('work_history');
    Route::get('work-history/create', [WorkHistoryController::class, 'create'])->name('work_history.create');
    Route::get('work-history/{id}/edit', [WorkHistoryController::class, 'edit'])->name('work_history.edit');

    Route::delete('work-history/{id}/delete', [WorkHistoryController::class, 'delete'])->name('work_history.delete');
    Route::post('work-history/{id}/update', [WorkHistoryController::class, 'update'])->name('work_history.update');
    Route::post('work-history/add', [WorkHistoryController::class, 'add'])->name('work_history.add');


    Route::get('events', [EventController::class, 'index'])->name('events');
    Route::get('events/create', [EventController::class, 'create'])->name('events.create');
    Route::get('events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');

    Route::delete('events/{id}/delete', [EventController::class, 'delete'])->name('events.delete');
    Route::post('events/{id}/update', [EventController::class, 'update'])->name('events.update');
    Route::post('events/add', [EventController::class, 'add'])->name('events.add');


    Route::get('offers', [OfferController::class, 'index'])->name('offers');
    Route::get('offers/create', [OfferController::class, 'create'])->name('offers.create');
    Route::get('offers/{id}/edit', [OfferController::class, 'edit'])->name('offers.edit');

    Route::delete('offers/{id}/delete', [OfferController::class, 'delete'])->name('offers.delete');
    Route::post('offers/{id}/update', [OfferController::class, 'update'])->name('offers.update');
    Route::post('offers/add', [OfferController::class, 'add'])->name('offers.add');


    Route::get('gallery', [GalleryController::class, 'index'])->name('gallery');
    Route::get('gallery/create', [GalleryController::class, 'create'])->name('gallery.create');

    Route::delete('gallery/{id}/delete', [GalleryController::class, 'delete'])->name('gallery.delete');
    Route::post('gallery/{id}/update/', [GalleryController::class, 'update'])->name('gallery.update');
    Route::post('gallery/add', [GalleryController::class, 'add'])->name('gallery.add');


    Route::get('youtube', [YoutubeController::class, 'index'])->name('youtube');
    Route::get('youtube/create', [YoutubeController::class, 'create'])->name('youtube.create');

    Route::delete('youtube/{id}/delete', [YoutubeController::class, 'delete'])->name('youtube.delete');
    Route::post('youtube/add', [YoutubeController::class, 'add'])->name('youtube.add');


    Route::get('instagram', [InstagramController::class, 'index'])->name('instagram');
    Route::get('instagram/create', [InstagramController::class, 'create'])->name('instagram.create');

    Route::delete('instagram/{id}/delete', [InstagramController::class, 'delete'])->name('instagram.delete');
    Route::post('instagram/add', [InstagramController::class, 'add'])->name('instagram.add');


    Route::get('contact', [ContactController::class, 'index'])->name('contact');
    Route::post('contact', [ContactController::class, 'update'])->name('contact.update');

    Route::get('links', [LinkController::class, 'index'])->name('links');
    Route::post('links/update', [LinkController::class, 'update'])->name('links.update');
});

Route::get('show-file/{object}/{id}/{item}/{slug}/', [FileController::class, 'showFile']);
Route::get('show-file/{object}/{item}/{slug}/', [FileV2Controller::class, 'showFile']);

