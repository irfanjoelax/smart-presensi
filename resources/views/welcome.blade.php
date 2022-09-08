@extends('layouts.auth-adminlte')

@section('title')
    Welcome
@endsection

@section('content')
    <div class="container">
        <h1>Halaman Login</h1>
        <a href="{{ url('/login', []) }}">Login</a>
    </div>
@endsection
