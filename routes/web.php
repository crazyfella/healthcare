<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

Route::get('/',  [HomeController::class, 'home']);

Route::get('/home', [HomeController::class, 'home']);

Route::get('/services', [HomeController::class, 'services']);

Route::get('/about', [HomeController::class, 'about']);

Route::get('/contact', [HomeController::class, 'contact']);

Route::post('contact-form', [InboxController::class, 'save_message']);

Route::get('/privacy-policy', [HomeController::class, 'privacy_policy']);

Route::get('/galleries', [HomeController::class, 'galleries']);

// ADMINISTRATOR routes

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin/index');
})->name('dashboard');
Route::resource('pages', PagesController::class)->middleware('auth');

Route::resource('employees', EmployeeController::class)->middleware('auth');
Route::get('admin/employee/delete/{id}', [EmployeeController::class, 'delete'])->name('delete')->middleware('auth');;

Route::resource('inbox', InboxController::class)->middleware('auth');
Route::delete('inboxDeleteAll', [InboxController::class, 'deleteAll'])->middleware('auth');
Route::get('admin/inbox/delete/{id}', [InboxController::class, 'delete'])->name('delete_message');

Route::resource('setting', SettingController::class)->middleware('auth');
Route::resource('gallery', GalleryController::class)->middleware('auth');
Route::get('admin/gallery/delete/{id}', [GalleryController::class, 'delete'])->name('delete-image')->middleware('auth');
Route::get('myprofile', [UserController::class, 'myprofile'])->middleware('auth');
Route::resource('user', UserController::class)->middleware('auth');
Route::resource('profile', ProfileController::class)->middleware('auth');