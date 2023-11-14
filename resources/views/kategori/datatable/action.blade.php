<div class="btn-group" role="group">
    <div class="mx-1">
        <form action="{{ route('kategori.destroy', $model->id) }}" method="POST">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm delete-notification">
                <i class="bi bi-trash-fill"></i> Hapus
            </button>
        </form>
    </div>

    <div class="mx-1">
        <a href="{{ route('kategori.edit', $model->id) }}" class="btn btn-success btn-sm">
            <i class="bi bi-pencil-square"></i> Edit
        </a>
    </div>
</div>