<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Provinsi extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    public function lombas(): HasMany
    {
        return $this->hasMany(Lomba::class);
    }

    public function penyelenggaras(): HasMany
    {
        return $this->hasMany(Penyelenggara::class);
    }
}
