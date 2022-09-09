@extends('layouts.app')

@section('title')
    Presensi
@endsection

@section('content')
    <div class="row">
        <h1 class="display-1 mb-3">
            <i class="fas fa-clipboard-list"></i>
        </h1>
        <h1 class="display-5 fw-bold">Halaman Presensi</h1>
        <h5 class="text-muted">Pastikan mata kuliah dan pertemuannya sudah benar.</h5>
    </div>
    <livewire:mahasiswa.presensi :id_pertemuan="$id_pertemuan" :matakuliah_id="$matakuliah_id" :urutan="$urutan" />
@endsection
