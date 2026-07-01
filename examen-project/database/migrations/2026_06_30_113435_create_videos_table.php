<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('les_id')
                ->constrained('lessen')
                ->onDelete('cascade');

            $table->string('naam', 45);
            $table->string('beschrijving', 45)->nullable();
            $table->string('bestand', 45);
            $table->timestamps();
        });
        Schema::create('les_video', function (Blueprint $table) {
            $table->id();

            $table->foreignId('les_id')
                  ->constrained('lessen')
                  ->onDelete('cascade');

            $table->foreignId('video_id')
                  ->constrained('videos')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
