<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konseling extends Model
{
    protected $table = 'konseling'; // Nama tabel dalam database

    protected $fillable = [
        'id_user',
        'nim',
        'jenis_konseling',
        'tanggal_konseling',
        'nama',
        'riwayat_konseling',
        'deskripsi_konseling',
        'data_staff_konseling',
        'hasil_konseling',
    ];
}
