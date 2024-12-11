<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriFotoController;
use App\Http\Controllers\GaleriVideoController;
use App\Http\Controllers\KategoriArtikelController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\KategoriLayananController;
use App\Http\Controllers\KategoriPpidController;
use App\Http\Controllers\KategoriUnduhanController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\LinkTerkaitController;
use App\Http\Controllers\PotensiController;
use App\Http\Controllers\PpidController;
use App\Http\Controllers\ProdukHukumController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProfilPotensiController;
use App\Http\Controllers\RunningTextController;
use App\Http\Controllers\UnduhanController;
use App\Http\Controllers\UserController;
use App\Http\Resources\BeritaCollection;
use App\Http\Resources\BeritaResource;
use App\Http\Resources\KategoriBeritaCollection;
use App\Models\Berita;
use App\Models\KategoriBerita;

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
    return view('auth.login');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');


Route::middleware('auth')->group(function () {
    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('account', [AccountController::class, 'index'])->name('account');
    Route::put('/account', [AccountController::class, 'update'])->name('account.update');

    Route::resource('agenda', AgendaController::class);
    Route::resource('album', AlbumController::class);

    Route::resource('artikel', ArtikelController::class);
    Route::resource('kategori_artikel', KategoriArtikelController::class);

    Route::resource('banner', BannerController::class);

    Route::resource('kategori_berita', KategoriBeritaController::class);
    Route::resource('berita', BeritaController::class);


    Route::resource('galeri_foto', GaleriFotoController::class);
    Route::resource('galeri_video', GaleriVideoController::class);

    Route::resource('layanan', LayananController::class);
    Route::resource('kategori_layanan', KategoriLayananController::class);

    Route::resource('link_terkait', LinkTerkaitController::class);

    Route::resource('ppid', PpidController::class);
    Route::resource('kategori_ppid', KategoriPpidController::class);

    Route::resource('produk_hukum', ProdukHukumController::class);
    Route::resource('profil', ProfilController::class);
    Route::resource('profil_potensi', ProfilPotensiController::class);
    Route::resource('running_text', RunningTextController::class);
    Route::resource('potensi', PotensiController::class);

    Route::resource('unduhan', UnduhanController::class);
    Route::resource('kategori_unduhan', KategoriUnduhanController::class);
});



