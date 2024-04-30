<?php

use App\Http\Controllers\PDFController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::post('/register',[StudentController::class,'register']);

Route::get('/student',[StudentController::class,'students']);

Route::get('/student/{id}/edit',[StudentController::class,'edit']);

Route::patch('/student/{id}/update',[StudentController::class,'update']);

Route::delete('/student/{id}/delete',[StudentController::class,'delete']);

Route::get('/generatepdf',[PDFController::class,'generatePdf']);

Route::get('/gen',[PDFController::class,'gen']);

Route::get('/export-student',[StudentController::class,'export']);