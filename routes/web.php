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
Route::post('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin-logout');