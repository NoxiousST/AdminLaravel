<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('unduhans', function (Blueprint $table) {
            $table->id();
            $table->string('id_kategori');
            $table->string('deskripsi');
            $table->string('file')->nullable();
            $table->integer('deleted')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('unduhans');
    }
};
