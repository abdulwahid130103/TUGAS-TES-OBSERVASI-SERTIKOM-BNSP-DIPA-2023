<script>
	$(function () {
		let loadingAlert = $('.modal-body #loading-alert');

		$('#datatable').DataTable({
			processing: true,
			serverSide: true,
			ajax: "{{ route('arsip.index') }}",
			columns: [
				{ data: 'no_surat', name: 'no_surat' },
                { data: 'kategori_id', name: 'kategori.nama_kategori' },
                { data: 'judul_arsip', name: 'judul_arsip' },
                { data: 'updated_at', name: 'updated_at' },
				{ data: 'action', name: 'action' }
			]
		});

	});
</script>
