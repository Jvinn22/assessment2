<?php

namespace Modules\TitikSampah\Models;

use Illuminate\Database\Eloquent\Model;

class Sampah extends Model
{
    protected $fillable = ['nama_tps', 'kecamatan', 'deskripsi', 'kapasitas_kg'];
}