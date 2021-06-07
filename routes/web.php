<?php

use App\Http\Controllers\AdministratorsController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DevisionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TypesController;
use App\Http\Controllers\UnitsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\ShopController;

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

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginpost', [LoginController::class, 'loginpost'])->name('loginpost');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registerpost', [LoginController::class, 'registerpost'])->name('registerpost');



Route::get('/home', [PagesController::class, 'index']);
Route::get('/shop', [ShopController::class, 'index']);
Route::get('/detail/{id}', [ShopController::class, 'show']);
Route::get('/blog', [PagesController::class, 'blog']);
Route::get('/about', [PagesController::class, 'about']);
Route::get('/contact', [PagesController::class, 'contact']);
Route::get('/kontak', [PagesController::class, 'kontak']);

Route::middleware(['auth:web'])->group(function () {
    
    Route::get('/cart', [CartsController::class, 'index']);
    Route::patch('/cart/{id}', [CartsController::class, 'store']);
    Route::delete('/cart/{id}', [CartsController::class, 'destroy']);
    Route::get('/checkout', [CheckoutController::class, 'index']);
    Route::get('/profil', [ProfilesController::class, 'index']);
    Route::get('/user/{id}/edit', [ProfilesController::class, 'edit']);
    Route::patch('/user/{id}', [ProfilesController::class, 'update']);

    Route::get('/tes/{id}', [CartsController::class, 'tes'])->name('tes');

});



Route::middleware(['auth:admin'])->group(function () {
    
    Route::get('/', [PagesController::class, 'home']);
    Route::get('/transaksi', [PagesController::class, 'transaction']);

    Route::get('/barang', [InventoryController::class, 'index']);
    Route::get('/barang/create', [InventoryController::class, 'create']);
    Route::get('/barang/{id}', [InventoryController::class, 'show']);
    Route::post('/barang', [InventoryController::class, 'store']);
    Route::delete('/barang/{id}', [InventoryController::class, 'destroy']);
    Route::get('/barang/{id}/edit', [InventoryController::class, 'edit']);
    Route::patch('/barang/{id}', [InventoryController::class, 'update']);
    
    Route::get('/jenis', [TypesController::class, 'index']);
    Route::get('/jenis/create', [TypesController::class, 'create']);
    Route::post('/jenis', [TypesController::class, 'store']);
    Route::delete('/jenis/{id}', [TypesController::class, 'destroy']);
    Route::get('/jenis/{id}/edit', [TypesController::class, 'edit']);
    Route::patch('/jenis/{id}', [TypesController::class, 'update']);
    
    
    Route::get('/unit', [UnitsController::class, 'index']);
    Route::get('/unit/create', [UnitsController::class, 'create']);
    Route::post('/unit', [UnitsController::class, 'store']);
    Route::delete('/unit/{id}', [UnitsController::class, 'destroy']);
    Route::get('/unit/{id}/edit', [UnitsController::class, 'edit']);
    Route::patch('/unit/{id}', [UnitsController::class, 'update']);
    
    
    Route::get('/users', [UsersController::class, 'index']);
    Route::get('/users/create', [UsersController::class, 'create']);
    Route::get('/users/{id}', [UsersController::class, 'show']);
    Route::post('/users', [UsersController::class, 'store']);
    Route::delete('/users/{id}', [UsersController::class, 'destroy']);
    Route::get('/users/{id}/edit', [UsersController::class, 'edit']);
    Route::patch('/users/{id}', [UsersController::class, 'update']);
    
    Route::get('/admins', [AdminsController::class, 'index']);
    Route::get('/admins/create', [AdminsController::class, 'create']);
    Route::get('/admins/{id}', [AdminsController::class, 'show']);
    Route::post('/admins', [AdminsController::class, 'store']);
    Route::delete('/admins/{id}', [AdminsController::class, 'destroy']);
    Route::get('/admins/{id}/edit', [AdminsController::class, 'edit']);
    Route::patch('/admins/{id}', [AdminsController::class, 'update']);
    
    Route::get('/devisions', [DevisionController::class, 'index']);
    Route::get('/devisions/create', [DevisionController::class, 'create']);
    Route::post('/devisions', [DevisionController::class, 'store']);
    Route::delete('/devisions/{id}', [DevisionController::class, 'destroy']);
    Route::get('/devisions/{id}/edit', [DevisionController::class, 'edit']);
    Route::patch('/devisions/{id}', [DevisionController::class, 'update']);
});
