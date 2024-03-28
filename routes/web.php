<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\EditStudentController;
use App\Http\Controllers\SchoolyearController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SemesterController;
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

    Route::get('admin/subject', [SubjectController::class,  'index']);

    Route::post('admin/subject', [SubjectController::class,  'addSubjectPost'])->name('subject.add.post');

    Route::put('admin/subject/edit/{id}', [SubjectController::class, 'update'])->name('subject.update');
     Route::delete('admin/subject/delete/{id}', [SubjectController::class, 'delete'])->name('subject.delete');



     //School year Route

     Route::get('admin/school/year', [SchoolyearController::class, 'index'])->name('school.year');
     Route::post('admin/school/year', [SchoolyearController::class, 'schoolYearPost'])->name('school.year.post');
      Route::put('admin/school/year/update/{id}', [SchoolyearController::class, 'update'])->name('school.year.update');
    Route::delete('admin/school/year/delete/{id}', [SchoolyearController::class, 'delete'])->name('school.year.delete');

    //Semester Route

    Route::get('admin/semester/', [SemesterController::class, 'index'])->name('semester');
    Route::post('admin/semester/', [SemesterController::class, 'create'])->name('semester.add.post');
    Route::put('admin/semester/status/deactive/{id}', [SemesterController::class,  'deactive'])->name('semester.deactive.status');
    Route::put('admin/semester/status/active/{id}', [SemesterController::class,  'active'])->name('semester.active.status');
    Route::put('admin/semester/update/{id}', [SemesterController::class,  'update'])->name('semester.update');
    Route::delete('admin/semester/delete/{id}', [SemesterController::class,  'delete'])->name('semester.delete');
  

});




