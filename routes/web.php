<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TimelogController;
use App\Http\Controllers\LeaveController;

Route::get('/',[LoginController::class,'login'])->name('login');
Route::match(['get', 'post'],'/login',[LoginController::class,'login'])->name('login');
Route::match(['get', 'post'], '/addTask',[TimelogController::class,'addTask'])->name('addTask')->middleware('auth');
Route::match(['get', 'post'], '/addLeave',[LeaveController::class,'addLeave'])->name('addLeave')->middleware('auth');
Route::get('/taskList',[TimelogController::class,'taskList'])->name('taskList')->middleware('auth');
Route::post('/ajax/editTask', [TimelogController::class, 'editTask'])->name('ajax.editTask')->middleware('auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/download', [TimelogController::class, 'download'])->name('download');
Route::post('/updateTask', [TimelogController::class, 'updateTask'])->name('updateTask');