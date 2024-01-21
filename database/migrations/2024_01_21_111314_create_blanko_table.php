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
        Schema::create('blanko', function (Blueprint $table) {
            $table->id();
            $table->string('nomorBlanko');
            $table->string('nomorBerkas');
            $table->string('nib');
            $table->string('namaDesa');
            $table->integer('idTim');
            $table->string('jenisBerkas');
            $table->integer('totalBidang');
            $table->string('rusakPengganti');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blanko');
    }
};
