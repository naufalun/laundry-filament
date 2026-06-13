<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $table = 'promo';
    public $timestamps = false;

    protected $fillable = [
        'nama',
        'jenis',
        'nilai_diskon',
        'tanggal_mulai',
        'tanggal_selesai',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'nilai_diskon' => 'decimal:2',
    ];

    // Relasi: satu promo bisa berlaku untuk banyak layanan (many-to-many)
    public function layanan()
    {
        return $this->belongsToMany(Layanan::class, 'promo_layanan', 'promo_id', 'layanan_id');
    }
}