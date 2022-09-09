<form class="form-inline" wire:submit.prevent="submit">
    <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
            <div class="input-group-text">Mata Kuliah</div>
        </div>
        <select class="form-control @error('matakuliah_id') is-invalid @enderror" wire:model="matakuliah_id">
            <option value="" selected>-- BELUM DIPILIH --</option>
            @foreach ($matakuliahs as $matakuliah)
                <option value="{{ $matakuliah->id }}">{{ $matakuliah->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
            <div class="input-group-text">Pertemuan</div>
        </div>
        <select class="form-control @error('urutan') is-invalid @enderror" wire:model="urutan">
            <option value="" selected>-- BELUM DIPILIH --</option>
            @if ($matakuliah_id != null)
                @for ($i = 1; $i <= 14; $i++)
                    <option value="{{ $i }}">Pertemuan ke: {{ $i }}</option>
                @endfor
            @endif
        </select>
    </div>

    <button type="submit" class="btn btn-dark mb-2">
        <div wire:loading wire:target="submit">
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        </div>
        <small>Submit</small>
    </button>
</form>
