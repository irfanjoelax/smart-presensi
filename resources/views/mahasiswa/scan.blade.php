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

@section('script')
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            window.location.replace(decodedText);
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: 250
            });
        html5QrcodeScanner.render(onScanSuccess);
    </script>
@endsection
