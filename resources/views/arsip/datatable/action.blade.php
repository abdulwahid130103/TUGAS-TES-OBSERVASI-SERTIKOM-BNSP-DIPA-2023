<div class="btn-group" role="group">

    <div class="mx-1">
        <form action="{{ route('arsip.destroy', $model->id) }}" method="POST">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm delete-notification">
                <i class="bi bi-trash-fill"></i> Hapus
            </button>
        </form>
    </div>
    <div class="mx-1">
        <a href="{{ route('arsip.download', $model->id) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-download"></i> Unduh
        </a>
    </div>
    <div class="mx-1">
        <a href="{{ route('arsip.show', $model->id) }}" class="btn btn-primary btn-sm">
            <i class="bi bi-search"></i> Lihat >>
        </a>
    </div>    
</div>

