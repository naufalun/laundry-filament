<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromoLayanan extends Model
{
    protected $table = 'promo_layanan';

    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'promo_id',
        'layanan_id',
    ];

    // Relasi: pivot ini milik satu promo
    public function promo()
    {
        return $this->belongsTo(Promo::class, 'promo_id');
    }

    // Relasi: pivot ini milik satu layanan
    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }
}