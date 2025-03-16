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
        Schema::create('m_kota', function (Blueprint $table) {
            $table->bigIncrements('id_kota');
            $table->unsignedBigInteger('id_provinsi');
            $table->unsignedBigInteger('id_pulau');
            $table->string('name');
            $table->boolean('is_luar_negri')->default(false);
            $table->string('long');
            $table->string('lat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_kota');
    }
};
