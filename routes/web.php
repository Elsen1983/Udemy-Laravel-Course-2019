<?php

// 'import' the Controllers
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ToDoController;
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

Route::get('/', function () {
    return view('welcome');
});

/**
 * This way is not working anymore in new version of Laravel, so instead of it use the example below the comment section.
 * Route::get('todo', 'ToDoController@index'); --> Route::get('todo', [ToDoController::class, 'index']);
 */

Route::get('todo', [ToDoController::class, 'index']);

Route::get('about', [AboutController::class, 'index']);

Route::get('contact', [ContactController::class, 'index']);
