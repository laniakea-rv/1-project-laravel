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
        Schema::create('abonnementtypes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('naam');
            $table->text('beschrijving');
            $table->float('prijs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abonnementtypes');
    }
};
