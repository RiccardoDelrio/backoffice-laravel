@extends('layouts.master')

@section('title', 'Accedi - SteamLike')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <h1>🔐 Accedi al tuo Account</h1>
        <p class="lead">Entra nel mondo dei videogiochi e gestisci la tua collezione</p>
    </div>
</section>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="steam-card">
                <div class="card-header">
                    <h4 class="mb-0">
                        <i class="fas fa-sign-in-alt me-2"></i>Login
                    </h4>
                    <small class="text-muted">Accedi con le tue credenziali</small>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" class="steam-form">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="form-label">
                                <i class="fas fa-envelope"></i>{{ __('Indirizzo Email') }}
                            </label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus 
                                   placeholder="Il tuo indirizzo email">

                            @error('email')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">
                                <i class="fas fa-lock"></i>{{ __('Password') }}
                            </label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                   name="password" required autocomplete="current-password" 
                                   placeholder="La tua password">

                            @error('password')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Ricordami') }}
                                </label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center pt-4" style="border-top: 1px solid #2a475e;">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="link-steam">
                                    {{ __('Password dimenticata?') }}
                                </a>
                            @endif
                            
                            <button type="submit" class="btn-steam">
                                <i class="fas fa-sign-in-alt"></i> {{ __('Accedi') }}
                            </button>
                        </div>
                        
                        <div class="text-center mt-4">
                            <p class="mb-0">Non hai un account? 
                                <a href="{{ route('register') }}" class="link-steam">Registrati ora</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
