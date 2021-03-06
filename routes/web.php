<?php

use Illuminate\Support\Facades\Route;

// 忘れないで！！
use App\Http\Controllers\HelloController;
use App\Http\Controllers\BMIController;
use App\Http\Controllers\NoteController;

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

Route::get('/notes', [NoteController::class, 'index'])->name('notes');
Route::get('/notes/new', [NoteController::class, 'new'])->name('notes.new');
Route::get('/notes/{noteId}', [NoteController::class, 'show'])->name('get')->where(['noteId' => '[0-9]+']);
Route::post('/notes', [NoteController::class, 'store'])->name('notes.create');

// 更新と削除
Route::get('/notes/{noteId}/edit', [NoteController::class, 'edit'])->name('notes.edit')->where(['noteId' => '[0-9]+']);
Route::put('/notes/{noteId}', [NoteController::class, 'update'])->name('notes.update')->where(['noteId' => '[0-9]+']);
Route::delete('/notes/{noteId}', [NoteController::class, 'delete'])->name('notes.delete')->where(['noteId' => '[0-9]+']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', [HelloController::class, 'hello']);

Route::get('/books/{bookNo}', function($bookNo){
    echo "<h1>" . $bookNo . "番の本ですよ！！</h1>";
});

Route::get('/greet', [HelloController::class, 'greet']);

Route::get('/judge/{number}', function($number){
    return view('judge', ['number' => $number]);
})->where('number', '[0-9]+');

Route::get('/bmi', [BMIController::class, 'index'])->name('bmi');

Route::post('/bmi/send', [BMIController::class, 'store'])->name('bmi.store');
