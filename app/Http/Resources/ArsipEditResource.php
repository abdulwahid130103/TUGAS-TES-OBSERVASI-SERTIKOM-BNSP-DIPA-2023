<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArsipEditResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'no_surat' => $this->no_surat,
            'judul_arsip' => $this->judul_arsip,
            'file_arsip' => $this->file_arsip,
            'kategori_id' => $this->kategori_id,
            'kategori' => [
                'id' => $this->kategori->id,
                'nama_kategori' => $this->kategori->nama_kategori
            ]
        ];
    }
}
