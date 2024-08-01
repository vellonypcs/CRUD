<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\BarangRentController;
use App\Models\Barang;

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

Route::get('/', [PublicController::class, 'index']);

Route::middleware('only_guest')->group(function() {
    Route::get('login',[AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticating']);
    Route::get('register',[AuthController::class, 'register']);
    Route::post('register',[AuthController::class, 'registerProcess']);
});

Route::middleware('auth')->group(function() {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('profile', [UserController::class, 'profile'])->middleware('only_client');
    
    Route::middleware('only_admin')->group(function() {
        Route::get('dashboard', [DashboardController::class, 'index']);
        Route::get('barang', [BarangController::class, 'index'])->middleware('auth');
        Route::get('barang-add', [BarangController::class, 'add']);
        Route::post('barang-add', [BarangController::class, 'store']);
        Route::get('barang-edit/{slug}', [BarangController::class, 'edit']);
        Route::post('barang-edit/{slug}', [BarangController::class, 'update']);
        Route::get('barang-delete/{slug}', [BarangController::class, 'delete']);
        Route::get('barang-destroy/{slug}', [BarangController::class, 'destroy']);
        Route::get('barang-deleted', [BarangController::class, 'deletedBarang']);
        Route::get('barang-restore/{slug}', [BarangController::class, 'restore']);
        
        Route::get('category', [CategoryController::class, 'index']);
        Route::get('category-add', [CategoryController::class, 'add']);
        Route::post('category-add', [CategoryController::class, 'store']);
        Route::get('category-edit/{slug}', [CategoryController::class, 'edit']);
        Route::put('category-edit/{slug}', [CategoryController::class, 'update']);
        Route::get('category-delete/{slug}', [CategoryController::class, 'delete']);
        Route::get('category-destroy/{slug}', [CategoryController::class, 'destroy']);
        Route::get('category-deleted', [CategoryController::class, 'deletedCategory']);
        Route::get('category-restore/{slug}', [CategoryController::class, 'restore']);
    
        Route::get('users', [UserController::class, 'index']);
        Route::get('registered-users', [UserController::class, 'registeredUser']);
        Route::get('user-detail/{slug}', [UserController::class, 'show']);
        Route::get('user-approve/{slug}', [UserController::class, 'approve']);
        Route::get('user-ban/{slug}', [UserController::class, 'delete']);
        Route::get('user-destroy/{slug}', [UserController::class, 'destroy']);
        Route::get('user-banned', [UserController::class, 'bannedUser']);
        Route::get('user-restore/{slug}', [UserController::class, 'restore']);
    
        Route::get('barang-rent', [BarangRentController::class, 'index']);
        Route::post('barang-rent', [BarangRentController::class, 'store']);

        Route::get('rent-logs', [RentLogController::class, 'index']);

        Route::get('barang-return', [BarangRentController::class, 'returnBarang']);
        Route::post('barang-return', [BarangRentController::class, 'saveReturnBarang']);

    });
    
});