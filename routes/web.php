<?php

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

Route::resource('/sales', App\Http\Controllers\SaleController::class)->middleware('auth');
Route::resource('/expenses', App\Http\Controllers\ExpenseController::class)->middleware('auth');

Route::get('report-pdf', [App\Http\Controllers\ReportController::class, 'exportPdf'])->name('report')->middleware('auth');
