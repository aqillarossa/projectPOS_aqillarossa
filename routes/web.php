<?php
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('dashboard',[
        "title"=>"Dashboard"
    ]);
});

Route::resource('kategori',categoryController::class)->except('show','destroy','create');
route::resource('pelanggan',CustomerController::class)->except('destroy');
route::resource('produk',ProductController::class);

Route::resource('pengguna',UserController::class)->except('destroy','create','show','update','edit');