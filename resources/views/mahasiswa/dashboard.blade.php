@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="display-1 mb-3">
                <i class="fas fa-tachometer-alt"></i>
            </h1>
            <h1 class="display-5 fw-bold">Halaman Dashboard</h1>
            <h5 class="text-muted">Daftar presensi mata kuliah kamu.</h5>
            <a href="{{ url('mahasiswa/scan') }}" class="btn btn-dark w-100">
                Scan QR
            </a>
        </div>
    </div>
    <div class="row mt-3">
        @foreach ($presensis as $presensi)
            <div class="col-12 mb-3">
                <div class="bg-white shadow p-3 rounded">
                    <h5 class="fw-bold">{{ $presensi->pertemuan->matakuliah->nama }}</h5>
                    <h6 class="text-muted">{{ $presensi->pertemuan->matakuliah->user->name }}</h6>
                    <div class="d-flex align-items-center justify-content-between mt-3">
                        <span class="d-flex align-items-center gap-2 text-success">
                            <i class="fas fa-calendar-alt"></i>
                            <small>Pertemuan ke-{{ $presensi->pertemuan->urutan }}</small>
                        </span>
                        <span class="d-flex align-items-center gap-2 text-danger">
                            <i class="fas fa-clock"></i>
                            <small>{{ substr($presensi->created_at, 11, 8) }}</small>
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
