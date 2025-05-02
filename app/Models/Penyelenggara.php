<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penyelenggara extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'logo_url',
        'tentang',
        'website',
        'provinsi'
    ];

    public function lombas(): HasMany
    {
        return $this->hasMany(Lomba::class);
    }

    public function provinsi(): BelongsTo
    {
        return $this->belongsTo(Provinsi::class);
    }
}
