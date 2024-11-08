<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ppids', function (Blueprint $table) {
            $table->id();
            $table->integer('id_kategori');
            $table->string('nama_dokumen');
            $table->string('file1')->nullable();
            $table->integer('deleted');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ppids');
    }
};
