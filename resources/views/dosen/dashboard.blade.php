@extends('layouts.dashboard-adminlte')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-4 col-12">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>150</h3>
                    <p>Mata Kuliah</p>
                </div>
                <div class="icon">
                    <i class="fas fa-book"></i>
                </div>
                <a href="{{ url('/dosen/matakuliah') }}" class="small-box-footer">
                    Selengkapnya <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-12">
            <div class="small-box bg-light">
                <div class="inner">
                    <h3>Cek</h3>
                    <p>Daftar Presensi</p>
                </div>
                <div class="icon">
                    <i class="far fa-address-book"></i>
                </div>
                <a href="{{ url('/dosen/presensi') }}" class="small-box-footer">
                    Selengkapnya <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-12">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>QR</h3>
                    <p>Generate Sekarang</p>
                </div>
                <div class="icon">
                    <i class="fas fa-qrcode"></i>
                </div>
                <a href="{{ url('/dosen/generate-qr') }}" class="small-box-footer">
                    Selengkapnya <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
@endsection
