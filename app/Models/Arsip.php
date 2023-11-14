<?php

namespace App\Models;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Arsip extends Model
{
    use HasFactory;
    protected $table = 'arsip';
    protected $fillable = ['no_surat', 'judul_arsip', 'file_arsip', 'kategori_id'];


    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

}
