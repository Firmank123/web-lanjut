<?php

use Illuminate\Support\Facades\Route; // // Mengimpor kelas Route untuk menangani routing
use App\Http\Controllers\ItemController; // Mengimpor controller ItemController

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

Route::get('/', function () { // Route untuk menampilkan halaman utama
    return view('welcome'); // Mengembalikan view 'welcome'
});

Route::resource('items', ItemController::class); // Route untuk resource controller ItemController
