<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $table = 'laporan';

    protected $fillable = [
        'tertuju',
        'shift_dinas',
        'nama',
        'tanggal',
        'waktu',
        'deskripsi_perintah',
        'output',
        'tujuan_manajer_teknik',
        'tujuan_manajer_supervisor',
        'nama_pelaksana_tujuan',
        'jam_mulai',
        'jam_selesai',
        'status_pelaksanaan',
        'catatan_kendala',
        'usulan',
        'catatan_pemberi_tugas',
        'pelaksana_manajer_teknik',
        'pelaksana_manajer_supervisor',
        'nama_pelaksana',
    ];
}