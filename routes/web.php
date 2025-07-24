<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StickerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardsController;
use App\Http\Controllers\Auth\ForgotPasswordController;



// use App\Http\Controllers\Controller;


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

// Route::get('', [Controller::class, 'index']);

//Admin routes
Route::get('/loginform', [LoginController::class, 'showform'])->name('login');
Route::post('/loginform', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


// DASHBOARDS //
Route::middleware('auth')->group(function () {

  Route::get('/', [DashboardsController::class, 'index'])->name('dashboard');
  Route::get('Setting', [SettingController::class, 'index'])->name('setting');
  //Setting
  Route::post('/update-setting', [SettingController::class, 'updatesetting'])->name('setting.update');

  //Stickers
  Route::get('/stickers', [StickerController::class, 'create'])->name('sticker.create');
  Route::post('/stickers', [StickerController::class, 'store'])->name('sticker.store');

  //List Stickers
  Route::get('/stickers/list', [StickerController::class, 'stickerlist'])->name('sticker.list');

  //Edit Stickers
  Route::get('/stickers/edit/{id}', [StickerController::class, 'edit'])->name('sticker.edit');
  
  //Update Sticker
  Route::post('/stickers/update/{id}', [StickerController::class, 'update'])->name('sticker.update');


});