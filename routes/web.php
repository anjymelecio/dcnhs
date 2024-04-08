<?php

use App\Http\Controllers\AddClassController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\GradeLevelController;
use App\Http\Controllers\GradingController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\SchoolyearController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\StrandController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;


use App\Http\Controllers\SectionController;
use App\Http\Controllers\StrandSubController;
use App\Http\Controllers\StudentLoginController;
use App\Http\Controllers\TeacherLoginController;
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
Route::get('/teacher/login', [TeacherLoginController::class, 'index']);
Route::post('/teacher/login/post', [TeacherLoginController::class, 'login'])->name('teacher.login');

// login teacher

Route::get('/', [AdminController::class, 'index']);






//login users
Route::post('/admin-post', [AdminController::class, 'adminLogin'])->name('admin-post');
Route::middleware('admin')->group(function(){

 //student route
  Route::get('admin/create/students', [StudentController::class, 'index'])->name('students.create');
   Route::post('admin/create/students', [StudentController::class, 'create'])->name('students.create.post');
   Route::get('admin/create/student/list', [StudentController::class, 'data'])->name('students.data');
   Route::put('admin/create/student/update{id}', [StudentController::class, 'update'])->name('students.data.update');
   Route::delete('admin/create/student/delete{id}', [StudentController::class, 'delete'])->name('students.data.delete');
   Route::get('admin/student/archive', [StudentController::class, 'archive'])->name('students.data.archive');
   Route::get('admin/student/archive', [StudentController::class, 'archive'])->name('students.data.archive');
   Route::patch('admin/student/restore/{id}', [StudentController::class, 'restore'])->name('students.data.restore');


//teacher route
Route::get('admin/create/teachers', [TeacherController::class, 'index'])->name('teachers.create');
Route::post('admin/create/teachers', [TeacherController::class, 'create'])->name('teachers.create.post');
Route::get('admin/teachers/list', [TeacherController::class, 'data'])->name('teachers.data');
Route::put('admin/teachers/update{id}', [TeacherController::class, 'update'])->name('teachers.data.update');
Route::delete('admin/teachers/delete{id}', [TeacherController::class, 'delete'])->name('teachers.data.delete');
Route::get('admin/teachers/archive', [TeacherController::class, 'archive'])->name('teachers.data.archive');
Route::patch('admin/teachers/archive/{id}', [TeacherController::class, 'restore'])->name('teachers.data.restore');

//guardian route

Route::get('admin/create/guardians', [GuardianController::class, 'index'])->name('guardians.create');
Route::post('admin/create/guardians', [GuardianController::class, 'create'])->name('guardians.create.post');
Route::get('admin/guardians/list', [GuardianController::class, 'data'])->name('guardians.data');
Route::put('admin/guardians/update{id}', [GuardianController::class, 'update'])->name('guardians.update');
Route::delete('admin/guardians/delete{id}', [GuardianController::class, 'delete'])->name('guardians.delete');
Route::get('admin/guardians/archive', [GuardianController::class, 'archive'])->name('guardians.archive');

//Strand Route
   Route::get('/admin/add/strand', [StrandController::class, 'index'])->name('strand.index');
Route::post('/admin/add/strand', [StrandController::class, 'strandPost'])->name('strand.post');
Route::put('/admin/add/strand/update/{id}', [StrandController::class, 'update'])->name('strand.update');  
Route::delete('/admin/add/strand/delete/{id}', [StrandController::class, 'delete'])->name('strand.delete'); 


//Add subject route to strand
  Route::get('admin/strand/add/subject/{id}', [StrandSubController::class, 'index'])->name('strandsub.index');
  Route::post('admin/strand/add/subject/{id}', [StrandSubController::class, 'create'])->name('strandsub.create');
  Route::delete('admin/strand/delete/{id}', [StrandSubController::class, 'delete'])->name('strandsub.delete');

    //subject Route

  Route::get('admin/subjects/create', [SubjectController::class, 'index'])->name('subject.index');
  Route::post('admin/subjects/create', [SubjectController::class, 'create'])->name('subject.create');
  Route::put('admin/subjects/update/{id}', [SubjectController::class, 'update'])->name('subject.update');
  Route::delete('admin/subjects/delete/{id}', [SubjectController::class, 'delete'])->name('subject.delete');

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
  

    //Grade level Route

    Route::get('admin/grade/level', [GradeLevelController::class, 'index'])->name('grade.level');
    Route::post('admin/grade/level', [GradeLevelController::class, 'gradeLevelPost'])->name('grade.level.post');
    Route::put('admin/grade/level/edit{id}', [GradeLevelController::class, 'update'])->name('grade.level.update');
     Route::delete('admin/grade/level/delete{id}', [GradeLevelController::class, 'delete'])->name('grade.level.delete');


     //grading route
  
  Route::get('admin/grades', [GradingController::class, 'index'])->name('grading.index');
    Route::put('admin/grades/update/{id}', [GradingController::class, 'update'])->name('grading.update');


    //classes route
    Route::get('admin/classes', [ClassesController::class, 'index'])->name('classes.index');

Route::get('admin/classes/fetch/section', [ClassesController::class, 'fetchSection'])->name('classes.fetch.section');
Route::post('admin/classes/create', [ClassesController::class, 'create'])->name('classes.create.post');



//add class to strand
Route::get('admin/classes/fetch/data{id}', [AdminController::class, 'fetchdata'])->name('classes.fetchdata');
Route::get('admin/classes/strand/{strand}/{id}', [AddClassController::class, 'index'])->name('strand.class');
Route::post('admin/classes/strand/create/{id}', [AddClassController::class, 'create'])->name('strand.class.create');
Route::put('admin/classes/strand/update/{id}', [AddClassController::class, 'update'])->name('strand.class.update');
Route::delete('admin/classes/strand/delete/{id}', [AddClassController::class, 'delete'])->name('strand.class.delete');
   







//admin route
Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin-dash');
Route::get('/admin/data/table', [AdminController::class, 'adminTable'])->name('admin-table');
Route::middleware(['superAdmin'])->prefix('admin/create')->group(function () {
    Route::get('admin/create/admin', [AdminController::class, 'addAdmin'])->name('admin.create');
    Route::post('admin/create/admin', [AdminController::class, 'create'])->name('admin.create.post');
    Route::get('admin/data/admin', [AdminController::class, 'data'])->name('admin.data');
   Route::put('admin/data/admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
   Route::delete('admin/data/admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
    Route::get('admin/data/admin/archive', [AdminController::class, 'archive'])->name('admin.archive');
    

});

 Route::post('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin-logout');

});





Route::middleware('teacher')->group(function(){
  Route::get('/teacher/dashboard', [TeacherLoginController::class, 'dashboard']);
  Route::post('/teacher/logout', [TeacherLoginController::class, 'logout'])->name('teacher.logout');
});
  


