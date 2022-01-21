<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TodoListController;
use Illuminate\Support\Facades\Route;


Route::apiResource('todo-list', TodoListController::class);
Route::apiResource('todo-list.task', TaskController::class)
    ->except('show')
    ->shallow();

/*Route::get('task', [TaskController::class, 'index'])->name('task.index');
Route::post('task', [TaskController::class, 'store'])->name('task.store');
Route::delete('task/{task}', [TaskController::class, 'destroy'])->name('task.destroy');*/

/*Route::get('todo-list', [TodoListController::class, 'index'])->name('todo-list.index');
Route::get('todo-list/{todo_list}', [TodoListController::class, 'show'])->name('todo-list.show');
Route::post('todo-list', [TodoListController::class, 'store'])->name('todo-list.store');
Route::delete('todo-list/{todo_list}', [TodoListController::class, 'delete'])->name('todo-list.destroy');
Route::patch('todo-list/{todo_list}', [TodoListController::class, 'update'])->name('todo-list.update');*/
