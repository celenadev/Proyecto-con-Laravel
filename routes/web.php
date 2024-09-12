<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;


Route::controller(TaskController::class)->group(function () {
    Route::get('/', 'index');
});
Route::resource('tasks', TaskController::class);




































////CREATE TASK
/// //    Route::get('/tasks', 'index');
//    Route::get('/tasks/create', 'create');
//
////SHOW TASK
//    Route::get('/tasks/{id}',  'show');
//
////STORE TASK
//    Route::post('/tasks', 'store');
//
////EDIT
//    Route::get('/tasks/{id}/edit', 'edit');
//
////UPDATE
//    Route::patch('/tasks/{task}','update');
//
////DESTROY
//    Route::delete('/tasks/{id}', 'destroy');










