<div class="row mt-3">
    <div class="col-12">
        <div class="card rounded shadow p-3">
            <div class="d-flex flex-column mb-3">
                <small class="text-muted">Matakuliah</small>
                <p class="h3">{{ $matakuliah->nama }}</p>
            </div>
            <div class="d-flex flex-column mb-3">
                <small class="text-muted">Dosen</small>
                <p class="h3">{{ $matakuliah->user->name }}</p>
            </div>
            <div class="d-flex flex-column mb-3">
                <small class="text-muted">Pertemuan</small>
                <p class="h3">Ke-{{ $urutan }}</p>
            </div>
            <button wire:click="presensi" class="btn btn-lg btn-dark">
                <div wire:loading wire:target="presensi">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                </div>
                <span>Presensi Sekarang</span>
            </button>
        </div>
    </div>
</div>
