<?php
return [
    ['label' => 'Agenda', 'route' => 'agenda.index', 'icon' => 'lucide-calendar-days'],

    ['label' => 'Album', 'route' => 'album.index', 'icon' => 'lucide-album'],

    ['label' => 'Artikel', 'sub' => [
        ['label' => 'Kategori Artikel', 'route' => 'kategori_artikel.index'],
        ['label' => 'Artikel', 'route' => 'artikel.index'],
    ], 'icon' => 'lucide-mails'],

    ['label' => 'Banner', 'route' => 'banner.index', 'icon' => 'lucide-ticket-slash'],

    ['label' => 'Berita', 'sub' => [
        ['label' => 'Kategori Berita', 'route' => 'kategori_berita.index'],
        ['label' => 'Berita', 'route' => 'berita.index'],
    ], 'icon' => 'lucide-newspaper'],





    ['label' => 'Galeri', 'sub' => [
        ['label' => 'Galeri Foto', 'route' => 'galeri_foto.index'],
        ['label' => 'Galeri Video', 'route' => 'galeri_video.index'],
    ], 'icon' => 'lucide-gallery-horizontal'],

    ['label' => 'Layanan', 'sub' => [
        ['label' => 'Kategori Layanan', 'route' => 'kategori_layanan.index'],
        ['label' => 'Layanan', 'route' => 'layanan.index'],
    ], 'icon' => 'lucide-settings-2'],

    ['label' => 'Link Terkait', 'route' => 'link_terkait.index', 'icon' => 'lucide-link'],

    ['label' => 'Potensi', 'route' => 'potensi.index', 'icon' => 'lucide-component'],

    ['label' => 'PPID', 'sub' => [
        ['label' => 'Kategori PPID', 'route' => 'kategori_ppid.index'],
        ['label' => 'PPID', 'route' => 'ppid.index'],
    ], 'icon' => 'lucide-laptop-minimal'],

    ['label' => 'Produk Hukum', 'route' => 'produk_hukum.index', 'icon' => 'lucide-scale'],

    ['label' => 'Profil', 'route' => 'profil.index', 'icon' => 'lucide-user-pen'],

    ['label' => 'Profil Potensi', 'route' => 'profil_potensi.index', 'icon' => 'lucide-square-user'],

    ['label' => 'Running Text', 'route' => 'running_text.index', 'icon' => 'lucide-baseline'],

    ['label' => 'Unduhan', 'sub' => [
        ['label' => 'Kategori Unduhan', 'route' => 'kategori_unduhan.index'],
        ['label' => 'Unduhan', 'route' => 'unduhan.index'],
    ], 'icon' => 'lucide-download'],

    ['label' => 'User', 'route' => 'user.index', 'icon' => 'lucide-user'],
];
