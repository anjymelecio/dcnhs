<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GradeLevelController;
use App\Http\Controllers\GradingController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\SchoolyearController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\StrandController;
use App\Http\Controllers\StrandSubjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;


use App\Http\Controllers\SectionController;
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

 //student route
  Route::get('admin/create/students', [StudentController::class, 'index'])->name('students.create');
   Route::post('admin/create/students', [StudentController::class, 'create'])->name('students.create.post');
   Route::get('admin/create/student/list', [StudentController::class, 'data'])->name('students.data');
   Route::put('admin/create/student/update{id}', [StudentController::class, 'update'])->name('students.data.update');
   Route::delete('admin/create/student/delete{id}', [StudentController::class, 'delete'])->name('students.data.delete');



//teacher route
Route::get('admin/create/teachers', [TeacherController::class, 'index'])->name('teachers.create');
Route::post('admin/create/teachers', [TeacherController::class, 'create'])->name('teachers.create.post');
Route::get('admin/teachers/list', [TeacherController::class, 'data'])->name('teachers.data');
Route::put('admin/teachers/update{id}', [TeacherController::class, 'update'])->name('teachers.data.update');
Route::delete('admin/teachers/delete{id}', [TeacherController::class, 'delete'])->name('teachers.data.delete');

//guardian route

Route::get('admin/create/guardians', [GuardianController::class, 'index'])->name('guardians.create');
Route::post('admin/create/guardians', [GuardianController::class, 'create'])->name('guardians.create.post');
Route::get('admin/guardians/list', [GuardianController::class, 'data'])->name('guardians.data');
Route::put('admin/guardians/update{id}', [GuardianController::class, 'update'])->name('guardians.update');


//Strand Route
   Route::get('/admin/add/strand', [StrandController::class, 'index'])->name('strand.index');

    
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin-dash');
    Route::get('/admin/data/table', [AdminController::class, 'adminTable'])->name('admin-table');





    // POST Routes
    Route::post('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin-logout');
    Route::post('/add/data/post', [AdminController::class, 'addPost'])->name('admin-add-post');
    Route::post('/admin/add/strand', [AdminController::class, 'strandPost'])->name('strand.post');

 


//Add subject route to strand

    //subject Route

    Route::get('admin/add/subjects/strand/{id}', [SubjectController::class, 'index'])->name('subject.index');





    //section route

    Route::get('/admin/section', [SectionController::class, 'index'])->name('section.index');
    Route::post('/admin/section', [SectionController::class, 'create'])->name('section.post.create');
    Route::put('/admin/section/update/{id}', [SectionController::class, 'update'])->name('section.post.update');
     Route::delete('/admin/section/delete{id}', [SectionController::class, 'delete'])->name('section.post.delete');










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
  

    //Grade level Route

    Route::get('admin/grade/level', [GradeLevelController::class, 'index'])->name('grade.level');
    Route::post('admin/grade/level', [GradeLevelController::class, 'gradeLevelPost'])->name('grade.level.post');
    Route::put('admin/grade/level/edit{id}', [GradeLevelController::class, 'update'])->name('grade.level.update');
     Route::delete('admin/grade/level/delete{id}', [GradeLevelController::class, 'delete'])->name('grade.level.delete');


     //grading route
  
  Route::get('admin/student/grades', [GradingController::class, 'index'])->name('grading.index');
    Route::put('admin/student/grades/update/{id}', [GradingController::class, 'update'])->name('grading.update');


    //classes route




    


});




