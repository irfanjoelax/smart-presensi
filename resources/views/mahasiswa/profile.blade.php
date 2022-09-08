@extends('layouts.app')

@section('title')
    Profile
@endsection

@section('content')
    <div class="row">
        <h1 class="display-1 mb-3">
            <i class="fas fa-user-cog"></i>
        </h1>
        <h1 class="display-5 fw-bold">
            Halaman Profile
        </h1>
        <h5 class="text-muted">Atur profile dan data diri kamu disini.</h5>
    </div>
    <div class="row mt-5">
        <div class="col">
            <a href="{{ route('logout') }}"
                class="btn btn-lg btn-outline-danger d-flex gap-2 align-items-center justify-content-center"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
                <span>keluar Ahh..</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
@endsection
