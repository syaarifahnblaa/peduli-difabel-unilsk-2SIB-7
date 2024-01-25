<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffKonseling extends Model
{
    use HasFactory;

    protected $table = 'staff_konselings';
    protected $primaryKey = 'id_staff_konseling';
    protected $fillable = [
        'nama',
        'jenis_konseling', 
        'deskripsi_konseling',
        'tanggal_konseling'
    ];
}
