<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopicController;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [TopicController::class, 'topicList']);

//作成ページを返す
Route::get('/create', [TopicController::class, 'new']);

Route::post('/create', [TopicController::class, 'create']);

Route::get('/topics/{topicId}', [TopicController::class, 'show'])->name('topics.show');

Route::post('/topics/{topicId}', [TopicController::class, 'comment']);
