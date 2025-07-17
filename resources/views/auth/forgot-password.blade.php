@extends('layouts.master')

@section('title', 'Recupera Password - SteamLike')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1>🔑 Recupera la tua Password</h1>
            <p class="lead">Non ricordi la password? Nessun problema, ti aiutiamo a recuperarla</p>
        </div>
    </section>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="steam-card">
                    <div class="card-header">
                        <h4 class="mb-0">
                            <i class="fas fa-key me-2"></i>Reset Password
                        </h4>
                        <small class="text-muted">Inserisci la tua email per ricevere il link di reset</small>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="steam-alert alert-success mb-4">
                                <i class="fas fa-check-circle me-2"></i>
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="alert alert-info mb-4"
                            style="background: linear-gradient(135deg, #66c0f4 0%, #2a475e 100%); border: 1px solid #66c0f4; color: white;">
                            <i class="fas fa-info-circle me-2"></i>
                            Ti invieremo un link per reimpostare la password alla tua email.
                        </div>

                        <form method="POST" action="{{ route('password.email') }}" class="steam-form">
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

                            <div class="d-flex justify-content-between align-items-center pt-4"
                                style="border-top: 1px solid #2a475e;">
                                <a href="{{ route('login') }}" class="link-steam">
                                    Torna al login
                                </a>

                                <button type="submit" class="btn-steam">
                                    <i class="fas fa-paper-plane"></i> {{ __('Invia Link di Reset') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection