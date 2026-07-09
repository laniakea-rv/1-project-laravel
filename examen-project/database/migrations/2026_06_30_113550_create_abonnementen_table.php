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
            $table->date('start_datum');
            $table->date('eind_datum')->nullable();
            $table->boolean('actief');
            $table->foreignId('user_id')->unique()->constrained('users')->onDelete('cascade');
            $table->foreignId('abonnementtype_id')->constrained('abonnementtypes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abonnementen');
        Schema::dropIfExists('abonnementen_abonnementtype');
    }
};