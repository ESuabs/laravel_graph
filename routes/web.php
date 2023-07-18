<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;

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


// Route::get('/chart',[ChartController::class,'viewChart']);

Route::get('/chart', [ChartController::class,'viewChart']);
Route::get('/chartView/create', [ChartController::class,'createStudentData'])->name('chart-view');
Route::post('/chartInsert', [ChartController::class,'storeStudentData'])->name('chart-insert');

Route::get('/studentDelete', [ChartController::class,'deleteStudentData'])->name('student-delete');

Route::get('/statics',[ChartController::class,'showStatics']);

// Route::delete('/delete/{id}','ChartController@deleteStudentData');
