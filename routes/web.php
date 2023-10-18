<?php

use App\Http\Controllers\VeiculosController;
use App\Http\Controllers\Main;
use Illuminate\Support\Facades\Route;



Route::get('/', [Main::class, 'index']);
Route::get('/marcas', [VeiculosController::class, 'getMarcas']);
Route::get('/modelos/{marcaCodigo}', [VeiculosController::class, 'getModelos']);
Route::get('/anos/{marcaCodigo}/{modeloCodigo}', [VeiculosController::class, 'getAnos']);
Route::get('/valor/{marcaCodigo}/{modeloCodigo}/{anoCodigo}', [VeiculosController::class, 'getValor']);
Route::get('/generate-pdf/{marcaCodigo}/{modeloCodigo}/{anoCodigo}', [VeiculosController::class, 'generatePDF'])->name('generate-pdf');
Route::get('/generate-XLSX/{marcaCodigo}/{modeloCodigo}/{anoCodigo}', [VeiculosController::class, 'generateXLSX'])->name('generate-XLSX');

