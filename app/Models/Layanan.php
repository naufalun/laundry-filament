<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $table = 'layanan';
    public $timestamps = false;

    protected $fillable = [
        'nama',
        'harga_per_kg',
        'estimasi_hari',
    ];

    // Relasi: satu layanan bisa ada di banyak detail pesanan
    public function detailPesanan()
    {
        return $this->hasMany(DetailPesanan::class, 'layanan_id');
    }

    // Relasi: satu layanan bisa ada di banyak promo (many-to-many)
    public function promo()
    {
        return $this->belongsToMany(Promo::class, 'promo_layanan', 'layanan_id', 'promo_id');
    }
}