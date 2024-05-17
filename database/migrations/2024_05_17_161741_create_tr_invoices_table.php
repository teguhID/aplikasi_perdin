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
        Schema::create('tr_invoice', function (Blueprint $table) {
            $table->bigIncrements('id_invoice');
            $table->string('id_user', 100);
            $table->unsignedBigInteger('total_harga');
            $table->string('domain', 100);
            $table->integer('duration');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tr_invoice');
    }
};
