<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\MessagesController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\MessagesController::class, 'index'])->name('home');

Auth::routes();

Route::get('/create/{id?}/{subject?}', [App\Http\Controllers\MessagesController::class, 'create'])->name('create');

Route::post('/send', [App\Http\Controllers\MessagesController::class, 'send'])->name('send');

Route::get('/sent', [App\Http\Controllers\MessagesController::class, 'sent'])->name('sent');

Route::get('/read/{id}', [App\Http\Controllers\MessagesController::class, 'read'])->name('read');

Route::get('/delete/{id}', [App\Http\Controllers\MessagesController::class, 'delete'])->name('delete');

Route::get('/deleted', [App\Http\Controllers\MessagesController::class, 'deleted'])->name('deleted-messages');

Route::get('/return/{id}', [App\Http\Controllers\MessagesController::class, 'return'])->name('return');
