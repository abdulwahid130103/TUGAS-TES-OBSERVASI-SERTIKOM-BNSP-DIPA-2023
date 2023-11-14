<?php

namespace App\Http\Controllers;

use App\Http\Requests\KategoriStoreRequest;
use App\Http\Requests\KategoriUpdateRequest;
use App\Http\Resources\KategoriEditResource;
use App\Models\Kategori;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::select('id', 'nama_kategori', 'judul_kategori')->orderBy('nama_kategori')->get();

        if (request()->ajax()) {
            return datatables()->of($kategori)
                ->addIndexColumn()
                ->addColumn('action', 'kategori.datatable.action')
                ->rawColumns(['action'])
                ->toJson();
        }

   
        return view('kategori.index');
    }

    
    public function create()
    {
        return view('kategori.create', ['ctId' => Kategori::count()+1]);
    }

    public function edit(int $id)
    {
        $id = (int)$id;
        $kategori = new KategoriEditResource(Kategori::findOrFail($id));

        return view('kategori.edit', compact('kategori', 'id'));

    }

    public function store(KategoriStoreRequest $request): RedirectResponse
    {
        Kategori::create($request->validated());

        return redirect()->route('kategori.index')->with('success', 'Data berhasil disimpan');
    }

    public function update(KategoriUpdateRequest $request, Kategori $kategori): RedirectResponse
    {
        $kategori->update($request->validated());

        return redirect()->route('kategori.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(Kategori $kategori): RedirectResponse
    {
        if ($kategori->arsip()->exists()) {
            return redirect()->route('kategori.index')->with('warning', 'Data yang memiliki relasi tidak dapat dihapus!');
        }

        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Data berhasil dihapus');
    }
}
