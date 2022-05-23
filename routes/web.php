<?php

// 'import' the Controllers
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ToDo\ToDoController;

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

// Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('todo', [ToDoController::class, 'index']);
Route::get('todo/{todo}', [ToDoController::class, 'show']);
Route::get('add-todo', [ToDoController::class, 'create']);
Route::post('save-todo', [ToDoController::class, 'save']);

//for get edit view
Route::get('todo/{todo}/edit', [TodoController::class, 'edit']);
//for send the updated form values from edit view
Route::post('todo/{todo}/update-todo', [ToDoController::class, 'update']);
//for delete a todo
Route::get('todo/{todo}/delete', [TodoController::class, 'destroy']);


Auth::routes();
