<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChartsController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\UsersController;
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

Route::get('/', HomeController::class);

Route::get('ticket', [TicketsController::class, 'index']);
Route::get('ticket/create', [TicketsController::class, 'create']);
Route::post('ticket/create', [TicketsController::class, 'store']);
Route::get('ticket/search', [TicketsController::class, 'check']);
Route::get('ticket/search', [TicketsController::class, 'search']);

Route::get('ticket/{id}/detail', [TicketsController::class, 'detail']);

Route::get('ticket/export', [TicketsController::class, 'export_ticket']);




// Admin
Route::middleware('auth')->group(function () {

    Route::get('ticket/{id}/edit', [TicketsController::class, 'edit']);
    
    Route::put('ticket/{id}', [TicketsController::class, 'update']);
    Route::delete('ticket/{id}', [TicketsController::class, 'destroy']);

    Route::get('admin/dashboard', [AdminController::class, 'admin_dashboard']);
    
    Route::get('admin', [AdminController::class, 'admin_index']);
    Route::get('admin/search', [AdminController::class, 'admin_search']);
    
    // Routing
    Route::get('admin/diproses', [AdminController::class, 'admin_diproses']);
    Route::get('admin/diterima', [AdminController::class, 'admin_diterima']);
    Route::get('admin/dipinjam', [AdminController::class, 'admin_dipinjam']);
    Route::get('admin/selesai', [AdminController::class, 'admin_selesai']); 
    Route::get('admin/ditutup', [AdminController::class, 'admin_ditutup']); 
    
    Route::get('register', [UsersController::class, 'regis'])->name('register');
    Route::post('register', [UsersController::class, 'regisreq'])->name('register');

    Route::get('admin/export', [ExportController::class, 'export_index']); 
    Route::get('admin/export', [ExportController::class, 'export_cek']); 
    Route::get('admin/export_', [ExportController::class, 'export_filter_ticket']); 
});


// Auth


Route::middleware('guest')->group(function () {
Route::get('login', [UsersController::class, 'login'])->name('login');
Route::post('login', [UsersController::class, 'loginreq'])->name('login');
});


Route::post('logout', [UsersController::class, 'logout'])->name('logout');
