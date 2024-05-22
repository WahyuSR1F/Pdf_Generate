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
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            $table->string('tertuju')->nullable();
            $table->string('shift_dinas')->default('Open this select menu');
            $table->string('nama')->default('Open this select menu');
            $table->date('tanggal')->nullable();
            $table->time('waktu')->nullable();
            $table->text('deskripsi_perintah')->nullable();
            $table->text('output')->nullable();
            $table->string('nama_manajer_teknik')->nullable();
            $table->string('nama_manajer_supervisor')->nullable();
            $table->string('nama_pelaksana')->nullable();
            $table->time('jam_mulai')->nullable();
            $table->time('jam_selesai')->nullable();
            $table->string('status_pelaksanaan')->default('Open this select menu');
            $table->text('catatan_kendala')->nullable();
            $table->text('usulan')->nullable();
            $table->text('catatan_pemberi_tugas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};