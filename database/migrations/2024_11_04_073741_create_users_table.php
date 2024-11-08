<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('pwd');
            $table->integer('is_admin');
            $table->integer('id_kabupaten');
            $table->string('fullname')->nullable();
            $table->string('NIP')->nullable();
            $table->string('email')->nullable();
            $table->string('telp')->nullable();
            $table->integer('batas');
            $table->integer('isok');
            $table->integer('deleted');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};