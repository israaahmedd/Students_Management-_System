<?php
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\productController;
use App\Http\Controllers\StudentController;
use App\Models\Department;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');


});
 Route::get('/home',function(){
    return view('Auth.home');
 });

Route::get('/notifications', [LoginController::class, 'sendNotification'])->name('notifyUser');


Route::get('/register',[RegisterController::class,'indexRegister'])->name('index.register');
Route::post('/handelRegister',[RegisterController::class,'handelRegister'])->name('handelRegister');



Route::get('/login',[LoginController::class,'indexLogin'])->name('index.login');
Route::post('/handelLogin', [LoginController::class,'handelLogin'])->name('handelLogin');
Route::get('/logout', [LoginController::class,'logout'])->name('logout');


Route::get('/index', [StudentController::class, 'index'])->name('index');
Route::get('/dept',[DepartmentController::class,'index'])->name('dept.index');
Route::get('/dept/{id}',[DepartmentController::class,'show'])->name('dept.show');

Route::get('/index/create',[StudentController::class, 'create'])->name('index.create');


 Route::post('/index/store',[StudentController::class,'store'])->name('index.store');
 Route::get('/index/{id}',[StudentController::class,'show'])->name('index.show');
 Route::get('/index/edit/{id}',[StudentController::class,'edit'])->name('index.edit');
 Route::put('/index/{id}',[StudentController::class,'update'])->name('index.update');


 Route::delete('/index/{ssn}', [StudentController::class,'destroy'])->name('index.destroy');//softDelete
 Route::get('archive',[StudentController::class,'archive'])->name('index.archive');//show


 Route::delete('/index/force/{id}', [StudentController::class, 'forceDelete'])->name('index.forceDelete');//forceDelete
 Route::post('/index/restore/{id}', [StudentController::class, 'restore'])->name('index.restore');
  


// Route::get('/showproduct{id}{name}',[productController::class,'show'])->name('showproduct');