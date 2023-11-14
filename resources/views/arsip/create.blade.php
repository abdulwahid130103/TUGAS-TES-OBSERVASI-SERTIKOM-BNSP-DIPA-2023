<x-app>

@slot('content')
<section>
    
    <div class="container">
        <x-alert />
        <div class="row">
            <div class="d-flex flex-column">
                <p style="font-size: 16px;">Unggah surat yang telah terbit pada form ini untuk diarsipkan.</p>
                <p>Catatan : </p>
                <p>· Gunakan file berformat PDF</p><br>
            </div>
        </div>
        <div class="row">
            @slot('page')
                Arsip >> Unggah
            @endslot
        
        
            <div class="col card px-3 py-3">
                <form action="{{ route('arsip.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="no_surat" class="form-label">Nomor Surat</label>
                                <input type="text" class="form-control @error('no_surat') is-invalid @enderror"
                                    name="no_surat" id="no_surat" 
                                    placeholder="Masukkan Nomor Surat..">
        
                                @error('no_surat')
                                <div class="d-block invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
        
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="kategori_id" class="form-label">Kategori</label>
                                <select class="form-select select2" name="kategori_id" id="kategori_id">
                                    
                                    @foreach ($kategori as $kategoris)
                                    <option value="{{ $kategoris->id }}" {{ old('kategori_id')==="$kategoris->id" ? 'selected'
                                        : '' }}>
                                        {{ $kategoris->nama_kategori }}
                                    </option>
                                    @endforeach
                                </select>
        
                                @error('kategori_id')
                                <div class="d-block invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="mb-3">
                                <label for="judul_arsip" class="form-label">Judul</label>
                                <input type="text" class="form-control @error('judul_arsip') is-invalid @enderror"
                                    name="judul_arsip" id="judul_arsip"
                                    placeholder="Masukkan Judul Arsip..">
        
                                @error('judul_arsip')
                                <div class="d-block invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="mb-3">
                                <label for="file_arsip" class="form-label">File Surat (PDF)</label>
                                <input type="file" name="file_arsip" class="form-control" accept=".pdf" 
                                placeholder="Browse File..">
                                @error('file_arsip')
                                <div class="d-block invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
        
                    <div class="d-flex justify-content-start pb-3">
                        <div class="btn-group d-gap gap-2">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        @endslot
        
        @slot('script')
            <script></script>
        @endslot
        </div>
    </div>
    

</x-app>



	
	