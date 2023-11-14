<script>
	$(function () {
		let loadingAlert = $('.modal-body #loading-alert');

		$('#datatable').DataTable({
			processing: true,
			serverSide: true,
			ajax: "{{ route('kategori.index') }}",
			columns: [
				{ data: 'id', name: 'id' },
				{ data: 'nama_kategori', name: 'nama_kategori' },
				{ data: 'judul_kategori', name: 'judul_kategori' },
				{ data: 'action', name: 'action' },
			]
		});

		
	});
</script>
