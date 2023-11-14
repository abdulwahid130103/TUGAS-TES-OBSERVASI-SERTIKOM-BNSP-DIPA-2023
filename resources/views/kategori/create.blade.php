<x-app>

@slot('content')
<section>

	
	<div class="container">
		<x-alert />
		<div class="row">
			@slot('page')
				Kategori >> Create
			@endslot
			{{-- <label class="form-label">Tambahkan atau edit data kategori. Jika sudah selesai, jangan lupa untuk</label>
			<label class="form-label">mengklik tombol "Simpan" </label><br>
			<label class="form-label">       </label> --}}
			<div class="col card px-3 py-3">
				<form action="{{ route('kategori.store') }}" method="POST">
					@csrf
					<div class="row">
		
						<div class="col-md-12">
							<div class="mb-3">
								<label for="id" class="form-label">ID (Auto Increment)</label>
								<input type="number" class="form-control @error('id') is-invalid @enderror" name="id" id="id" value="{{ $ctId }}"disabled>
		
							</div>
						</div>
		
						<div class="col-md-12">
							<div class="mb-3">
								<label for="nama_kategori" class="form-label">Nama Kategori</label>
								<input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" name="nama_kategori" id="nama_kategori" placeholder="Masukkan nama kategori..">
		
								@error('nama_kategori')
								<div class="invalid-feedback d-block">
									{{ $message }}
								</div>
								@enderror
							</div>
						</div>
		
						<div class="col-md-12">
							<div class="mb-3">
								<label for="judul_kategori" class="form-label">Judul Kategori</label>
								<input type="text" class="form-control @error('judul_kategori') is-invalid @enderror" name="judul_kategori" id="judul_kategori" placeholder="Masukkan judul kategori..">
		
								@error('judul_kategori')
								<div class="invalid-feedback d-block">
									{{ $message }}
								</div>
								@enderror
							</div>
						</div>
					</div>
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
		</div>
	</div>

</section>
@endslot

@slot('script')
	<script></script>
@endslot
</x-app>