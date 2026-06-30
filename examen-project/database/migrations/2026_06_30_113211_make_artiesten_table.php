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
        Schema::create('artiesten', function (Blueprint $table) {
            $table->id();
            $table->string('naam');
            $table->text('beschrijving')->nullable();
            $table->string('afbeelding')->nullable();
            $table->timestamps();
        });

        Schema::create('artiest_muziek', function (Blueprint $table) {
            $table->id();
            $table->foreignId('artiest_id')->constrained('artiesten')->onDelete('cascade');
            $table->foreignId('muziek_id')->constrained('muziek')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artiesten');
        Schema::dropIfExists('artiest_muziek');
    }
};
