<?php

use App\Http\Controllers\AdminController;
use Database\Seeders\AdminSeeder;
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
Route::middleware('admin')->group(function(){
    
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin-dash');
    Route::get('/add/data', [AdminController::class, 'addData'])->name('add-data');
    Route::post('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin-logout');
    Route::get('/add/data/admin', [AdminController::class, 'addAdmin'])->name('admin-add');
    Route::post('/add/data/post', [AdminController::class, 'addPost'])->name('admin-add-post');
    Route::get('/admin/add', [AdminController::class, 'addData'])->name('all-data-admin');
    Route::get('/admin/data/table', [AdminController::class, 'adminTable'])->name('admin-table');
    Route::get('/admin/add/students', [AdminController::class, 'addStudents'])->name('students.add');
    
});




