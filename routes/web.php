<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AdminController::class, 'index']);

Route::post('/admin-post', [AdminController::class, 'adminLogin'])->name('admin-post');
Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard']);
Route::get('/add/data', [AdminController::class, 'addData'])->middleware('auth')->name('add-data');
Route::post('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin-logout');
Route::get('/add/data/admin', [AdminController::class, 'addAdmin'])->middleware('auth')->name('admin-add');
Route::post('/add/data/post', [AdminController::class, 'addPost'])->middleware('auth')->name('admin-add-post');
