<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';
    public $timestamps = false;

    protected $fillable = [
        'nama',
        'nomor_telepon',
        'jabatan',
        'foto',
    ];

    // Relasi: satu pegawai bisa punya banyak pesanan
    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'pegawai_id');
    }

    // Relasi: satu pegawai bisa punya banyak jadwal kerja
    public function jadwalKerja()
    {
        return $this->hasMany(JadwalKerja::class, 'pegawai_id');
    }
}