<?php

use App\Http\Controllers\MerchandiseController;
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
    return view('index');
});

Route::get('/test', function () {
    return view('testmodal');
});

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('insert-merchandise', [MerchandiseController::class, 'store']);

Route::put('update-merchandise', [MerchandiseController::class, 'edit']);

Route::delete('delete-merchandise', [MerchandiseController::class, 'destroy']);

Route::resource('/home', MerchandiseController::class);
