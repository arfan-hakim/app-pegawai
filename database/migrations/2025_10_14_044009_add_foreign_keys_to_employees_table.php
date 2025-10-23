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
        Schema::table('employees', function (Blueprint $table) {
            $table->unsignedBigInteger('departement_id')->after('tanggal_masuk');
            $table->unsignedBigInteger('jabatan_id')->after('departement_id');

            $table->foreign('departement_id')
                ->references('id')
                ->on('departements')
                ->onDelete('cascade');

            $table->foreign('jabatan_id')
                ->references('id')
                ->on('positions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropForeign(['departement_id']);
            $table->dropForeign(['jabatan_id']);
            $table->dropColumn(['departement_id', 'jabatan_id']);
        });
    }
};
