<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalKerja extends Model
{
    protected $table = 'jadwal_kerja';

    public $timestamps = false;

    protected $fillable = [
        'pegawai_id',
        'hari',
        'jam_mulai',
        'jam_selesai',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }
}