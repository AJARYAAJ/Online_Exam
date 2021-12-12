<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/{exam_id}', [App\Http\Controllers\HomeController::class, 'exam']);
Route::post('/home/{exam_id}', [App\Http\Controllers\HomeController::class, 'result'])->name('result');
Route::get('/home/result/{exam_id}', [App\Http\Controllers\HomeController::class, 'showResult']);
Route::get('/admin/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');

Route::get('/admin/students', [App\Http\Controllers\Admin\HomeController::class, 'students'])->name('students');
Route::delete('/admin/students/destroy/{id}', [App\Http\Controllers\Admin\HomeController::class, 'destroy'])->name('students.destroy');
Route::get('/admin/students/{id}/edit', [App\Http\Controllers\Admin\HomeController::class, 'edit'])->name('students.edit');
Route::post('/admin/students/{id}/edit', [App\Http\Controllers\Admin\HomeController::class, 'update'])->name('students.update');
Route::get('/admin/students/{id}', [App\Http\Controllers\Admin\HomeController::class, 'show'])->name('students.show');

Route::get('/admin/register', [App\Http\Controllers\Admin\HomeController::class, 'showRegister'])->name('showRegister');
Route::post('/admin/register', [App\Http\Controllers\Admin\HomeController::class, 'Registration'])->name('admin.register');

Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->group(function () {
    // Exam
    Route::resource('/exams', 'ExamController');
    Route::delete('/exams/destroy/{id}', 'ExamController@destroy')->name('exams.destroy');
    // Question
    Route::resource('/questions', 'QuestionController');
    Route::delete('/questions/destroy/{id}', 'QuestionController@destroy')->name('questions.destroy');
    // Assign Exams
    Route::resource('/assign_exams', 'AssignExamController');
    Route::delete('/assign_exams/destroy/{id}', 'AssignExamController@destroy')->name('assign_exams.destroy');
    // Result
    Route::resource('/results', 'ResultController');
    Route::delete('/results/destroy/{id}', 'ResultController@destroy')->name('results.destroy');
});

