<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    public $timestamps = false;

    protected $fillable = [
        'pesanan_id',
        'jumlah_bayar',
        'dibayar_pada',
        'metode',
        'status',
    ];

    protected $casts = [
        'jumlah_bayar' => 'decimal:2',
        'dibayar_pada' => 'datetime',
        'metode' => 'string',
        'status' => 'string',
    ];

    // Relasi: pembayaran milik satu pesanan
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id');
    }
}