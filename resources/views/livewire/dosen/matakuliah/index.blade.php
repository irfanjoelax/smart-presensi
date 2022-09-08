<div class="row mt-4">
    @forelse ($matakuliahs as $matakuliah)
        <div class="col-md-3">
            <div class="card shadow p-3">
                <h5 class="font-weight-bold">{{ $matakuliah->nama }}</h5>
                <hr>
                <div class="d-flex align-item-center justify-content-between">
                    <div class="d-flex flex-column">
                        <small class="font-weight-bold">{{ $matakuliah->hari }}</small>
                        <small class="text-muted">Pukul: {{ $matakuliah->jam }}</small>
                    </div>
                    <div class="d-flex flex-column">
                        <small class="font-weight-bold">Kuota</small>
                        <small class="text-muted">{{ $matakuliah->kuota }} Mahasiswa</small>
                    </div>
                </div>
                <div class="d-flex flex-column mt-3">
                    <button type="button" class="btn btn-sm btn-primary mb-2" wire:click="edit({{ $matakuliah->id }})">
                        <div wire:loading wire:target="edit({{ $matakuliah->id }})">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        </div>
                        Mau diedit nih
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-danger"
                        wire:click="delete({{ $matakuliah->id }})">
                        <div wire:loading wire:target="delete({{ $matakuliah->id }})">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        </div>
                        Hapus yah?
                    </button>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="card shadow p-3">
                <h1 class="display-1 mb-3 text-warning">
                    <i class="fas fa-exclamation-circle"></i>
                </h1>
                <h3 class="font-weight-bold">
                    Mata Kuliah Bapak/Ibu Dosen masih kosong
                </h3>
                <h6 class="text-muted">
                    Silakan Ditambahkan dulu ya..
                </h6>
            </div>
        </div>
    @endforelse

    <div class="col-12 mt-2">
        {{ $matakuliahs->links() }}
    </div>
</div>
