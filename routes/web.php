<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AdminController::class, 'admin']);

// student 
Route::resource('student', StudentController::class);
Route::get('student/delete/{id}', [StudentController::class, 'delete'])
    ->name('student.delete');

// route teacher
Route::resource('teachers', TeacherController::class);
Route::get('teachers/delete/{id}', [TeacherController::class, 'delete'])
    ->name('teachers.delete');

// courses
Route::resource('courses', CourseController::class);
Route::get('courses/delete/{id}', [CourseController::class, 'delete'])
    ->name('courses.delete');

// batch
Route::resource('batches', BatchController::class);
Route::get('batches/delete/{id}', [BatchController::class, 'delete'])
    ->name('batches.delete');

// enrollment
Route::resource('enrolls', EnrollmentController::class);
Route::get('enrolls/delete/{id}', [EnrollmentController::class, 'delete'])
    ->name('enrolls.delete');

Route::resource('payments', PaymentController::class);
Route::get('payments/delete/{id}', [PaymentController::class, 'delete'])
    ->name('payments.delete');

Route::get('generate-pdf', [PrintController::class, 'generatePDF'])
    ->name('generate.pdf');


// users 
Route::resource('users', UserController::class);
Route::get('users/delete/{id}', [userController::class, 'delete'])
    ->name('users.delete');


Route::get('login', [LoginController::class, 'create'])
    ->name('login');
Route::get('login/save', [LoginController::class, 'save'])
    ->name('login.save');
Route::get('logout',[AdminController::class, 'logout']);