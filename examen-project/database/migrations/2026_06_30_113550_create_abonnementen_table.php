<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('abonnementen', function (Blueprint $table) {
            $table->id();
            $table->date('startDatum');
            $table->date('eindDatum')->nullable();
            $table->boolean('actief');
            $table->timestamps();
        });

        Schema::create('abonnementen_abonnementtype', function (Blueprint $table) {
            $table->id();
            $table->foreignId('abonnementtype_id')->constrained('abonnementtypes')->onDelete('cascade');
            $table->foreignId('abonnement_id')->constrained('abonnementen')->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abonnementen');
    }
};
