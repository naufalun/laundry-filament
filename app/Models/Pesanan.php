<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';
    public $timestamps = false;

    protected $fillable = [
        'pelanggan_id',
        'pegawai_id',
        'diterima_pada',
        'estimasi_selesai',
        'status',
    ];

    protected $casts = [
        'diterima_pada' => 'datetime',
        'estimasi_selesai' => 'datetime',
        'status' => 'string',
    ];

    // Relasi: pesanan milik satu pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }

    // Relasi: pesanan ditangani satu pegawai
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }

    // Relasi: satu pesanan punya banyak detail pesanan
    public function detailPesanan()
    {
        return $this->hasMany(DetailPesanan::class, 'pesanan_id');
    }

    // Relasi: satu pesanan punya satu pembayaran
    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'pesanan_id');
    }
}