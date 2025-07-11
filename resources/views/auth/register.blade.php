@extends('layouts.master')

@section('title', 'Registrati - SteamLike')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <h1>🚀 Crea il tuo Account</h1>
        <p class="lead">Unisciti alla community e inizia a collezionare i tuoi videogiochi preferiti</p>
    </div>
</section>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="steam-card">
                <div class="card-header">
                    <h4 class="mb-0">
                        <i class="fas fa-user-plus me-2"></i>Registrazione
                    </h4>
                    <small class="text-muted">Crea il tuo account gratuito</small>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" class="steam-form">
                        @csrf

                        <div class="form-group">
                            <label for="name" class="form-label">
                                <i class="fas fa-user"></i>{{ __('Nome') }}
                            </label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                                   name="name" value="{{ old('name') }}" required autocomplete="name" autofocus 
                                   placeholder="Il tuo nome completo">

                            @error('name')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">
                                <i class="fas fa-envelope"></i>{{ __('Indirizzo Email') }}
                            </label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                   name="email" value="{{ old('email') }}" required autocomplete="email" 
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
                                   name="password" required autocomplete="new-password" 
                                   placeholder="Crea una password sicura">

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
                                   placeholder="Ripeti la password">
                        </div>

                        <div class="d-flex justify-content-between align-items-center pt-4" style="border-top: 1px solid #2a475e;">
                            <a href="{{ route('login') }}" class="link-steam">
                                Hai già un account? Accedi
                            </a>
                            
                            <button type="submit" class="btn-steam">
                                <i class="fas fa-user-plus"></i> {{ __('Registrati') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
