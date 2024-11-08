<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('profils', function (Blueprint $table) {
            $table->id();
            $table->string('nama_desa')->nullable();
            $table->text('sambutan');
            $table->text('profil');
            $table->text('visi');
            $table->text('misi');
            $table->text('tupoksi');
            $table->text('sejarah')->nullable();
            $table->text('wilayah_desa')->nullable();
            $table->text('alamat')->nullable();
            $table->text('iframe_maps')->nullable();
            $table->string('nomor_telepon')->nullable();
            $table->string('file');
            $table->string('file2');
            $table->string('file3')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profils');
    }
};
