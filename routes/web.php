<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\LetterTypesController;
use App\Http\Controllers\LettersController;
// use App\Http\Controllers\LetterTypesController\exportExcel;

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



Route::middleware(['IsGuest'])->group(function(){
    Route::prefix('/login')->name('login.')->group(function(){
        Route::get('/', [LoginController::class, 'index'])->name('home');
        Route::post('/auth', [LoginController::class, 'auth'])->name('auth');
    });
});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware(['IsLogin'])->group(function () {

    Route::get('/home', function () {
        return view('home');
    }); 
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    // Route::post('/cari', [UserController::class, 'search']);
});

Route::get('/', function () {
    return view('dash');
});

Route::prefix('/home')->name('home.')->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('dash'); 
});

Route::prefix('/staff')->name('staff.')->group(function(){
    Route::get('/', [StaffController::class, 'index'])->name('index');
    Route::get('/create', [StaffController::class, 'create'])->name('create');
    Route::post('/store', [StaffController::class, 'store'])->name('store');
    Route::get('/{id}', [StaffController::class, 'edit'])->name('edit'); 
    Route::patch('/{id}', [StaffController::class, 'update'])->name('update'); 
    Route::delete('/delete/{id}', [StaffController::class, 'destroy'])->name('delete'); 
});

Route::prefix('/guru')->name('guru.')->group(function(){
    Route::get('/', [GuruController::class, 'index'])->name('index');
    Route::get('/create', [GuruController::class, 'create'])->name('create');
    Route::post('/store', [GuruController::class, 'store'])->name('store');
    Route::get('/{id}', [GuruController::class, 'edit'])->name('edit'); 
    Route::patch('/{id}', [GuruController::class, 'update'])->name('update'); 
    Route::delete('/delete/{id}', [GuruController::class, 'destroy'])->name('delete'); 
});

Route::prefix('/user')->name('user.')->group(function(){
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/{id}', [UserController::class, 'edit'])->name('edit'); 
    Route::patch('/{id}', [UserController::class, 'update'])->name('update'); 
    Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete'); 
});

Route::prefix('/klasifikasi')->name('klasifikasi.')->group(function(){
    Route::get('/', [LetterTypesController::class, 'index'])->name('index');
    Route::get('/create', [LetterTypesController::class, 'create'])->name('create');
    Route::post('/store', [LetterTypesController::class, 'store'])->name('store');
    Route::get('/{id}', [LetterTypesController::class, 'edit'])->name('edit'); 
    Route::patch('/{id}', [LetterTypesController::class, 'update'])->name('update'); 
    Route::delete('/{id}', [LetterTypesController::class, 'destroy'])->name('delete'); 
   
});

Route::prefix('/datasurat')->name('datasurat.')->group(function(){
    Route::get('/', [LettersController::class, 'index'])->name('index');
    Route::get('/create', [LettersController::class, 'create'])->name('create');
    Route::post('/store', [LettersController::class, 'store'])->name('store');
    Route::get('/{id}', [LettersController::class, 'edit'])->name('edit'); 
    Route::patch('/{id}', [LettersController::class, 'update'])->name('update'); 
    Route::delete('/{id}', [LettersController::class, 'destroy'])->name('delete'); 
});

Route::get('/export-excel', [LetterTypesController::class, 'exportExcel'])->name('export-excel');