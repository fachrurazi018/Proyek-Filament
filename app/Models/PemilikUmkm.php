<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PemilikUmkm extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    public function umkm(): HasMany
    {
        return $this->hasMany(Umkm::class);
    }
}
