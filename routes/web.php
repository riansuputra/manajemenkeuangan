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
    
    Route::get('/bahasa/id', [LanguageController::class, 'switchId'])->name('bahasa.id');
    Route::get('/bahasa/en', [LanguageController::class, 'switchEn'])->name('bahasa.en');
    
    Route::middleware([App\Http\Middleware\GuestMiddleware::class])->group(function()
    {
        Route::get('/register', [AuthController::class, 'registerPage'])->name('register.page');
        Route::post('/register/auth', [AuthController::class, 'register'])->name('register');
        Route::get('/login', [AuthController::class, 'loginPage'])->name('login.page');
        Route::post('/login/auth', [AuthController::class, 'login'])->name('login');
        Route::get('/lupa-password', [AuthController::class, 'passwordPage'])->name('password.page');
        Route::post('/lupa-password/store', [AuthController::class, 'lupaPassword'])->name('password');
        Route::post('/login/admin/auth', [AuthController::class, 'loginAdmin'])->name('login.admin');
        Route::get('/login/admin', [AuthController::class, 'loginAdminPage'])->name('login.admin.page');
        Route::get('/1', function () {
            return view('autentikasi.ganti_password');
        });
        Route::get('/2', function () {
            return view('autentikasi.verif_akun');
        });
        Route::get('/3', function () {
            return view('autentikasi.verif_password');
        });
    });

    Route::middleware([App\Http\Middleware\AdminUserMiddleware::class])->group(function()
    {
        Route::get('/logout',[AuthController::class,'logout'])->name('logout');
    });

    Route::middleware([App\Http\Middleware\AdminMiddleware::class])->group(function()
    {
        Route::get('/dashboard-admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        Route::get('/permintaan-kategori/admin', [AdminController::class, 'permintaanKategoriAdmin'])->name('admin.permintaan.kategori');
        Route::post('/kategori/store', [AdminController::class, 'storeKategori'])->name('admin.kategori.store');
        Route::post('/permintaan-kategori/approve', [AdminController::class, 'approve'])->name('admin.permintaan.approve');
        Route::post('/permintaan-kategori/reject', [AdminController::class, 'reject'])->name('admin.permintaan.reject');

        Route::get('/kurs/admin', [AdminController::class, 'kurs'])->name('admin.kurs');
        Route::get('/kurs/store', [AdminController::class, 'kursStore'])->name('admin.kurs.store');

        Route::get('/berita/admin', [AdminController::class, 'berita'])->name('admin.berita');
        Route::get('/berita/store', [AdminController::class, 'beritaStore'])->name('admin.berita.store');

        Route::get('/dividen/admin', [AdminController::class, 'dividen'])->name('admin.dividen');
        Route::post('/dividen/store', [DividenController::class, 'store'])->name('admin.dividen.store');
        Route::get('/user', [AdminController::class, 'user'])->name('admin.user');
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
        Route::post('/permintaan-kategori/update/{id}', [PengaturanController::class, 'updatePermintaanKategori'])->name('permintaan.kategori.update');

        Route::get('/catatan/umum', [CatatanUmumController::class, 'index'])->name('catatan.umum');
        Route::post('/catatan/umum', [CatatanUmumController::class, 'store'])->name('catatan.umum.store');
        Route::get('/catatan/umum/{id}', [CatatanUmumController::class, 'show'])->name('catatan.umum.detail');
        Route::get('/catatan/umum/{catatan}', [CatatanUmumController::class, 'edit'])->name('catatan.umum.hapus');
        Route::post('/update/catatan/umum/{id}', [CatatanUmumController::class, 'update'])->name('catatan.umum.update');
        Route::post('/delete/catatan/umum/{id}', [CatatanUmumController::class, 'destroy'])->name('catatan.umum.hapus');

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
        Route::delete('/hapus/portofolio', [PengaturanController::class, 'destroyPortofolio'])->name('informasi.portofolio.hapus');
        Route::delete('/hapus/keuangan', [PengaturanController::class, 'destroyKeuangan'])->name('informasi.keuangan.hapus');
        Route::delete('/hapus/catatan', [PengaturanController::class, 'destroyCatatan'])->name('informasi.catatan.hapus');
        Route::post('/update', [PengaturanController::class, 'updateUser'])->name('user.update');
        Route::get('/tentang', [PengaturanController::class, 'indexTentang'])->name('tentang');
    });

    
});