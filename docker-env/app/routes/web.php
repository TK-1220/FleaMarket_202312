<?php
use App\Http\Controllers\MainController;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\RegistrationController;

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



Route::group(['middleware' => 'auth'], function() {
    Route::get('/', [MainController::class, 'index'])->name('main.index');

    Route::get('/register_display', [RegistrationController::class, 'index'])->name('register.display');
    Route::post('/register_display', [RegistrationController::class, 'store']);
 });




Route::get('/sample', [SampleController::class, 'sample']);
Route::get('/register_comp', [SampleController::class, 'registercomp']);
// Route::get('/register_display', [SampleController::class, 'register_display'])->name('register.display');
Route::get('/register_complete', [SampleController::class, 'register_complete']);
Route::get('/purchase', [SampleController::class, 'purchase']);
Route::get('/buy_complete', [SampleController::class, 'buy_complete']);
Route::get('/mypage_edit', [SampleController::class, 'mypage_edit'])->name('my.edit');
Route::get('/reset', [SampleController::class, 'reset']);
Route::get('/mypage', [SampleController::class, 'mypage']);
Route::get('/detail', [SampleController::class, 'detail'])->name('detail.form');
Route::get('/display', [SampleController::class, 'display']);





// Route::get('/', function () {
    //     return view('home');
    // });
