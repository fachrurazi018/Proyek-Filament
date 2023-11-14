<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kegiatan extends Model
{
    use HasFactory;

    protected $fillable = ['umkm_id','nama_kegiatan','gambar','deskripsi'];

    public function umkm(): BelongsTo
    {
        return $this->belongsTo(Umkm::class);
    }

}
