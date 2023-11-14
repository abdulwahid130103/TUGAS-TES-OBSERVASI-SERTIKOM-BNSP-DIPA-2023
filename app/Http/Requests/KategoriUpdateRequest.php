<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KategoriUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_kategori' => 'required|min:3|max:191',
            'judul_kategori' => 'required|min:3|max:500',
        ];
    }

    public function messages()
    {
        return [
            'nama_kategori.required' => 'Kolom nama wajib diisi!',
            'nama_kategori.min' => 'Kolom nama minimal 3 karakter!',
            'nama_kategori.max' => 'Kolom nama maksimal 191 karakter!',

            'judul_kategori.required' => 'Kolom judul wajib diisi!',
            'judul_kategori.min' => 'Kolom judul minimal 3 karakter!',
            'judul_kategori.max' => 'Kolom judul maksimal 500 karakter!'
        ];
    }
}
