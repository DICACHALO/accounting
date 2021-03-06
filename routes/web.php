<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ReportController;
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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'], [ReportController::class, 'todayreport'])->name('home')->middleware('auth');

Route::resource('/sales', SaleController::class)->middleware('auth');
Route::resource('/expenses', ExpenseController::class)->middleware('auth');

Route::post('report_total', [ReportController::class, 'exportpdf'])->name('report_total')->middleware('auth');

Route::post('report_day', [ReportController::class, 'exportpdfday'])->name('report_day')->middleware('auth');
