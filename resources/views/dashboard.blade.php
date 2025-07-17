@extends('layouts.master')

@section('title', 'Dashboard Utente - SteamLike')

@php
    use App\Models\Videogame;
    use App\Models\Genre;
    use App\Models\Platform;
@endphp

@section('content')
    <!-- Dashboard Hero -->
    <section class="dashboard-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="hero-content">
                        <h1>🎮 Benvenuto, {{ Auth::user()->name }}!</h1>
                        <p class="lead">Gestisci la tua libreria di giochi e scopri nuovi titoli</p>
                        <div class="hero-stats">
                            <div class="stat-item">
                                <i class="fas fa-gamepad"></i>
                                <span>{{ Videogame::count() }} Giochi</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-clock"></i>
                                <span>Ultimo accesso: {{ now()->format('d/m/Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-end">
                    <div class="user-avatar-large">
                        <i class="fas fa-user-circle"></i>
                        <div class="status-indicator"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Dashboard Content -->
    <div class="container-fluid dashboard-content">
        <div class="row">
            <!-- Quick Actions Sidebar -->
            <div class="col-lg-3 col-md-4 mb-4">
                <div class="dashboard-sidebar">
                    <h4 class="sidebar-title">
                        <i class="fas fa-bolt me-2"></i>Azioni Rapide
                    </h4>

                    <div class="quick-actions">
                        <a href="{{ route('videogames.create') }}" class="action-card primary">
                            <div class="action-icon">
                                <i class="fas fa-plus-circle"></i>
                            </div>
                            <div class="action-content">
                                <h5>Aggiungi Gioco</h5>
                                <p>Inserisci un nuovo videogame</p>
                            </div>
                            <div class="action-arrow">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </a>

                        <a href="{{ route('videogames.index') }}" class="action-card secondary">
                            <div class="action-icon">
                                <i class="fas fa-gamepad"></i>
                            </div>
                            <div class="action-content">
                                <h5>La Mia Libreria</h5>
                                <p>Gestisci i tuoi giochi</p>
                            </div>
                            <div class="action-arrow">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </a>

                        <a href="{{ route('profile.edit') }}" class="action-card tertiary">
                            <div class="action-icon">
                                <i class="fas fa-user-cog"></i>
                            </div>
                            <div class="action-content">
                                <h5>Il Mio Profilo</h5>
                                <p>Modifica impostazioni</p>
                            </div>
                            <div class="action-arrow">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </a>

                        <a href="{{ route('home') }}" class="action-card info">
                            <div class="action-icon">
                                <i class="fas fa-store"></i>
                            </div>
                            <div class="action-content">
                                <h5>Store</h5>
                                <p>Esplora nuovi giochi</p>
                            </div>
                            <div class="action-arrow">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="col-lg-9 col-md-8">
                @if (session('status'))
                    <div class="alert steam-alert alert-success mb-4" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Statistics Cards -->
                <div class="row mb-4">
                    <div class="col-md-4 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-gamepad"></i>
                            </div>
                            <div class="stat-info">
                                <h3>{{ Videogame::count() }}</h3>
                                <p>Giochi Totali</p>
                            </div>
                            <div class="stat-trend positive">
                                <i class="fas fa-arrow-up"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon genre">
                                <i class="fas fa-tags"></i>
                            </div>
                            <div class="stat-info">
                                <h3>{{ Genre::count() }}</h3>
                                <p>Generi Disponibili</p>
                            </div>
                            <div class="stat-trend positive">
                                <i class="fas fa-arrow-up"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="stat-card">
                            <div class="stat-icon platform">
                                <i class="fas fa-desktop"></i>
                            </div>
                            <div class="stat-info">
                                <h3>{{ Platform::count() }}</h3>
                                <p>Piattaforme</p>
                            </div>
                            <div class="stat-trend positive">
                                <i class="fas fa-arrow-up"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="activity-section">
                    <div class="steam-card">
                        <div class="card-header">
                            <h4 class="mb-0">
                                <i class="fas fa-history me-2"></i>Attività Recente
                            </h4>
                            <small class="text-muted">Le tue azioni più recenti sulla piattaforma</small>
                        </div>
                        <div class="card-body">
                            <div class="activity-timeline">
                                <div class="timeline-item">
                                    <div class="timeline-icon">
                                        <i class="fas fa-sign-in-alt"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <h6>Accesso effettuato</h6>
                                        <p>Hai effettuato l'accesso alla dashboard</p>
                                        <small class="text-muted">{{ now()->format('d/m/Y H:i') }}</small>
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <div class="timeline-icon">
                                        <i class="fas fa-user-check"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <h6>Account verificato</h6>
                                        <p>Il tuo account è attivo e verificato</p>
                                        <small class="text-muted">Account attivo</small>
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