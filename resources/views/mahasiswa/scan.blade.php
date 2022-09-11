@extends('layouts.app')

@section('title')
    Scan
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="display-1 mb-3">
                <i class="fas fa-qrcode"></i>
            </h1>
            <h1 class="display-5 fw-bold">Scan Presensi</h1>
            <h5 class="text-muted">
                Pastikan matakuliah dan pertemuan sudah benar
            </h5>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div id="reader" height="300px"></div>
        </div>
    </div>
@endsection
