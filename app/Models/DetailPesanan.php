<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model
{
    protected $table = 'detail_pesanan';

    public $timestamps = false;

    protected $fillable = [
        'pesanan_id',
        'layanan_id',
        'berat_kg',
        'subtotal',
    ];

    protected $casts = [
        'berat_kg' => 'decimal:2',
        'subtotal' => 'decimal:2',
    ];

    // Relasi: detail pesanan milik satu pesanan
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id');
    }

    // Relasi: detail pesanan merujuk ke satu layanan
    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }
}