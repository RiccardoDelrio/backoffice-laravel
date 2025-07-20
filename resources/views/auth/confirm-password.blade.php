@extends('layouts.master')

@section('title', 'Conferma Password - SteamLike')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1>🔐 Conferma la tua Password</h1>
            <p class="lead">Per continuare, conferma la tua password per motivi di sicurezza</p>
        </div>
    </section>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="steam-card">
                    <div class="card-header">
                        <h4 class="mb-0">
                            <i class="fas fa-shield-alt me-2"></i>Conferma Password
                        </h4>
                        <small class="text-muted">Inserisci la tua password per procedere</small>
                    </div>

                    <div class="card-body">
                        <div class="alert alert-info mb-4 auth-info-alert">
                            <i class="fas fa-info-circle me-2"></i>
                            Per la tua sicurezza, conferma la tua password prima di continuare.
                        </div>

                        <form method="POST" action="{{ route('password.confirm') }}" class="steam-form">
                            @csrf

                            <div class="form-group">
                                <label for="password" class="form-label">
                                    <i class="fas fa-lock"></i>{{ __('Password') }}
                                </label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password" placeholder="Inserisci la tua password">

                                @error('password')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="auth-form-actions auth-form-divider">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="link-steam">
                                        {{ __('Password dimenticata?') }}
                                    </a>
                                @endif

                                <button type="submit" class="btn-steam">
                                    <i class="fas fa-check"></i> {{ __('Conferma Password') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection