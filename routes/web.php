<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User;
use App\Http\Controllers\TodoList;
use App\Http\Controllers\Home;


Route::middleware('RedirectIfAuthenticated')->group(function () {
    Route::get('/register', [User::class, 'register'])->name('register');
    Route::post('/register', [User::class, 'store'])->name('register.store');
    Route::get('/login', [User::class, 'loginPage'])->name('loginpage');
    Route::post('/login', [User::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [Home::class, 'index'])->name('home');
    Route::get('/CreateTodo',[TodoList::class,'CreatePage'] )->name('createtodo');
    Route::post('/CreateTodo', [TodoList::class, 'store'])->name('todo.store');
    Route::get('/logout', [User::class, 'logout'])->name('logout');
    
});

Route::middleware('TodoAuth')->group(function () {
    Route::put('/edit/{id}', [TodoList::class, 'edit'])->name('todo.edit');
    Route::delete('/delete/{id}', [TodoList::class, 'delete'])->name('todo.delete');
});

