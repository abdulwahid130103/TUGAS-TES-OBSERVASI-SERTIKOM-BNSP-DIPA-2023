<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArsipStoreRequest;
use App\Http\Resources\ArsipEditResource;
use App\Http\Requests\ArsipUpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Kategori;
use App\Models\Arsip;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ArsipController extends Controller
{
    public function index()
    {
        $arsip = Arsip::with('kategori:id,nama_kategori')
            ->select('id','no_surat','kategori_id','judul_arsip','updated_at')
            ->get();

        if (request()->ajax()) {
            return datatables()->of($arsip)
                ->addIndexColumn()
                ->addColumn('updated_at', function ($model) {return $model->updated_at->format('d-m-Y H:i:s');})
                ->addColumn('kategori_id', function ($model) { return $model->kategori->nama_kategori;})    
                ->addColumn('action', 'arsip.datatable.action')
                ->rawColumns(['action', 'kategori_id'])
                ->toJson();
        }
        $kategori = Kategori::select('id', 'nama_kategori')->orderBy('nama_kategori')->get();

        return view('arsip.index', [
            'kategori' => $kategori,
        ]);
    }

    public function store(ArsipStoreRequest $request): RedirectResponse
    {

        $filename = null;

        if ($request->hasFile('file_arsip')) {
            $file = $request->file('file_arsip');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('assets', $filename, 'public'); 

            Arsip::create([
                'kategori_id' => $request->kategori_id,
                'no_surat' => $request->no_surat,
                'judul_arsip' => $request->judul_arsip,
                'file_arsip' => $filename,
            ]);
        }else{
            Arsip::create([
                'kategori_id' => $request->kategori_id,
                'no_surat' => $request->no_surat,
                'judul_arsip' => $request->judul_arsip,
            ]);
        }

        return redirect()->route('arsip.index')->with('success', 'Data berhasil disimpan');
    }

    public function update(ArsipUpdateRequest $request, $id): RedirectResponse
    {
        $arsip = new ArsipEditResource(Arsip::findOrFail($id));

        $filename = null;

        if ($request->hasFile('file_arsip')) {
            $file = $request->file('file_arsip');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('assets', $filename, 'public'); 

            $arsip->update([
                'no_surat' => $request->input('no_surat'),
                'kategori_id' => $request->input('kategori_id'),
                'judul_arsip' => $request->input('judul_arsip'),
                'file_arsip' => $filename
            ]);
        }else{
            $arsip->update([
                'no_surat' => $request->input('no_surat'),
                'kategori_id' => $request->input('kategori_id'),
                'judul_arsip' => $request->input('judul_arsip')
            ]);
        }

        return redirect()->route('arsip.index')->with('success', 'Data berhasil diubah');
    }


    public function create()
    {
        $kategori = Kategori::select('id', 'nama_kategori')->orderBy('nama_kategori')->get();

        return view('arsip.create', [
            'kategori' => $kategori,
        ]);
    }

    public function show(int $id)
    {
        $id = (int)$id;
        $arsip = new ArsipEditResource(Arsip::findOrFail($id));

        return view('arsip.show', compact('arsip', 'id'));
    }

    public function edit(int $id)
    {
        $id = (int)$id;
        $arsip = new ArsipEditResource(Arsip::findOrFail($id));

        $kategori = Kategori::select('id', 'nama_kategori')->orderBy('nama_kategori')->get();

        return view('arsip.edit', compact('arsip', 'id'), [
            'kategori' => $kategori,
        ]);

    }

    public function destroy(Arsip $arsip): RedirectResponse
    {
        $filename = $arsip->file_arsip;

        Storage::disk('public')->delete('assets/' . $filename);
        $arsip->delete();

        return redirect()->route('arsip.index')->with('success', 'Data berhasil dihapus');
    }

    public function download(int $id)
    {
        $arsip = new ArsipEditResource(Arsip::findOrFail($id));

        $filePath = 'assets/' . $arsip->file_arsip;


        $fileContent = Storage::disk('public')->get($filePath);


        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $arsip->file_arsip . '"',
        ];

        return response()->streamDownload(
            function () use ($fileContent) {
                echo $fileContent;
            },
            $arsip->file_arsip,
            $headers
        );
    }
}
