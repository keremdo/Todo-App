<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [TodoController::class, 'index'])->name('todolist');
Route::get('/todo-list', [TodoController::class, 'index'])->name('todolist');
Route::get('/pasive-todo-list', [TodoController::class, 'pasivetodos'])->name('pasivetodolist');
Route::get('/todo-detail/{id}', [TodoController::class, 'getUpdate'])->name('tododetail');
Route::delete('/todo-delete/{id}', [TodoController::class, 'destroy'])->name('todo.delete');
Route::post('/todo-details/{id}', [TodoController::class, 'update'])->name('todo.update');
Route::post('/todos', [TodoController::class, 'create'])->name('todos.create');
