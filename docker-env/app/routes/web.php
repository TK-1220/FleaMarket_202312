<?php
use App\Http\Controllers\MainController;
use App\Http\Controllers\SampleController;
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





Route::get('/sample', [SampleController::class, 'sample']);
Route::get('/register_comp', [SampleController::class, 'registercomp']);
Route::get('/register_display', [SampleController::class, 'register_display']);
Route::get('/register_complete', [SampleController::class, 'register_complete']);




// Route::get('/', function () {
//     return view('home');
// });
