<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\TopicsController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\VocabController;


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


Route::get('login', [HomeController::class, 'login'])->name('login');

Route::get('register', [HomeController::class, 'register'])->name('register');

Route::get('forgot_password', [HomeController::class, 'forgot_password'])->name('forgot_password');

Route::get('logout',[UserController::class,'logout'])->middleware('auth')->name('get.logout');

// Route::get('home', [HomeController::class, 'home'])->name('home');
Route::post('login', [UserController::class, 'login_user'])->name('post.login');

 Route::middleware(['checklogin'])->group(function () {

    Route::get('user', [UserController::class, 'index'])->name('user.index');

    Route::get('topics',[UserController::class,'topics'])->name('user.topics');

 });

 Route::middleware('checkadmin')->group(function(){

    Route::get('admin.welcome', [AdminController::class, 'welcome'])->name('admin.welcome');

    Route::resource('topics', TopicsController::class);

    Route::resource('vocabulary', VocabController::class);

    Route::resource('lesson', LessonController::class);

    Route::resource('course', CourseController::class);

 });

 Route::get('test', function() {
     return view('pages.home');
 });


 Route::get('test1', function() {
    return view('pages.user');
});


