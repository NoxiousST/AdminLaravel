<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('link_terkaits', function (Blueprint $table) {
            $table->id();
            $table->string('link_terkait');
            $table->string('file')->nullable();
            $table->integer('deleted');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('link_terkaits');
    }
};
