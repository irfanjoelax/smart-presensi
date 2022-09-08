@extends('layouts.dashboard-adminlte')

@section('title')
    Generate QR
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Generate QR</li>
@endsection

@section('content')
    <livewire:dosen.generate />
@endsection
