<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PesertaKategori extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    public function lombas(): BelongsToMany
    {
        return $this->belongsToMany(Lomba::class, 'lomba_peserta_kategori');
    }
}
