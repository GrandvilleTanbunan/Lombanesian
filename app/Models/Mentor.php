<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mentor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'foto_url',
        'program_studi',
        'universitas',
        'prestasi_lomba',
        'tarif',
    ];

    protected $casts = [
        'tarif' => 'decimal:2',
    ];

    public function lombas(): BelongsToMany
    {
        return $this->belongsToMany(Lomba::class, 'mentor_lomba');
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(MentorSchedule::class);
    }
}
