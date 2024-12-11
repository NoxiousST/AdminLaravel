<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_kategori');
            $table->string('judul');
            $table->date('tgl');
            $table->text('deskripsi');
            $table->string('file1')->nullable();
            $table->string('file2')->nullable();
            $table->string('file3')->nullable();
            $table->integer('deleted')->default(0);;
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('beritas');
    }
};
