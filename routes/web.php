<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\dashboardController;
use App\Models\Student;
use App\Models\Students;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home',[
        "title" => "Home"
    ]);
});

Route::group(["prefix" => "/login"], function() {
    Route::get('/', [LoginController::class, 'index'])->middleware('guest')->name('login');
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::post('/add', [LoginController::class, 'authenticate']);
});

Route::group(["prefix" => "/register"], function() {
    Route::get('/', [RegisterController::class, 'index'])->middleware('guest');
    Route::post('/add', [RegisterController::class, 'store']);
});




Route::group(['prefix' => '/student'], function () {
    Route::get('/all', [StudentsController::class, 'index']);
    Route::get('/detail/{student}', [StudentsController::class, 'show']);
    Route::get('/create', [StudentsController::class, 'create']);
    Route::post('/add', [StudentsController::class, 'store']);
    Route::delete('/delete/{student}', [StudentsController::class, 'destroy']);
    Route::get('/edit/{student}', [StudentsController::class, 'edit']);
    Route::put('/update/{student}', [StudentsController::class, 'update']);
});


Route::group(['prefix' => 'kelas'], function () {
    Route::get('/', [KelasController::class, 'index']);
    Route::get('/create', [KelasController::class, 'create']);
    Route::post('/store', [KelasController::class, 'store']);
    Route::get('/edit/{id}', [KelasController::class, 'edit']);
    Route::patch('/update/{id}', [KelasController::class, 'update']);
    Route::delete('/destroy/{id}', [KelasController::class, 'destroy']);
    Route::get('/detail/{id}', [KelasController::class, 'detail'])->name('kelas.detail');
});

Route::get('/hello', function () {
    return '<h1>Hello WOrld</h1>';
});

Route::group(['prefix' => "dashboard"], function(){
    // <-----------------------------------STUDENT----------------------------------------------->
    Route::get('/dashboard', [dashboardController::class, "index"])->middleware('auth');
    Route::get('/tambah', [dashboardController::class, "create"])->middleware('auth');
    Route::post('/add', [dashboardController::class, "store"])->middleware('auth');
    Route::delete('/delete/{student}',[dashboardController::class,"destroy"])->middleware('auth');
    Route::get('/edit/{student}', [dashboardController::class, "edit"])->middleware('auth');
    Route::post('/update/{student}', [dashboardController::class, "update"])->middleware('auth');
    // <-----------------------------------KELAS----------------------------------------------->
    Route::get('/kelas', [dashboardController::class, "indexKelas"])->middleware('auth');
    Route::get('/tambahKelas', [dashboardController::class, "createKelas"])->middleware('auth');
    Route::post('/addKelas', [dashboardController::class, "storeKelas"])->middleware('auth');
    Route::delete('/deleteKelas/{kelas}',[dashboardController::class,"destroyKelas"])->middleware('auth');
    Route::get('/editKelas/{kelas}', [dashboardController::class, "editKelas"])->middleware('auth');
    Route::post('/updateKelas/{kelas}', [dashboardController::class, "updateKelas"])->middleware('auth');
});