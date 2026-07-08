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
            Schema::create('lessen', function (Blueprint $table) {
                $table->id();
                $table->string('naam', 45);
                $table->text('beschrijving')->nullable();
                $table->string('onderwerp', 45)->nullable();
                $table->timestamps();
            });

            
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessen');
    }
};
