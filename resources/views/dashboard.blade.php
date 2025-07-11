@extends('layouts.master')

@section('title', 'Dashboard Utente - SteamLike')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <h1>🎯 Dashboard Utente</h1>
        <p class="lead">Benvenuto nella tua area personale, {{ Auth::user()->name }}</p>
        <a href="{{ route('videogames.index') }}" class="btn-steam">Vai alla Libreria</a>
    </div>
</section>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col">
            <div class="section-header">
                <h2>🎮 Il Tuo Hub di Controllo</h2>
            </div>
            
            <div class="steam-card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-0">
                                <i class="fas fa-user me-2"></i>Dashboard Personale
                            </h4>
                            <small class="text-muted">Gestisci il tuo account e le tue preferenze</small>
                        </div>
                        <div class="user-avatar">
                            <i class="fas fa-user-circle fa-2x"></i>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success steam-alert" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="welcome-message">
                        <h3>Sei connesso con successo!</h3>
                        <p>Dalla tua dashboard puoi accedere a tutte le funzionalità della piattaforma.</p>
                    </div>

                    <!-- Quick Links -->
                    <div class="quick-links mt-4">
                        <h5 class="mb-3">⚡ Azioni Rapide</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <a href="{{ route('videogames.index') }}" class="link-item">
                                    <div class="link-icon">
                                        <i class="fas fa-gamepad"></i>
                                    </div>
                                    <div class="link-text">
                                        <h5>Libreria Giochi</h5>
                                        <p>Visualizza e gestisci la tua collezione</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6 mb-3">
                                <a href="{{ route('videogames.create') }}" class="link-item">
                                    <div class="link-icon">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                    <div class="link-text">
                                        <h5>Aggiungi Gioco</h5>
                                        <p>Inserisci un nuovo videogioco</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6 mb-3">
                                <a href="{{ route('profile.edit') }}" class="link-item">
                                    <div class="link-icon">
                                        <i class="fas fa-user-cog"></i>
                                    </div>
                                    <div class="link-text">
                                        <h5>Profilo</h5>
                                        <p>Modifica le tue informazioni</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6 mb-3">
                                <a href="{{ route('home') }}" class="link-item">
                                    <div class="link-icon">
                                        <i class="fas fa-home"></i>
                                    </div>
                                    <div class="link-text">
                                        <h5>Store</h5>
                                        <p>Torna alla home page</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
