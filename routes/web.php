<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StrandController;
use App\Http\Middleware\Admin;
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
    Route::get('/admin/add/parents', [AdminController::class, 'addParents'])->name('parents.add');
    Route::post('/admin/add/parents', [AdminController::class, 'addParentsPost'])->name('add.parents.post');
    Route::get('/admin/add/strand', [StrandController::class, 'index']);
    Route::get('/admin/section', [SectionController::class, 'index'])->name('section');
   Route::post('/admin/add/strand', [AdminController::class, 'strandPost'])->name('strand.post');
    Route::post('/admin/section', [AdminController::class, 'addSection'])->name('section.post');

   Route::get('/admin/teacher', [AdminController::class, 'teacher'])->name('teacher.add');

});




