<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminlistenController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\AdminStoryController;
use App\Http\Controllers\AdminStoryImageController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ListenController;
use App\Http\Controllers\PageExamController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PageStoryController;
use App\Http\Controllers\PageTopicsController;
use App\Http\Controllers\PageVocabularyController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TopicsController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\VocabController;
use App\Http\Controllers\WordFalseController;
use App\Http\Controllers\WordTrueController;
// use App\Mail\VerifyEmail;
use Illuminate\Notifications\Events\NotificationSent;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification as FacadesNotification;
use Illuminate\Support\Facades\Schema;
use App\Notifications\VerifyEmail;

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

// User Đăng nhập
Route::get('login', [UserController::class, 'login'])->middleware('guest')->name('login');

Route::post('login', [UserController::class, 'login_user'])->middleware('my_verified')->name('post.login');

// User Đăng ký
Route::get('register', [RegisterController::class, 'register'])->name('register');

Route::post('register', [RegisterController::class, 'register_user'])->name('post.register');


Route::get('verify-email/{id}', [RegisterController::class, 'verifyEmail'])->name('verify-email');



// Forgot Pass
Route::get('forgot_password', [RegisterController::class, 'forgot_password'])->name('forgot_password');

Route::post('forgot_password', [RegisterController::class,'forgotPassword'])->name('post.forgotPassword');

Route::get('newPassword/{id}', [RegisterController::class, 'ShowNewPassword'])->name('show.newPassword');

Route::post('newPassword/{id}', [RegisterController::class,'ResetPassword'])->name('post.newPassword');



// Logout
Route::get('logout',[UserController::class,'logout'])->middleware('auth')->name('get.logout');


 Route::middleware(['checklogin','auth'])->group(function () {

    Route::get('user', [UserController::class, 'index'])->name('user.index');

    Route::get('show-course', [PageTopicsController::class, 'showCourse'])->name('show_courses');

    Route::get('page', [PageTopicsController::class, 'show_topics'])->name('page.showtopics');

    Route::get('start-topics/{id}', [PageTopicsController::class, 'start_topics'])->name('start_topics');

    Route::get('start-topics-vocabulary/{id}', [PageVocabularyController::class, 'start_vocabulary'])->name('start_vocabulary');

    Route::get('topics-vocabulary-remember/{id}', [PageVocabularyController::class,'remember_vocabulary'])->name('remember_vocabulary');

    Route::get('random-vocabulary-topics/{id}', [PageVocabularyController::class, 'random_vocabulary'])->name('random-vocabulary');

    Route::post('start-topics-vocabulary/{id}', [CommentController::class, 'PostComment'])->name('post.Comment_topic');

    Route::get('review-comments', [CommentController::class, 'review_comment'])->name('review-comments');

    Route::get('start-listen', [ListenController::class, 'start_listen'])->name('get.start_listen');

    Route::get('start-listen/{id}', [ListenController::class, 'start_listen_id'])->name('start_listen_one');

    Route::get('start-listen-two/{id}', [ListenController::class,'show_listen_two'])->name('start_listen_two');

    Route::get('start-story', [PageStoryController::class, 'showStory'])->name('show_story');

    Route::get('start-story/{id}', [PageStoryController::class , 'startStory'])->name('start_story');

    Route::get('start-story-vocabulary/{id}', [PageStoryController::class, 'storyVocabulary'])->name('story_vocabulary');

    Route::get('start-story-remember/{id}', [PageStoryController::class, 'startRemember'])->name('story_remmember');

    Route::get('exams', [PageExamController::class, 'showExams'])->name('show_exams');

    Route::get('start-exams', [PageExamController::class, 'startExams'])->name(('start_exams'));


 });


 Route::middleware('checkadmin', 'auth')->group(function(){

    Route::get('admin.welcome', [AdminController::class, 'welcome'])->name('admin.welcome');

    Route::resource('topics', TopicsController::class);

    Route::resource('vocabulary', VocabController::class);

    Route::resource('lesson', LessonController::class);

    Route::resource('course', CourseController::class);

    Route::resource('listen', AdminlistenController::class);

    Route::resource('word_true', WordTrueController::class);

    Route::resource('word_false', WordFalseController::class);

    Route::resource('show_users', AdminsController::class);

    Route::resource('story', AdminStoryController::class);

    Route::resource('story_image', AdminStoryImageController::class);

 });
