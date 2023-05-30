<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\MhsController;
use App\Http\Controllers\Backend\LaguController;
use App\Http\Controllers\Backend\XssController;
use App\Http\Controllers\Backend\xss1controller;
use App\Http\Controllers\ProdukController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

Route::get('/admin/logout',[AdminController::class, 'logout'])->name('admin.logout');

// semua route untuk user
Route::prefix('users')->group(function(){
    Route::get('/view',[UserController::class, 'UserView'])->name('user.view');
    Route::get('/add',[UserController::class, 'UserAdd'])->name('user.add');
    Route::post('/store',[UserController::class, 'UserStore'])->name('users.store');
    Route::get('/edit/{id}',[UserController::class, 'UserEdit'])->name('users.edit');
    Route::post('/update/{id}',[UserController::class, 'UserUpdate'])->name('users.update');
    Route::get('/delete/{id}',[UserController::class, 'UserDelete'])->name('users.delete');
});

Route::prefix('mhs')->group(function(){
    Route::get('/view',[MhsController::class, 'MhsView'])->name('mhs.view');
    Route::get('/add',[MhsController::class, 'MhsAdd'])->name('mhs.add');
    Route::post('/store',[MhsController::class, 'MhsStore'])->name('mhss.store');
    Route::get('/edit/{id}',[MhsController::class, 'MhsEdit'])->name('mhs.edit');
    Route::post('/update/{id}',[MhsController::class, 'MhsUpdate'])->name('mhs.update');
    Route::get('/delete/{id}',[MhsController::class, 'MhsDelete'])->name('mhs.delete');
});

Route::prefix('lagu')->group(function(){
    Route::get('/view',[LaguController::class, 'LaguView'])->name('lagu.view');
    Route::get('/add',[LaguController::class, 'LaguAdd'])->name('lagu.add');
    Route::post('/store',[LaguController::class, 'LaguStore'])->name('lagus.store');
    Route::get('/edit/{id}',[LaguController::class, 'LaguEdit'])->name('lagu.edit');
    Route::post('/update/{id}',[LaguController::class, 'LaguUpdate'])->name('lagu.update');
    Route::get('/delete/{id}',[LaguController::class, 'LaguDelete'])->name('lagu.delete');
});

Route::prefix('produks')->group(function(){
    Route::get('/view',[ProdukController::class, 'ProdukView'])->name('produk.view');
    Route::get('/add',[ProdukController::class, 'ProdukAdd'])->name('produk.add');
    Route::post('/store',[ProdukController::class, 'ProdukStore'])->name('produks.store');
    Route::get('/edit/{id}',[ProdukController::class, 'ProdukEdit'])->name('produks.edit');
    Route::post('/update/{id}',[ProdukController::class, 'ProdukUpdate'])->name('produks.update');
    Route::get('/delete/{id}',[ProdukController::class, 'ProdukDelete'])->name('produks.delete');
});

Route::prefix('xss')->group(function(){
    Route::get('/view',[XssController::class, 'XssView'])->name('xss.view');
    Route::get('/add',[XssController::class, 'XssAdd'])->name('xss.add');
    Route::post('/store',[XssController::class, 'XssStore'])->name('xss.store');
    Route::get('/edit/{id}',[XssController::class, 'XssEdit'])->name('xss.edit');
    Route::post('/update/{id}',[XssController::class, 'XssUpdate'])->name('xss.update');
    Route::get('/delete/{id}',[XssController::class, 'XssDelete'])->name('xss.delete');
});

Route::prefix('xss1')->group(function(){
    Route::get('/view',[xss1controller::class, 'XssView'])->name('xss1.view');
    Route::get('/add',[xss1controller::class, 'XssAdd'])->name('xss1.add');
    Route::post('/store',[xss1controller::class, 'XssStore'])->name('xss1.store');
    Route::get('/edit/{id}',[xss1controller::class, 'XssEdit'])->name('xss1.edit');
    Route::post('/update/{id}',[xss1controller::class, 'XssUpdate'])->name('xss1.update');
    Route::get('/delete/{id}',[xss1controller::class, 'XssDelete'])->name('xss1.delete');
});