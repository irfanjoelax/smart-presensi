<form class="row" wire:submit.prevent="submit">
    <input type="hidden" wire:model="idMatakuliah">
    <div class="col-md-5">
        <input type="text" class="form-control" wire:model="nama" placeholder="Nama Mata Kuliah" required>
    </div>
    <div class="col-md-2">
        <select class="form-control" wire:model="hari" required>
            <option value="" selected>-- Pilih Hari --</option>
            <option value="Senin">Senin</option>
            <option value="Selasa">Selasa</option>
            <option value="Rabu">Rabu</option>
            <option value="Kamis">Kamis</option>
            <option value="Jumat">Jumat</option>
            <option value="Sabtu">Sabtu</option>
        </select>
    </div>
    <div class="col-md-2">
        <input type="time" class="form-control" wire:model="jam" required>
    </div>
    <div class="col-md-1">
        <input type="number" class="form-control" wire:model="kuota" placeholder="0" required>
    </div>
    <div class="col-md-2">
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-dark w-100">
                    <div wire:loading wire:target="submit">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    </div>
                    <small>{{ $isEdit ? 'Ubah' : 'Tambah' }}</small>
                </button>
            </div>
            @if ($isEdit)
                <div class="col">
                    <button type="button" wire:click="resetForm" class="btn btn-secondary w-100">
                        <div wire:loading wire:target="resetForm">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        </div>
                        <small>Batal</small>
                    </button>
                </div>
            @endif
        </div>
    </div>
</form>
