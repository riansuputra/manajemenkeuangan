<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AnggaranController;
use App\Http\Controllers\AnggaranControllertes;
use App\Http\Controllers\CatatanController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\InvestasiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LanguageController;

Route::middleware([App\Http\Middleware\GuestMiddleware::class])->group(function()
{
    Route::get('/register',[AuthController::class,'registerPage'])->name('registerPage');
    Route::post('/register/auth',[AuthController::class,'register'])->name('register');
    Route::get('/login',[AuthController::class,'loginPage'])->name('loginPage');
    Route::post('/login/auth',[AuthController::class,'login'])->name('login');
    
    Route::post('/loginAdmin/auth',[AuthController::class,'loginAdmin'])->name('loginAdmin');
    Route::get('/loginAdmin',[AuthController::class,'loginAdminPage'])->name('loginAdminPage');
    
    Route::get('lang/{lang}', [LanguageController::class, 'switch'])->name('lang.switch');
});

Route::middleware([App\Http\Middleware\AdminUserMiddleware::class])->group(function()
{
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::post('/dashboard-filter',[DashboardController::class,'filter'])->name('dashboard-filter');
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
    // Route::get('/catatan',[CatatanController::class,'index'])->name('catatan');
    // Route::get('/catatan', function () {return view('catatan.index');})->name('catatan');
    // Route::get('/investasi', function () {return view('investasi.index');});
    // Route::get('/profil', function () {return view('profil.index');});
    
});

Route::middleware([App\Http\Middleware\AdminMiddleware::class])->group(function()
{
    
    Route::get('/admin', [AdminController::class, 'index'])->name('admin-layout');

    Route::get('/categories-request', [AdminController::class, 'categoryRequests'])->name('categoryRequests');
    Route::post('/category-requests/{id}/approve', [AdminController::class, 'approve'])->name('categoryApprove');
    Route::post('/category-requests/{id}/reject', [AdminController::class, 'reject'])->name('categoryReject');
});

Route::middleware([App\Http\Middleware\UserMiddleware::class])->group(function()
{

    Route::get('/catatan', [CatatanController::class, 'index'])->name('catatanHarian');
    Route::get('/create', [CatatanController::class, 'create'])->name('tambah-catatan');
    Route::post('/catatan', [CatatanController::class, 'store'])->name('catatan');
    Route::post('/catatan-filter',[CatatanController::class,'filter'])->name('catatan-filter');
    Route::get('/catatan/{id}', [CatatanController::class, 'show'])->name('detailCatatan');
    Route::get('/catatan/{catatan}', [CatatanController::class, 'edit'])->name('hapus-catatan');
    Route::post('/update-catatan/{id}', [CatatanController::class, 'update'])->name('updateCatatan');
    Route::post('/delete-catatan/{id}', [CatatanController::class, 'destroy'])->name('hapusCatatan');

    Route::get('/anggaran-mingguan', [AnggaranController::class, 'index'])->name('anggaranWeek')->defaults('view', 'week');
    Route::get('/anggaran-bulanan', [AnggaranController::class, 'index'])->name('anggaranMonth')->defaults('view', 'month');
    Route::get('/anggaran-tahunan', [AnggaranController::class, 'index'])->name('anggaranYear')->defaults('view', 'year');
    Route::post('/anggaran-store', [AnggaranController::class, 'store'])->name('anggaranstore');
    Route::post('/update-anggaran/{id}', [AnggaranController::class, 'update'])->name('updateAnggaran');
    Route::post('/delete-anggaran/{id}', [AnggaranController::class, 'destroy'])->name('hapusAnggaran');


    Route::get('/investasi-lumpsum', [InvestasiController::class, 'lumpsum'])->name('investasi-lumpsum');
    Route::get('/investasi-bulanan', [InvestasiController::class, 'bulanan'])->name('investasi-bulanan');
    Route::get('/investasi-target-lumpsum', [InvestasiController::class, 'targetLumpsum'])->name('investasi-target-lumpsum');
    Route::get('/investasi-target-bulanan', [InvestasiController::class, 'targetBulanan'])->name('investasi-target-bulanan');


    Route::get('/pinjaman', [PinjamanController::class, 'index'])->name('pinjaman');
    Route::get('/pinjaman-bunga-tetap', [PinjamanController::class, 'bungaTetap'])->name('bungaTetap');
    Route::get('/pinjaman-bunga-floating', [PinjamanController::class, 'bungaFloating'])->name('bungaFloating');
    Route::get('/pinjaman-bunga-efektif', [PinjamanController::class, 'bungaEfektif'])->name('bungaEfektif');

    Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('settings');
    Route::get('/category-request', [PengaturanController::class, 'categoryRequestIndex'])->name('categoryRequest');
    Route::post('/category-store', [PengaturanController::class, 'store'])->name('categoryStore');

    Route::get('/portofolio', [PortofolioController::class, 'portofolio'])->name('portofolio');
    Route::post('/portofolio-store', [PortofolioController::class, 'store'])->name('portofolioStore');
    Route::get('/portofolio-dividen', [PortofolioController::class, 'dividen'])->name('portofolioStore');
    Route::get('/portofolio-mutasi-dana', [PortofolioController::class, 'mutasiDana'])->name('portofolio-mutasi-dana');
    Route::get('/portofolio-kinerja', [PortofolioController::class, 'kinerja'])->name('portofolio-kinerja');
    Route::get('/portofolio-historis', [PortofolioController::class, 'historis'])->name('portofolio-historis');

    Route::get('/portofolio-test', [PortofolioController::class, 'create'])->name('portofolio-historis');
    Route::get('/portofolio-testing', [PortofolioController::class, 'make'])->name('portofolio-historis');
    Route::get('/histori', [PortofolioController::class, 'histori'])->name('portofolio-historis');

});

// Route::get('/test', function () {
//     return view('layouts.adminkit');
// });