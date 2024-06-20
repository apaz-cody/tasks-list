<?php

use App\Http\Requests\TaskRequest;
// use App\Models\Task;
use App\Http\Controllers\TasksController;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::prefix('tasks')->group(function () {
    Route::get('/', [TasksController::class, 'index'])->name('tasks.index');
    Route::post('/', [TasksController::class , 'create'])->name('tasks.store');
    Route::put('/{task}', [TasksController::class , 'update'] )->name('tasks.update');
    Route::delete('/{task}', [TasksController::class,'destroy'])->name('tasks.destroy');
    Route::put('/{task}/toggle-complete', [TasksController::class, 'toogleComplete'])->name('tasks.toggle-complete');
    Route::view('/create', [TasksController::class,'create'])->name('tasks.create');
    Route::get('/{task}/edit', [TasksController::class , 'edit'])->name('tasks.edit');
    Route::get('/{task}', [TasksController::class , 'show'])->name('tasks.show');
});

Route::fallback(function () {
    return 'Page Not Found!';
});