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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::resource('/sales', SaleController::class)->middleware('auth');
Route::resource('/expenses', ExpenseController::class)->middleware('auth');

Route::get('report-pdf', [ReportController::class, 'exportPdf'])->name('report')->middleware('auth');

Route::post('report_total', [ReportController::class, 'store'])->name('report_total')->middleware('auth');
