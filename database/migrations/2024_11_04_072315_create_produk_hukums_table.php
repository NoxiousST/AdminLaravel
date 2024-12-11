<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('produk_hukums', function (Blueprint $table) {
            $table->id();
            $table->integer('id_kategori');
            $table->string('judul');
            $table->date('tgl');
            $table->text('deskripsi');
            $table->string('file1')->nullable();
            $table->integer('deleted')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produk_hukums');
    }
};
