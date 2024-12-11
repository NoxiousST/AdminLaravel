<?php

namespace App\Livewire\Layouts;

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
use Livewire\Component;

class MobileSidebar extends Component
{
    public $sidebarItems = [
        ['label' => 'Agenda', 'route' => 'agenda', 'icon' => 'lucide-calendar-days'],

        ['label' => 'Album', 'route' => 'album', 'icon' => 'lucide-album'],

        ['label' => 'Artikel', 'sub' => [
            ['label' => 'Kategori Artikel', 'route' => 'kategori_artikel'],
            ['label' => 'Artikel', 'route' => 'artikel'],
        ], 'icon' => 'lucide-mails'],

        ['label' => 'Banner', 'route' => 'banner', 'icon' => 'lucide-ticket-slash'],

        ['label' => 'Berita', 'sub' => [
            ['label' => 'Kategori Berita', 'route' => 'kategori_berita'],
            ['label' => 'Berita', 'route' => 'berita'],
        ], 'icon' => 'lucide-newspaper'],

        ['label' => 'Galeri', 'sub' => [
            ['label' => 'Galeri Foto', 'route' => 'galeri_foto'],
            ['label' => 'Galeri Video', 'route' => 'galeri_video'],
        ], 'icon' => 'lucide-gallery-horizontal'],

        ['label' => 'Layanan', 'sub' => [
            ['label' => 'Kategori Layanan', 'route' => 'kategori_layanan'],
            ['label' => 'Layanan', 'route' => 'layanan'],
        ], 'icon' => 'lucide-settings-2'],

        ['label' => 'Link Terkait', 'route' => 'link_terkait', 'icon' => 'lucide-link'],

        ['label' => 'Potensi', 'route' => 'potensi', 'icon' => 'lucide-component'],

        ['label' => 'PPID', 'sub' => [
            ['label' => 'Kategori PPID', 'route' => 'kategori_ppid'],
            ['label' => 'PPID', 'route' => 'ppid'],
        ], 'icon' => 'lucide-laptop-minimal'],

        ['label' => 'Produk Hukum', 'route' => 'produk_hukum', 'icon' => 'lucide-scale'],

        ['label' => 'Profil', 'route' => 'profil', 'icon' => 'lucide-user-pen'],

        ['label' => 'Profil Potensi', 'route' => 'profil_potensi', 'icon' => 'lucide-square-user'],

        ['label' => 'Running Text', 'route' => 'running_text', 'icon' => 'lucide-baseline'],

        ['label' => 'Unduhan', 'sub' => [
            ['label' => 'Kategori Unduhan', 'route' => 'kategori_unduhan'],
            ['label' => 'Unduhan', 'route' => 'unduhan'],
        ], 'icon' => 'lucide-download']
    ];

    public $dataCounts = [];

    public function mount(): void
    {
        // Fetch record counts for each model
        $this->dataCounts = [
            'agenda' => Agenda::count(),
            'album' => Album::count(),
            'artikel' => Artikel::count(),
            'banner' => Banner::count(),
            'berita' => Berita::count(),
            'galeri_foto' => GaleriFoto::count(),
            'galeri_video' => GaleriVideo::count(),
            'kategori_artikel' => KategoriArtikel::count(),
            'kategori_berita' => KategoriBerita::count(),
            'kategori_layanan' => KategoriLayanan::count(),
            'kategori_ppid' => KategoriPpid::count(),
            'kategori_unduhan' => KategoriUnduhan::count(),
            'layanan' => Layanan::count(),
            'link_terkait' => LinkTerkait::count(),
            'potensi' => Potensi::count(),
            'ppid' => Ppid::count(),
            'produk_hukum' => ProdukHukum::count(),
            'profil' => Profil::count(),
            'profil_potensi' => ProfilPotensi::count(),
            'running_text' => RunningText::count(),
            'unduhan' => Unduhan::count()
        ];
    }

    public function render()
    {
        return view('livewire.layouts.mobile-sidebar');
    }
}
