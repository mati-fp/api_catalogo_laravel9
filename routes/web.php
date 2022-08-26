<?php

use App\Http\Controllers\PdfCsvController;
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

//Route::get('/viewpdf', 'PdfViewController@index');
Route::get('/pdfcsv', [PdfCsvController::class, 'index']);
Route::get('/gerarpdf', [PdfCsvController::class, 'gerarPdf'])->name('produto.pdf');
Route::get('export-produtos', [PdfCsvController::class, 'gerarCsv'])->name('produto.export');
