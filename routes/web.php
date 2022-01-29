<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkspaceController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [App\Http\Controllers\WorkspaceController::class, 'index']);

Route::resource('workspace', WorkspaceController::class);
Route::resource('task', TaskController::class);
// Route::get('workspace/{workspace_id}', [WorkspaceController::class, 'show'])->name('show-workspace');
Route::get('update_task/{task}', [TaskController::class, 'updateTask'])->name('task.update-task');

Auth::routes();

Route::get('/home', [App\Http\Controllers\WorkspaceController::class, 'index'])->name('home');
