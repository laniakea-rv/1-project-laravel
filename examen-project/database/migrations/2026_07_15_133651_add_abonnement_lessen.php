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
        Schema::table('lessen', function (Blueprint $table) {
            $table->foreignId('abonnement_type_id')
                ->after('id')
                ->constrained('abonnementtypes');
        });
    }

    public function down(): void
    {
        Schema::table('lessen', function (Blueprint $table) {
            $table->dropForeign(['abonnement_type_id']);
            $table->dropColumn('abonnement_type_id');
        });
    }
};
