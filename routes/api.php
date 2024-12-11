<?php

use App\Http\Controllers\AuthController;
use App\Http\Resources\AlbumCollection;
use App\Http\Resources\ArtikelCollection;
use App\Http\Resources\BannerCollection;
use App\Http\Resources\BeritaCollection;
use App\Http\Resources\GaleriFotoCollection;
use App\Http\Resources\GaleriVideoCollection;
use App\Http\Resources\KategoriArtikelCollection;
use App\Http\Resources\KategoriBeritaCollection;
use App\Http\Resources\KategoriLayananCollection;
use App\Http\Resources\KategoriPpidCollection;
use App\Http\Resources\KategoriUnduhanCollection;
use App\Http\Resources\LayananCollection;
use App\Http\Resources\LinkTerkaitCollection;
use App\Http\Resources\PotensiCollection;
use App\Http\Resources\PpidCollection;
use App\Http\Resources\ProdukHukumCollection;
use App\Http\Resources\ProfilCollection;
use App\Http\Resources\ProfilPotensiCollection;
use App\Http\Resources\RunningTextCollection;
use App\Http\Resources\UnduhanCollection;
use App\Models\Agenda;
use App\Models\Album;
use App\Models\Artikel;
use App\Models\Banner;
use App\Models\Berita;
use App\Models\GaleriFoto;
use App\Models\GaleriVideo;
use App\Models\KategoriArtikel;
use App\Models\KategoriBerita;
use App\Models\KategoriLayanan;
use App\Models\KategoriPpid;
use App\Models\KategoriUnduhan;
use App\Models\Layanan;
use App\Models\LinkTerkait;
use App\Models\Potensi;
use App\Models\Ppid;
use App\Models\ProdukHukum;
use App\Models\Profil;
use App\Models\ProfilPotensi;
use App\Models\RunningText;
use App\Models\Unduhan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    $routes = [
        'agenda' => [Agenda::class, BeritaCollection::class],
        'album' => [Album::class, AlbumCollection::class],
        'artikel' => [Artikel::class, ArtikelCollection::class],
        'banner' => [Banner::class, BannerCollection::class],
        'berita' => [Berita::class, BeritaCollection::class],
        'galeri_foto' => [GaleriFoto::class, GaleriFotoCollection::class],
        'galeri_video' => [GaleriVideo::class, GaleriVideoCollection::class],
        'kategori_artikel' => [KategoriArtikel::class, KategoriArtikelCollection::class],
        'kategori_berita' => [KategoriBerita::class, KategoriBeritaCollection::class],
        'kategori_layanan' => [KategoriLayanan::class, KategoriLayananCollection::class],
        'kategori_ppid' => [KategoriPpid::class, KategoriPpidCollection::class],
        'kategori_unduhan' => [KategoriUnduhan::class, KategoriUnduhanCollection::class],
        'layanan' => [Layanan::class, LayananCollection::class],
        'link_terkait' => [LinkTerkait::class, LinkTerkaitCollection::class],
        'potensi' => [Potensi::class, PotensiCollection::class],
        'ppid' => [Ppid::class, PpidCollection::class],
        'produk_hukum' => [ProdukHukum::class, ProdukHukumCollection::class],
        'profil' => [Profil::class, ProfilCollection::class],
        'profil_potensi' => [ProfilPotensi::class, ProfilPotensiCollection::class],
        'running_text' => [RunningText::class, RunningTextCollection::class],
        'unduhan' => [Unduhan::class, UnduhanCollection::class],
    ];

    foreach ($routes as $endpoint => [$model, $collection]) {
        Route::get("/$endpoint", function () use ($model, $collection) {
            return new $collection($model::all());
        });
    }
});
