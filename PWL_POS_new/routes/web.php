<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\PenjualanController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you caN register web rOutes for your application. These
| routes are loaded by the RouteServiceProvider nokurento and all of them will
| be assigned to the "web" middleware group. Make something great!
|
|
*/

Route::get('/', [WelcomeController::class, 'index']);

Route::get('/level', [LevelController::class, 'index']);
Route::get('/kategori', [KategoriController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::get('/', [WelcomeController::class, 'index']);
Route::middleware(['authorize:ADM'])->group(function () {
Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/list', [UserController::class, 'list']);
    Route::get('/create', [UserController::class, 'create']);
    Route::post('/', [UserController::class,'store']); // Add this line to handle POST to /user
    Route::post('/store', [UserController::class,'store']); // Keep this for backward compatibility
    Route::get('/show/{id}', [UserController::class,'show']);
    Route::get('/edit/{id}', [UserController::class,'edit']);
    Route::put('/update/{id}', [UserController::class,'update']);
    Route::delete('/delete/{id}', [UserController::class,'delete']);
    Route::get('/create_ajax', [UserController::class, 'create_ajax']);
    Route::post('/ajax', [UserController::class, 'store_ajax']); //
    Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']);
    Route::get('/{id}/show_ajax', [UserController::class, 'show_ajax']);


});
});
});
Route::middleware(['authorize:ADM,MNG'])->group(function () {
Route::prefix('barang')->group(function () {
    Route::get('/', [BarangController::class, 'index']);
    Route::get('/list', [BarangController::class, 'list']);
    Route::get('/create', [BarangController::class, 'create']);
    Route::post('/', [BarangController::class, 'store']);
    Route::post('/store', [BarangController::class,'store']); //
    Route::get('/show/{id}', [BarangController::class, 'show']);
    Route::get('/edit/{id}', [BarangController::class, 'edit']);
    Route::put('/update/{id}', [BarangController::class, 'update']);
    Route::delete('/delete/{id}', [BarangController::class, 'delete']);
    Route::get('/show_ajax/{id}', [BarangController::class, 'showAjax']);
    Route::get('/create_ajax', [BarangController::class, 'create_ajax']);
    Route::post('/ajax', [BarangController::class, 'store_ajax']);
    Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']);
    Route::get('/{id}/show_ajax', [LevelController::class, 'show_ajax']);
    Route::get('/import', [BarangController::class, 'import']); // ajax form upload excel
    Route::post('/import_ajax', [BarangController::class, 'import_ajax']); // ajax import excel
    Route::get('/export_excel', [BarangController::class, 'export_excel']); // export excel
    Route::get('/export_pdf', [BarangController::class, 'export_pdf']); // export pdf
});
});
Route::middleware(['auth'])->group(function () {
    Route::get('/', [WelcomeController::class, 'index']);
Route::middleware(['authorize:ADM'])->group(function () {
Route::prefix('level')->group(function () {

    Route::get('/', [LevelController::class, 'index']);
    Route::get('/list', [LevelController::class, 'list']);
    Route::get('/create', [LevelController::class, 'create']);
    Route::post('/', [LevelController::class, 'store']);
    Route::post('/store', [LevelController::class,'store']); //
    Route::get('/show/{id}', [LevelController::class,'show']);
    Route::get('/edit/{id}', [LevelController::class,'edit']);
    Route::put('/update/{id}', [LevelController::class,'update']);
    Route::delete('/delete/{id}', [LevelController::class,'delete']);
    Route::get('/create_ajax', [LevelController::class, 'create_ajax']);
    Route::post('/ajax', [LevelController::class, 'store_ajax']);
    Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']);
    Route::get('/{id}/show_ajax', [LevelController::class, 'show_ajax']);
});
});
});
Route::prefix('kategori')->group(function () {
    Route::get('/', [KategoriController::class, 'index']);
    Route::get('/list', [KategoriController::class, 'list']);
    Route::get('/create', [KategoriController::class, 'create']);
    Route::post('/', [KategoriController::class, 'store']);
    Route::post('/store', [KategoriController::class,'store']);
    Route::get('/show/{id}', [KategoriController::class,'show']);
    Route::get('/edit/{id}', [KategoriController::class,'edit']);
    Route::put('/update/{id}', [KategoriController::class,'update']);
    Route::delete('/delete/{id}', [KategoriController::class,'delete']);
    Route::get('/create_ajax', [KategoriController::class, 'create_ajax']);
    Route::post('/ajax', [KategoriController::class, 'store_ajax']);
    Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']);
    Route::get('/{id}/show_ajax', [KategoriController::class, 'show_ajax']);
});

Route::prefix('supplier')->group(function () {
    Route::get('/', [SupplierController::class, 'index']);
    Route::get('/list', [SupplierController::class, 'list']);
    Route::get('/create', [SupplierController::class, 'create']);
    Route::post('/', [SupplierController::class, 'store']);
    Route::post('/store', [SupplierController::class,'store']);
    Route::get('/show/{id}', [SupplierController::class,'show']);
    Route::get('/edit/{id}', [SupplierController::class,'edit']);
    Route::put('/update/{id}', [SupplierController::class,'update']);
    Route::delete('/delete/{id}', [SupplierController::class,'delete']);
    Route::get('/create_ajax', [SupplierController::class, 'create_ajax']);
    Route::post('/ajax', [SupplierController::class, 'store_ajax']);
    Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']);
    Route::get('/{id}/show_ajax', [SupplierController::class, 'show_ajax']);
});

Route::prefix('stok')->middleware(['authorize:ADM,MNG'])->group(function () {
    Route::get('/', [StockController::class, 'index']);
    Route::get('/list', [StockController::class, 'list']);
    Route::post('/', [StockController::class, 'store']);
    Route::get('/{id}', [StockController::class, 'show']);
    Route::get('/{id}/edit', [StockController::class, 'edit']);
    Route::put('/{id}', [StockController::class, 'update']);
    Route::delete('/{id}', [StockController::class, 'destroy']);
    Route::get('/export_excel', [StockController::class, 'export_excel']);
    Route::get('/export_pdf', [StockController::class, 'export_pdf']);
    Route::get('/show_allBarang', [StockController::class, 'showAllBarang']);
});

Route::prefix('penjualan')->middleware(['authorize:ADM,MNG,KAS'])->group(function () {
    Route::get('/', [PenjualanController::class, 'index']);
    Route::get('/list', [PenjualanController::class, 'list']);
    Route::get('/create', [PenjualanController::class, 'create']);
    Route::post('/', [PenjualanController::class, 'store']);
    Route::get('/{id}', [PenjualanController::class, 'show'])->where('id', '[0-9]+');
    Route::get('/{id}/pdf', [PenjualanController::class, 'generatePdf'])->where('id', '[0-9]+');
    Route::get('/export_excel', [PenjualanController::class, 'export_excel']);
    Route::get('/export_pdf', [PenjualanController::class, 'export_pdf']);
    Route::get('/barang/{id}', [PenjualanController::class, 'getBarangInfo'])->where('id', '[0-9]+');
});

Route::pattern('id', '[0-9]+'); // artinya ketika ada parameter {id}, maka harus berupa angka

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postLogin']);
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'postregister']);
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');

Route::middleware(['auth'])->group(function () { // artinya semua route di dalam group ini harus login dulu
    // masukkan semua route yang perlu autentikasi di sini
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
