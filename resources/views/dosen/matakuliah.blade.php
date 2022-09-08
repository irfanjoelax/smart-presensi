@extends('layouts.dashboard-adminlte')

@section('title')
    Mata Kuliah
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Mata Kuliah</li>
@endsection

@section('content')
    <livewire:dosen.matakuliah.form />
    <livewire:dosen.matakuliah.index />
@endsection

@section('script')
    <script>
        window.addEventListener('backTop', () => {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        })
    </script>
@endsection
