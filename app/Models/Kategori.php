<?php

namespace App\Models;

use App\Models\Arsip;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $fillable = ['nama_kategori', 'judul_kategori'];

    public function arsip(): HasMany
    {
        return $this->hasMany(Arsip::class);
    }
}
