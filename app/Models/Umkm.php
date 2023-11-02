<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Umkm extends Model
{
    use HasFactory;

    protected $fillable = ['nama_usaha', 'pemilik_umkm_id','jenis','alamat','no_telpon','media_promosi',
    'produk_unggulan','gambar'];

    public function pemilik_umkm(): BelongsTo
    {
        return $this->belongsTo(PemilikUmkm::class);
    }
}
