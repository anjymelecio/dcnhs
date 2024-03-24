<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\EditStudentController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StrandController;
use App\Http\Controllers\SubjectController;
use App\Http\Middleware\Admin;
use App\Models\Student;
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
    Route::get('/admin/data', [AdminController::class, 'addData'])->name('all-data-admin');
    Route::get('/admin/data/table', [AdminController::class, 'adminTable'])->name('admin-table');
    Route::get('/admin/students', [AdminController::class, 'addStudents'])->name('students.add');
    Route::get('/admin/add/parents', [AdminController::class, 'addParents'])->name('parents.add');
   //Route::get('/admin/add/strand', [StrandController::class, 'index']);
    Route::get('/admin/section', [SectionController::class, 'index'])->name('section');
    Route::get('/admin/teacher', [AdminController::class, 'teacher'])->name('teacher.add');

    // POST Routes
    Route::post('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin-logout');
    Route::post('/add/data/post', [AdminController::class, 'addPost'])->name('admin-add-post');
    Route::post('/admin/students', [AdminController::class, 'addStudentsPost'])->name('students.add.post');
    Route::post('/admin/add/parents', [AdminController::class, 'addParentsPost'])->name('add.parents.post');
    Route::post('/admin/add/strand', [AdminController::class, 'strandPost'])->name('strand.post');
    Route::post('/admin/section', [AdminController::class, 'addSection'])->name('section.post');
    Route::post('/admin/teacher', [AdminController::class, 'addTeacher'])->name('teacher.add.post');

    // PUT Route
    Route::put('/admin/students/{id}', [EditStudentController::class, 'updateStudent'])->name('students.update');
    Route::put('/admin/section{id}', [AdminController::class, 'updateSection'])->name('section.update');

    // DELETE Route
    Route::delete('/admin/students/{id}',[EditStudentController::class,'archiveStudent'])->name('student.delete');


    //subject Route
   
    Route::get('admin/strand', [SubjectController::class,  'index']);
    Route::get('admin/add/subject/{id}', [SubjectController::class, 'addSubject']);
    Route::get('admin/{strand_id}/subject/{subject_id}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');
   Route::put('admin/{strand_id}/subject/{subject_id}/edit', [SubjectController::class, 'update'])->name('subjects.update');
   Route::delete('admin/subject/{subject_id}/delete', [SubjectController::class, 'delete'])->name('subjects.delete');
    Route::post('admin/add/subject/{id}', [SubjectController::class, 'addSubjectPost'])->name('add.subject.post');

    //classes Route
    Route::get('admin/teacher/class/{id}', [ClassController::class, 'index'])->name('teacher.class');
});




