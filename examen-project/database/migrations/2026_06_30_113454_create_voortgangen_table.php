<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('voortgangen', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('voortgang_video', function (Blueprint $table) {
            $table->id();

            $table->foreignId('voortgang_id')
                ->constrained('voortgangen')
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
        Schema::dropIfExists('voortgangen');
    }
};
