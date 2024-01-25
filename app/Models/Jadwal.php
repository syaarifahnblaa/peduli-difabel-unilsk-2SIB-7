<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwals';
    protected $primaryKey = 'id_jadwal';
    protected $fillable = [
        'judul_seminar', 
        'deskripsi',
        'tanggal_seminar'
    ];
}
