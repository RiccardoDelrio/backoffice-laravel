
@extends('layouts.master')

@section('title', 'Steam Game Store - Admin Panel')

@section('content')
<div class="welcome-page-wrapper">
<!-- Hero Section with Steam aesthetic -->
<div class="steam-header">
    <div class="steam-particles"></div>
    <div class="container text-center position-relative">
        <img src="{{ asset('Steam.png') }}" alt="Steam" class="mb-3">
        <h1 class="text-white mb-3">
            Steam Admin Panel
        </h1>
        <p class="text-white-50 mb-0">
            Gestisci il tuo catalogo videogiochi con un'interfaccia moderna e intuitiva
        </p>
    </div>
</div>

<!-- Main Navigation Cards -->
<div class="container steam-nav-container">
    <div class="row g-4">
        <!-- Videogames Management -->
        <div class="col-md-6 col-lg-4">
            <a href="{{ route('videogames.index') }}" class="text-decoration-none">
                <div class="steam-nav-card">
                    <div class="steam-nav-card-inner">
                        <div class="steam-nav-icon">
                            <i class="fas fa-gamepad"></i>
                        </div>
                        <h3>Videogiochi</h3>
                        <p>Gestione completa del catalogo</p>
                        <div class="steam-nav-arrow">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Add New Game -->
        <div class="col-md-6 col-lg-4">
            <a href="{{ route('videogames.create') }}" class="text-decoration-none">
                <div class="steam-nav-card steam-nav-card-highlight">
                    <div class="steam-nav-card-inner">
                        <div class="steam-nav-icon">
                            <i class="fas fa-plus"></i>
                        </div>
                        <h3>Nuovo Gioco</h3>
                        <p>Aggiungi titolo al catalogo</p>
                        <div class="steam-nav-arrow">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Dashboard -->
        <div class="col-md-6 col-lg-4">
            <a href="{{ route('dashboard') }}" class="text-decoration-none">
                <div class="steam-nav-card">
                    <div class="steam-nav-card-inner">
                        <div class="steam-nav-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3>Dashboard</h3>
                        <p>Statistiche e panoramica</p>
                        <div class="steam-nav-arrow">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-12">
            <div class="steam-info-panel">
                <div class="text-center mb-4">
                    <h3 class="steam-section-title">
                        <i class="fas fa-cogs me-2"></i>
                        Funzionalità del Sistema
                    </h3>
                    <p class="steam-subtitle">Strumenti avanzati per la gestione completa del catalogo</p>
                </div>
                
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6">
                        <div class="steam-feature-card">
                            <div class="steam-feature-icon">
                                <i class="fas fa-gamepad"></i>
                            </div>
                            <h5>Gestione Videogiochi</h5>
                            <p>Sistema completo per aggiungere, modificare, eliminare e visualizzare tutti i videogiochi del catalogo</p>
                            <div class="steam-feature-stats">
                                <small><i class="fas fa-check-circle text-success me-1"></i>Operazioni complete</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="steam-feature-card">
                            <div class="steam-feature-icon">
                                <i class="fas fa-tags"></i>
                            </div>
                            <h5>Classificazione Generi</h5>
                            <p>Organizza i giochi per categorie e generi, creando un sistema di classificazione intuitivo e navigabile</p>
                            <div class="steam-feature-stats">
                                <small><i class="fas fa-layer-group text-info me-1"></i>Categorizzazione avanzata</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="steam-feature-card">
                            <div class="steam-feature-icon">
                                <i class="fas fa-desktop"></i>
                            </div>
                            <h5>Multi-Piattaforma</h5>
                            <p>Supporto per diverse piattaforme gaming: PC, PlayStation, Xbox, Nintendo Switch e piattaforme mobile</p>
                            <div class="steam-feature-stats">
                                <small><i class="fas fa-globe text-primary me-1"></i>Compatibilità estesa</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="steam-feature-card">
                            <div class="steam-feature-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <h5>Dashboard Analytics</h5>
                            <p>Monitora statistiche, tendenze e performance del catalogo con grafici e report dettagliati in tempo reale</p>
                            <div class="steam-feature-stats">
                                <small><i class="fas fa-analytics text-warning me-1"></i>Insights in tempo reale</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection