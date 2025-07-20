@extends('layouts.master')

@section('title', 'Reimposta Password - SteamLike')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1>🔄 Reimposta la tua Password</h1>
            <p class="lead">Crea una nuova password sicura per il tuo account</p>
        </div>
    </section>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="steam-card">
                    <div class="card-header">
                        <h4 class="mb-0">
                            <i class="fas fa-redo me-2"></i>Reset Password
                        </h4>
                        <small class="text-muted">Inserisci la tua nuova password</small>
                    </div>

                    <div class="card-body">
                        <div class="alert alert-info mb-4 auth-info-alert">
                            <i class="fas fa-info-circle me-2"></i>
                            Scegli una password sicura di almeno 8 caratteri.
                        </div>

                        <form method="POST" action="{{ route('password.update') }}" class="steam-form">
                            @csrf

                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="form-group">
                                <label for="email" class="form-label">
                                    <i class="fas fa-envelope"></i>{{ __('Indirizzo Email') }}
                                </label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"
                                    autofocus placeholder="Il tuo indirizzo email">

                                @error('email')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password" class="form-label">
                                    <i class="fas fa-lock"></i>{{ __('Nuova Password') }}
                                </label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password" placeholder="Crea una nuova password">

                                @error('password')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="form-label">
                                    <i class="fas fa-lock"></i>{{ __('Conferma Password') }}
                                </label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Ripeti la nuova password">
                            </div>

                            <div class="d-flex justify-content-between align-items-center pt-4"
                                style="border-top: 1px solid #2a475e;">
                                <a href="{{ route('login') }}" class="link-steam">
                                    Torna al login
                                </a>

                                <button type="submit" class="btn-steam">
                                    <i class="fas fa-save"></i> {{ __('Reimposta Password') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection