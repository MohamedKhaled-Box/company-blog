<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

Route::get('switch-language/{lang}', function ($lang) {
    session(['lang' => $lang]);
    return redirect()->back();
})->name('switch.language');


Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/pros', [HomeController::class, 'project'])->name('pro');
Route::get('/pro/{id}', [HomeController::class, 'projectsShow'])->name('pro.show');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contactus', [HomeController::class, 'contactus'])->name('contactus');

Route::POST('/mail', [MailController::class, 'store'])->name('send-mail');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::resource('/projects', ProjectController::class);
    Route::resource('/roles', RoleController::class);
    Route::resource('/users', UserController::class);
    Route::get('/project/all', [ProjectController::class, 'getProjectsDatatable'])->name('projects.all');
    Route::get('/emails', [MailController::class, 'index'])->name('emails.index');
    Route::delete('/emails/{mail}', [MailController::class, 'destroy'])->name('emails.destroy');
    Route::get('/emails/create', [MailController::class, 'mailDraft'])->name('emails.draft');
    Route::post('/send-mail', [MailController::class, 'sendMail'])->name('send.mail');
    Route::post('/like', [LikeController::class, 'LikeProject'])->name('like');

    Route::resource('/users', UserController::class);
    Route::get('/profile', [HomeController::class, 'edit'])->name('edit.profile');

    Route::post('/comment', [CommentController::class, 'saveComment'])->name('comment');
    Route::get('/comment/{id}/edit', [CommentController::class, 'edit'])->name('comment.edit');
    Route::patch('/comment/{id}', [CommentController::class, 'update'])->name('comment.update');
    Route::delete('/comment/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');
});
