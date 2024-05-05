<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AnggaranController;
use App\Http\Controllers\CatatanController;
use App\Http\Controllers\StatistikController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\InvestasiController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;

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

Route::middleware([])->group(function(){

    Route::middleware([App\Http\Middleware\GuestMiddleware::class])->group(function(){
        Route::get('/login',[AuthController::class,'loginPage'])->name('loginPage');
        Route::get('/register',[AuthController::class,'registerPage'])->name('registerPage');
        Route::post('/login/auth',[AuthController::class,'login'])->name('login');
        Route::post('/register/auth',[AuthController::class,'register'])->name('register');
    });

    Route::middleware([App\Http\Middleware\AdminUserMiddleware::class])->group(function(){
        Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
        Route::post('/dashboard-filter',[DashboardController::class,'filter'])->name('dashboard-filter');
        Route::post('/logout',[AuthController::class,'logout'])->name('logout');
        // Route::get('/catatan',[CatatanController::class,'index'])->name('catatan');
        // Route::get('/catatan', function () {return view('catatan.index');})->name('catatan');
        // Route::get('/investasi', function () {return view('investasi.index');});
        // Route::get('/profil', function () {return view('profil.index');});
        // Route::get('/statistik', function () {return view('statistik.index');});
        
    });
    
    Route::middleware([App\Http\Middleware\AdminMiddleware::class])->group(function(){
        
    });
    
    Route::middleware([App\Http\Middleware\UserMiddleware::class])->group(function(){
        Route::get('/catatan-harian', [CatatanController::class, 'index'])->name('catatanHarian');
        Route::get('/catatan-mingguan', [CatatanController::class, 'indexMingguan'])->name('catatanMingguan');
        Route::get('/catatan-bulanan', [CatatanController::class, 'indexBulanan'])->name('catatanBulanan');
        Route::get('/create', [CatatanController::class, 'create'])->name('tambah-matakuliah-post');
        Route::post('/catatan', [CatatanController::class, 'store'])->name('catatan');
        Route::get('/catatan/{id}', [CatatanController::class, 'show'])->name('detailCatatan');
        Route::get('/catatan/{catatan}', [CatatanController::class, 'edit'])->name('hapus-matakuliah-post');
        Route::post('/update-catatan/{id}', [CatatanController::class, 'update'])->name('updateCatatan');
        Route::post('/delete-catatan/{id}', [CatatanController::class, 'destroy'])->name('hapusCatatan');

        Route::get('/statistik', [StatistikController::class, 'index'])->name('statistik');
        Route::get('/anggaran', [AnggaranController::class, 'index'])->name('anggaran');
        Route::get('/investasi-lumpsum', [InvestasiController::class, 'lumpsum'])->name('investasi-lumpsum');
        Route::get('/investasi-bulanan', [InvestasiController::class, 'bulanan'])->name('investasi-bulanan');
        Route::get('/investasi-target', [InvestasiController::class, 'target'])->name('investasi-target');
        Route::get('/pinjaman', [PinjamanController::class, 'index'])->name('pinjaman');
    });

});

// Route::get('/', function () {
//     return view('layouts.tabler');
// });

// Route::get('/anggaran', function () {return view('anggaran.index');});
// Route::get('/catatan', function () {return view('catatan.index');});
// // Route::get('/dashboard', function () {return view('dashboard.index')->name('dashboard');});
// Route::get('/dashboard', function () {
//     return view('dashboard.index');
// })->name('dashboard');
// Route::get('/investasi', function () {return view('investasi.index');});
// Route::get('/profil', function () {return view('profil.index');});
// Route::get('/statistik', function () {return view('statistik.index');});

// // Route::get('/login', function () {return view('autentikasi.login');});
// // Route::get('/register', function () {return view('autentikasi.register');});


// Route::get('/token', function () {return Str::random(60);});

// Route::get('/loginpage',[AuthController::class,'loginPage'])->name('loginPage');
// Route::get('/register',[AuthController::class,'registerPage'])->name('registerPage');
// Route::post('/login',[AuthController::class,'login'])->name('login');


// Route::get('/dashboard',[AuthController::class,'dashboardPage'])->name('dashboard');
