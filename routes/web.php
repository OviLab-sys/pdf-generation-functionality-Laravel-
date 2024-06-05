<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [\App\Http\Controllers\HomeController::class,'index'])->name('home');
Route::get('/sales', [\App\Http\Controllers\CustomerProductDollarSaleController::class,'index'])->name('sales');
Route::get('/salesbycountry', [\App\Http\Controllers\CustomerProductDollarSaleController::class,'indexCountry'])->name('salesbycountry');
Route::get('/financialpdf', [PdfController::class, 'generatePdf']);