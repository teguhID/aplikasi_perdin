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
        Schema::create('tr_perdin', function (Blueprint $table) {
            $table->bigIncrements('id_perdin');
            $table->unsignedBigInteger('id_kota_asal');
            $table->unsignedBigInteger('id_kota_tujuan');
            $table->unsignedBigInteger('id_user_pengaju');
            $table->unsignedBigInteger('id_user_approval');
            $table->unsignedBigInteger('id_status');
            $table->text('tujuan');
            $table->string('date_berangkat');
            $table->string('date_pulang');
            $table->integer('durasi');
            $table->integer('jarak');
            $table->string('mata_uang');
            $table->integer('uang_saku');
            $table->integer('total_uang_saku');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tr_perdin');
    }
};
