<?php

// Mengimpor class Route dari Illuminate\Support\Facades dan ItemController dari App\Http\Controllers
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

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

// Mendefinisikan rute GET untuk URL root (/) yang mengembalikan view 'welcome'
Route::get('/', function () {
    return view('welcome');
});

// Mendefinisikan resource controller untuk 'items' yang menghubungkan semua metode di ItemController
Route::resource('items', ItemController::class);
