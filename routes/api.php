<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource('students', StudentController::class);
// Route::get('/students',[ StudentController::class ,'index'])->name('student.index') ;
// Route::get('/students',[ StudentController::class ,'show'])->name('student.show') ;
//  Route::post('/students',[ StudentController::class ,'store'])->name('student.store') ;
//  Route::put('/students/{id}',[ StudentController::class ,'update'])->name('student.update') ;
//  Route::delete('/students/{id}',[ StudentController::class ,'destroy'])->name('student.destroy') ;  