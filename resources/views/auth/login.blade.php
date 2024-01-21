<!-- resources/views/login.blade.php -->

@extends('layouts.login')

@section('content')
    <div class="left-panel">
        <div class="logo-container">
            <img src="./assets/bpn.png" alt="Logo"> <!-- Ganti dengan path logo Anda -->
            <div class="instansi">
                <p>Kementerian Agraria dan Tata Ruang / Badan Pertanahan Nasional</p> <!-- Ganti dengan nama instansi Anda -->
            </div>
        </div>
        <div class="form-container">
            <h1><b>Login Internal BLANKO SERTIPIKAT</b></h1>
            <p>Silahkan masuk untuk memulai aplikasi</p>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="right-panel">
        <img src="./assets/bgbpn.jpg" alt="bg">
    </div>
@endsection
