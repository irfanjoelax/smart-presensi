@extends('layouts.dashboard-adminlte')

@section('title')
    Presensi
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Presensi</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <livewire:dosen.presensi.form />
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <livewire:dosen.presensi.table />
        </div>
    </div>
@endsection
