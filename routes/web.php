<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\ProjectController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [ProjectController::class, 'mainPage'])->name('main.page');
Route::POST('/mail', [MailController::class, 'store'])->name('send-mail');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    Route::resource('/projects', ProjectController::class);
    Route::get('/project/all', [ProjectController::class, 'getProjectsDatatable'])->name('projects.all');
    Route::get('/emails', [MailController::class, 'index'])->name('emails.index');
    Route::delete('/emails/{mail}', [MailController::class, 'destroy'])->name('emails.destroy');
    Route::get('/emails/create', [MailController::class, 'mailDraft'])->name('emails.draft');
    Route::post('/send-mail', [MailController::class, 'sendMail'])->name('send.mail');
});