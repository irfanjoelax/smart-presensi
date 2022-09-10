<div class="row">
    <div class="col-md-5">
        <form class="card rounded shadow p-3" wire:submit.prevent="submit">
            <div class="form-group mb-3">
                <label>Mata Kuliah</label>
                <select class="form-control @error('matakuliah_id') is-invalid @enderror" wire:model="matakuliah_id">
                    <option value="" selected>-- BELUM DIPILIH --</option>
                    @foreach ($matakuliahs as $matakuliah)
                        <option value="{{ $matakuliah->id }}">{{ $matakuliah->nama }}</option>
                    @endforeach
                </select>
                @error('matakuliah_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label>Pertemuan</label>
                <select class="form-control @error('urutan') is-invalid @enderror" wire:model="urutan">
                    <option value="" selected>-- BELUM DIPILIH --</option>
                    @if ($matakuliah_id != null)
                        @for ($i = 1; $i <= 14; $i++)
                            <option value="{{ $i }}">Pertemuan ke: {{ $i }}</option>
                        @endfor
                    @endif
                </select>
                @error('urutan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <button type="submit" class="btn btn-dark">
                    <div wire:loading wire:target="submit">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    </div>
                    <small>Generate</small>
                </button>
                @if ($kunci != null)
                    <button type="button" wire:click="resetForm" class="btn btn-warning ml-2">
                        <div wire:loading wire:target="resetForm">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        </div>
                        <small>Reset</small>
                    </button>
                @endif
            </div>
        </form>
    </div>
    <div class="col-md-7">
        <div class="card rounded shadow p-3">
            <p class="h5 text-center">
                Tersisa: <strong class="text-primary">{{ $tersisa }}</strong> Mahasiswa
            </p>
            @if ($kunci != null)
                <div class="m-auto text-center pt-4">
                    {{-- {!! QrCode::size(300)->generate(url('mahasiswa/presensi/' . $matakuliah_id . '/' . $urutan . '/' . $kunci)) !!} --}}
                    {!! QrCode::size(300)->generate(
                        'http://192.168.152.87/smart-presensi/public/mahasiswa/presensi/' . $matakuliah_id . '/' . $urutan . '/' . $kunci,
                    ) !!}
                    <p class="mt-3">
                        <small>Scan QR code untuk melakukan presensi</small>
                    </p>
                </div>
            @endif
        </div>
    </div>
</div>
