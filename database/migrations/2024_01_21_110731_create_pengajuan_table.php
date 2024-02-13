<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id();
            $table->string('kodePengajuan');
            $table->string('nomorBerkas');
            $table->string('nib');
            $table->string('namaDesa');
            $table->integer('idTim');
            $table->string('jenisBerkas');
            $table->integer('totalBidang');
            $table->string('rusakPengganti');
            $table->string('status');
            $table->timestamps();
        });

        DB::statement("
            CREATE VIEW view_pengajuan AS
            SELECT kodePengajuan, idTim, MAX(created_at) AS created_at
            FROM pengajuan
            GROUP BY kodePengajuan, idTim;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan');
        DB::statement("DROP VIEW IF EXISTS view_pengajuan;");
    }
};
