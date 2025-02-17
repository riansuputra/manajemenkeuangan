<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnggaranController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatatanController;
use App\Http\Controllers\CatatanUmumController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DividenController;
use App\Http\Controllers\InvestasiController;
use App\Http\Controllers\KursController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\SaldoController;


Route::middleware(['throttle:100,1'])->group(function() {
    
    Route::get('/bahasa/{locale}', [LanguageController::class, 'switch'])->name('lang.switch');
    
    Route::middleware([App\Http\Middleware\GuestMiddleware::class])->group(function()
    {
        Route::get('/register', [AuthController::class, 'registerPage'])->name('register.page');
        Route::post('/register/auth', [AuthController::class, 'register'])->name('register');
        Route::get('/login', [AuthController::class, 'loginPage'])->name('login.page');
        Route::post('/login/auth', [AuthController::class, 'login'])->name('login');
        Route::post('/login/admin/auth', [AuthController::class, 'loginAdmin'])->name('login.admin');
        Route::get('/login/admin', [AuthController::class, 'loginAdminPage'])->name('login.admin.page');
    });

    Route::middleware([App\Http\Middleware\AdminUserMiddleware::class])->group(function()
    {
        Route::get('/logout',[AuthController::class,'logout'])->name('logout');
    });

    Route::middleware([App\Http\Middleware\AdminMiddleware::class])->group(function()
    {
        
        Route::get('/admin', [AdminController::class, 'index'])->name('admin-layout');
        Route::get('/dashboard-admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        Route::get('/permintaan-kategori-admin', [AdminController::class, 'permintaanKategoriAdmin'])->name('permintaanKategoriAdmin');
        Route::post('/kategori-store', [AdminController::class, 'storeKategori'])->name('kategoriStore');
        Route::post('/permintaan-kategori/approve', [AdminController::class, 'approve'])->name('permintaanApprove');
        Route::post('/permintaan-kategori/reject', [AdminController::class, 'reject'])->name('permintaanReject');

        Route::get('/kurs-admin', [AdminController::class, 'kurs'])->name('kurs-admin');
        Route::get('/kurs-store', [AdminController::class, 'kursStore'])->name('kursStore-admin');

        Route::get('/berita-admin', [AdminController::class, 'berita'])->name('berita-admin');
        Route::get('/berita-store', [AdminController::class, 'beritaStore'])->name('beritaStore-admin');

        Route::post('/dividen-store', [DividenController::class, 'store'])->name('dividenStore');
        Route::get('/dividen-admin', [AdminController::class, 'dividen'])->name('dividen-admin');
        Route::get('/user', [AdminController::class, 'user'])->name('user-admin');
        Route::post('/update-password', [AuthController::class, 'updatePassword'])->name('updatePassword');

    });

    Route::middleware([App\Http\Middleware\UserMiddleware::class])->group(function()
    {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/dashboard/filter', [DashboardController::class, 'filter'])->name('dashboard.filter');

        Route::get('/catatan/keuangan', [CatatanController::class, 'index'])->name('catatan.keuangan');
        Route::post('/catatan/keuangan', [CatatanController::class, 'store'])->name('catatan.keuangan.store');
        Route::post('/catatan/filter', [CatatanController::class, 'filter'])->name('catatan.filter');
        Route::get('/catatan/keuangan/{id}', [CatatanController::class, 'show'])->name('catatan.detail');
        Route::post('/update/catatan/keuangan/{id}', [CatatanController::class, 'update'])->name('catatan.update');
        Route::post('/delete/catatan/keuangan/{id}', [CatatanController::class, 'destroy'])->name('catatan.hapus');

        Route::get('/permintaan-kategori', [PengaturanController::class, 'indexPermintaanKategori'])->name('permintaan.kategori');
        Route::post('/permintaan-kategori/store', [PengaturanController::class, 'storePermintaanKategori'])->name('permintaan.kategori.store');

        Route::get('/catatan/umum', [CatatanUmumController::class, 'index'])->name('catatan.umum');
        Route::post('/catatan/umum', [CatatanUmumController::class, 'store'])->name('catatan.umum.store');
        Route::get('/catatan/umum/{id}', [CatatanUmumController::class, 'show'])->name('catatan.umum.detail');
        Route::get('/catatan/umum/{catatan}', [CatatanUmumController::class, 'edit'])->name('catatan.umum.hapus');
        Route::post('/update/catatan/umum/{id}', [CatatanUmumController::class, 'update'])->name('catatan.umum');
        Route::post('/delete/catatan/umum/{id}', [CatatanUmumController::class, 'destroy'])->name('catatan.umum');

        Route::get('/anggaran/mingguan', [AnggaranController::class, 'index'])->name('anggaran.week')->defaults('view', 'week');
        Route::get('/anggaran/bulanan', [AnggaranController::class, 'index'])->name('anggaran.month')->defaults('view', 'month');
        Route::get('/anggaran/tahunan', [AnggaranController::class, 'index'])->name('anggaran.year')->defaults('view', 'year');
        Route::post('/anggaran/store', [AnggaranController::class, 'store'])->name('anggaran.store');
        Route::post('/update/anggaran/{id}', [AnggaranController::class, 'update'])->name('anggaran.update');
        Route::post('/delete/anggaran/{id}', [AnggaranController::class, 'destroy'])->name('anggaran.hapus');

        Route::get('/kurs', [KursController::class, 'index'])->name('kurs');
        Route::get('/dividen', [DividenController::class, 'index'])->name('dividen');
        Route::get('/berita', [PortofolioController::class, 'berita'])->name('berita');

        Route::get('/investasi/lumpsum', [InvestasiController::class, 'lumpsum'])->name('investasi.lumpsum');
        Route::get('/investasi/bulanan', [InvestasiController::class, 'bulanan'])->name('investasi.bulanan');
        Route::get('/investasi/target/lumpsum', [InvestasiController::class, 'targetLumpsum'])->name('investasi.target.lumpsum');
        Route::get('/investasi/target/bulanan', [InvestasiController::class, 'targetBulanan'])->name('investasi.target.bulanan');

        Route::get('/pinjaman/bunga/tetap', [PinjamanController::class, 'bungaTetap'])->name('pinjaman.bunga.tetap');
        Route::get('/pinjaman/bunga/efektif', [PinjamanController::class, 'bungaEfektif'])->name('pinjaman.bunga.efektif');

        Route::get('/portofolio/mutasi-dana', [PortofolioController::class, 'mutasiDana'])->name('portofolio.mutasi.dana');
        Route::post('/saldo/store', [SaldoController::class, 'store'])->name('saldo.store');
        Route::post('/mutasi/filter',[PortofolioController::class,'filterMutasi'])->name('mutasi.filter');

        Route::get('/portofolio', [PortofolioController::class, 'portofolio'])->name('portofolio');
        Route::post('/portofolio-filter',[PortofolioController::class,'filterPortofolio'])->name('portofolio.filter');
        Route::post('/portofolio/store', [PortofolioController::class, 'store'])->name('portofolio.store');
        Route::get('/portofolio/update-harga/terkini', [PortofolioController::class, 'updateHargaReal'])->name('portofolio.update.harga.terkini');
        Route::post('/portofolio/update-harga', [PortofolioController::class, 'updateHarga'])->name('portofolio.update.harga');
        Route::post('/portofolio/jual', [PortofolioController::class, 'storeJual'])->name('portofolio.store.jual');
        
        Route::get('/portofolio/historis', [PortofolioController::class, 'historis'])->name('portofolio.historis');
        Route::post('/historis/store', [PortofolioController::class, 'historisStore'])->name('historis.store');
        Route::post('/historis/filter',[PortofolioController::class,'filterHistoris'])->name('historis.filter');

        Route::get('/informasi-akun', [PengaturanController::class, 'indexInformasiAkun'])->name('informasi.akun');
        Route::delete('/hapus/portofolio', [PengaturanController::class, 'destroyPortofolio'])->name('informasi.hapus.portofolio');
        Route::delete('/hapus/keuangan', [PengaturanController::class, 'destroyKeuangan'])->name('informasi.hapus.keuangan');
        Route::delete('/hapus/catatan', [PengaturanController::class, 'destroyCatatan'])->name('informasi.hapus.catatan');
        Route::post('/update', [PengaturanController::class, 'updateUser'])->name('user.update');
        Route::get('/tentang', [PengaturanController::class, 'indexTentang'])->name('tentang');
    });
});