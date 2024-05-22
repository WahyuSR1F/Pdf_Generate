<?php

use App\Models\Laporan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoadPdfController;


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

Route::get('/{id?}', function ($id = null) {
    $data = null;
    if ($id) {
        $data =  Laporan::where('id', $id)->first();
    }

    return view('welcome', ['data' => $data]);
})->name('home');



Route::get('/load-pdf/{id}', [LoadPdfController::class, 'generatePdf'])->name('generate-pdf');
Route::get('/donwolad-pdf/{id}', [LoadPdfController::class, 'Donwolad'])->name('donwolad_pdf');
Route::post('/simpan-laporan/{id?}', [LoadPdfController::class, 'simpanLaporan'])->name('simpan-laporan');
