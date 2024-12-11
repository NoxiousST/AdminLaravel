<?php

namespace App\Livewire\Layouts;

use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Navbar extends Component
{
    public $navbarItems = [
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

    public $account = [
        ['label' => 'Profile', 'route' => 'account'],
        ['label' => 'New Account', 'route' => 'register'],
    ];

    public function render()
    {
        Log::debug(print_r(auth()->user()->currentAccessToken(), true));
        return view('livewire.layouts.navbar');
    }
}
