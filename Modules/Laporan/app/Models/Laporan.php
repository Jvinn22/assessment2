<?php

namespace Modules\Laporan\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporans';
    
    protected $fillable = [
        'user_id', 'titik_sampah_id', 'volume_sampah', 'status_kondisi', 'deskripsi', 'foto_bukti'
    ];

    protected $appends = ['bukti_url'];

    protected function buktiUrl(): Attribute
    {
        return Attribute::get(fn () => $this->foto_bukti ? asset('storage/' . $this->foto_bukti) : null);
    }
}