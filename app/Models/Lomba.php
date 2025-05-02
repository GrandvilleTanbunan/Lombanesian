<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Lomba extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'poster_url',
        'biaya_pendaftaran_individu',
        'biaya_pendaftaran_tim',
        'tanggal_mulai',
        'tanggal_selesai',
        'keterangan',
        'persyaratan',
        'jadwal_kegiatan',
        'hadiah',
        'jumlah_like',
        'jumlah_view',
        'jenis_lomba',
        'penyelenggara_id',
        'provinsi_id',
        'link_pendaftaran'
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'biaya_pendaftaran' => 'decimal:2',
        'jumlah_like' => 'integer',
        'jumlah_view' => 'integer',
    ];

    public function penyelenggara(): BelongsTo
    {
        return $this->belongsTo(Penyelenggara::class);
    }

    public function provinsi(): BelongsTo
    {
        return $this->belongsTo(Provinsi::class);
    }

    public function pesertaKategori(): BelongsToMany
    {
        return $this->belongsToMany(PesertaKategori::class, 'lomba_peserta_kategori');
    }

    public function mentors(): BelongsToMany
    {
        return $this->belongsToMany(Mentor::class, 'mentor_lomba');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_lomba');
    }
}
