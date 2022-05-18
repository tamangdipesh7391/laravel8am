<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;


Route::get('/', function () {
    return view('index');
});

Route::any('/add-student',[StudentController::class,'create']);
Route::get('/display-student',[StudentController::class,'index']);
Route::get('/delete-student/{id}',[StudentController::class,'destroy']);
Route::any('/edit-student/{id}',[StudentController::class,'edit']);
Route::any('/view-student/{id}',[StudentController::class,'show']);






// Route::get('/add-course', function(){
//     return view('pages.course.add');
// });

// Route::get('/display-student', function(){
//     return view('pages.student.index');
// });
// Route::get('/display-course', function(){
//     return view('pages.course.index');
// });



