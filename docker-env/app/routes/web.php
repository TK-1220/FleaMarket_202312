<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\MyToolController;
use App\Http\Controllers\AdminController;

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
Auth::routes();
Route::get('/', [MainController::class, 'index'])->name('main.index');

Route::group(['middleware' => 'auth'], function() {
    // Main
    Route::post('/ajaxlike', 'MainController@ajaxlike')->name('main.ajaxlike');
    Route::post('/', [MainController::class, 'search']);
    Route::get('/purchase/{displayId}/form', [MainController::class, 'handler'])->name('main.handler');
    Route::post('/purchase/{displayId}/form', [MainController::class, 'procedure']);

    // Register
    Route::get('/registration/register', [RegistrationController::class, 'index'])->name('register.display');
    Route::post('/registration/register', [RegistrationController::class, 'store']);
    Route::get('/registration/{displayId}/edit', [RegistrationController::class, 'edit'])->name('edit.display');
    Route::post('/registration/{displayId}/edit', [RegistrationController::class, 'update']);
    Route::get('/registration/{displayId}/delete', [RegistrationController::class, 'destroy'])->name('delete.display');

    // Detail
    Route::get('/display/{displayId}/detail', [DisplayController::class, 'detail'])->name('detail.display');
    Route::post('/display/{displayId}/detail', [DisplayController::class, 'detail']);
    Route::get('/display/{user_id}/profile', [DisplayController::class, 'profile'])->name('profile.index');
    Route::post('/display/{user_id}/profile', [DisplayController::class, 'follow']);

    //My Page
    Route::get('/mypage/{user_id}/home', [MyToolController::class, 'index'])->name('mypage.index');
    Route::get('/mypage/{user_id}/edit', [MyToolController::class, 'edit'])->name('mypage.edit');
    Route::post('/mypage/{user_id}/edit', [MyToolController::class, 'update']);
    Route::get('/mypage/{user_id}/delete', [MyToolController::class, 'destroy'])->name('mypage.delete');
    Route::get('/mypage/{user_id}/follow', [MyToolController::class, 'follow'])->name('mypage.follow');

    // Admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/users/{id}/delete', [AdminController::class, 'deleteUsers'])->name('admin.deleteUser');
    Route::get('/admin/displays', [AdminController::class, 'displays'])->name('admin.displays');
    Route::get('/admin/displays/{id}/delete', [AdminController::class, 'deleteDisplay'])->name('admin.deleteDisplay');


});
