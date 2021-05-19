<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PageTopicsController;
use App\Http\Controllers\PageVocabularyController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TopicsController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\VocabController;
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

// Route::get('home', [HomeController::class, 'home'])->name('home');




// quyền user được học các bài học trên pages
 Route::middleware(['checklogin','auth'])->group(function () {

    Route::get('user', [UserController::class, 'index'])->name('user.index');

    Route::get('page', [PageTopicsController::class, 'show_topics'])->name('page.showtopics');

    Route::get('start-topics/{id}', [PageTopicsController::class, 'start_topics'])->name('start_topics');

    Route::get('start-topics-vocabulary/{id}', [PageVocabularyController::class, 'start_vocabulary'])->name('start_vocabulary');

    Route::get('topics-vocabulary-remember/{id}', [PageVocabularyController::class,'remember_vocabulary'])->name('remember_vocabulary');

    Route::get('random-vocabulary-topics/{id}', [PageVocabularyController::class, 'random_vocabulary'])->name('random-vocabulary');


    Route::post('start-topics-vocabulary/{id}', [CommentController::class, 'PostComment'])->name('post.Comment_topic');

    Route::get('review-comments', [CommentController::class, 'review_comment'])->name('review-comments');

 });

 // quyền admin thêm sửa xóa các bài viết
 Route::middleware('checkadmin', 'auth')->group(function(){

    Route::get('admin.welcome', [AdminController::class, 'welcome'])->name('admin.welcome');

    Route::resource('topics', TopicsController::class);

    Route::resource('vocabulary', VocabController::class);

    Route::resource('lesson', LessonController::class);

    Route::resource('course', CourseController::class);

 });

//  Route::get('doiten', function() {
//      Schema::rename('vocabularys', 'vocabularies');
//  });


//  Route::get('test1', function() {
//     return view('pages.user');
// });

// Route::get('verifyEmail', function()
// {
//     $data = new stdClass();
//     $data->name = 'Hello' ;
//     $user = User::find('id');
//     Mail::to($user)->send(new VerifyEmail($data));
// });

Route::get('verifyEmail_noti', function()
{
    // $data = new stdClass();
    // $data->name = 'Hello' ;

    Notification::route('mail', 'quangtran@gmail.com')->notify(new VerifyEmail());
});
