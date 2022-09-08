@extends('layouts.auth-adminlte')

@section('title')
    Log in
@endsection

@section('content')
    <div class="login-box">
        <div class="card card-outline card-dark">
            <div class="card-header text-center">
                <a href="#" class="h1">
                    <b>{{ config('app.name', 'Laravel') }}</b>
                </a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="no_induk" class="form-control @error('no_induk') is-invalid @enderror"
                            placeholder="No. Induk" name="no_induk" value="{{ old('no_induk') }}" required
                            autocomplete="no_induk" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('no_induk')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="Password" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-dark btn-block">Sign In</button>
                        </div>
                    </div>
                </form>
                @if (Route::has('password.request'))
                    <p class="mb-1 mt-3">
                        <a href="forgot-password.html">I forgot my password</a>
                    </p>
                @endif
            </div>

        </div>

    </div>
@endsection
