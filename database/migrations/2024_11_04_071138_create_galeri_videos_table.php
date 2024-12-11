<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('galeri_videos', function (Blueprint $table) {
            $table->id();
            $table->string('link_video');
            $table->integer('deleted')->default(0);;
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galeri_videos');
    }
};
