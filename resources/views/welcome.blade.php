@extends('layouts.master')

@section('title', 'Steam Game Store - Benvenuto')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <h1>Benvenuto nel tuo Game Store</h1>
        <p class="lead">Scopri migliaia di giochi incredibili, dalle ultime novità ai classici intramontabili</p>
        <a href="{{ route('videogames.index') }}" class="btn-steam">Esplora la Libreria</a>
    </div>
</section>

    <div class="container py-5">
        <!-- Quick Stats -->
        <div class="row mb-5">
            <div class="col-md-3 mb-3">
                <div class="stat-card">
                    <span class="stat-number">{{ $featuredGames->count() + $popularGames->count() }}</span>
                    <div class="stat-label">Giochi Disponibili</div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stat-card">
                    <span class="stat-number">{{ $genres->count() }}</span>
                    <div class="stat-label">Generi</div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stat-card">
                    <span class="stat-number">{{ $platforms->count() }}</span>
                    <div class="stat-label">Piattaforme</div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stat-card">
                    <span class="stat-number">{{ $newReleases->count() }}</span>
                    <div class="stat-label">Nuove Uscite</div>
                </div>
            </div>
        </div>

        <!-- Featured Games -->
        @if($featuredGames->count() > 0)
        <div class="section-header">
            <h2>🌟 Giochi in Evidenza</h2>
        </div>
        <div class="row mb-5">
            @foreach($featuredGames->take(3) as $game)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="game-card">
                    @if($game->image)
                        <img src="{{ asset('storage/' . $game->image) }}" alt="{{ $game->title }}" class="game-image">
                    @else
                        <div class="game-image d-flex align-items-center justify-content-center" style="background: linear-gradient(45deg, #2a475e, #1b2838);">
                            <span style="font-size: 3rem;">🎮</span>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="game-title">{{ $game->title }}</div>
                        <div class="game-meta">
                            {{ $game->developer }} • {{ $game->release_year }}
                            @if($game->is_beta)
                                <span class="badge bg-warning text-dark ms-2">BETA</span>
                            @endif
                        </div>
                        <div class="game-genres mb-3">
                            @foreach($game->genres as $genre)
                                <span class="badge">{{ $genre->name }}</span>
                            @endforeach
                        </div>
                        <div class="game-price">
                      
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        <div class="row">
            <!-- New Releases -->
            <div class="col-lg-8">
                @if($newReleases->count() > 0)
                <div class="section-header">
                    <h2>🚀 Nuove Uscite</h2>
                </div>
                <div class="row mb-4">
                    @foreach($newReleases as $game)
                    <div class="col-md-6 mb-3">
                        <div class="game-card">
                            @if($game->image)
                                <img src="{{ asset('storage/' . $game->image) }}" alt="{{ $game->title }}" class="game-image" style="height: 150px;">
                            @else
                                <div class="game-image d-flex align-items-center justify-content-center" style="height: 150px; background: linear-gradient(45deg, #2a475e, #1b2838);">
                                    <span style="font-size: 2rem;">🎮</span>
                                </div>
                            @endif
                            <div class="card-body">
                                <div class="game-title">{{ $game->title }}</div>
                                <div class="game-meta">{{ $game->release_year }}</div>
                                <div class="game-price">
                                    @if($game->price)
                                        €{{ number_format($game->price, 2) }}
                                    @else
                                        Gratuito
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif

                <!-- Popular Games Grid -->
                @if($popularGames->count() > 0)
                <div class="section-header">
                    <h2>🔥 Giochi Popolari</h2>
                </div>
                <div class="row">
                    @foreach($popularGames->take(4) as $game)
                    <div class="col-md-6 col-lg-3 mb-3">
                        <div class="game-card">
                            @if($game->image)
                                <img src="{{ asset('storage/' . $game->image) }}" alt="{{ $game->title }}" class="game-image" style="height: 120px;">
                            @else
                                <div class="game-image d-flex align-items-center justify-content-center" style="height: 120px; background: linear-gradient(45deg, #2a475e, #1b2838);">
                                    <span style="font-size: 1.5rem;">🎮</span>
                                </div>
                            @endif
                            <div class="card-body" style="padding: 1rem;">
                                <div class="game-title" style="font-size: 1rem;">{{ Str::limit($game->title, 20) }}</div>
                                <div class="game-price">
                                    @if($game->price)
                                        €{{ number_format($game->price, 2) }}
                                    @else
                                        Gratuito
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>

            <!-- Sidebar with Quick Links -->
            <div class="col-lg-4">
                <div class="section-header">
                    <h2>⚡ Collegamenti Rapidi</h2>
                </div>
                <div class="quick-links">
                    <a href="{{ route('videogames.index') }}" class="link-item">
                        <div class="link-icon">📚</div>
                        <div class="link-text">
                            <h5>Libreria Completa</h5>
                            <p>Esplora tutti i giochi disponibili</p>
                        </div>
                    </a>
                    
                    <a href="{{ route('videogames.create') }}" class="link-item">
                        <div class="link-icon">➕</div>
                        <div class="link-text">
                            <h5>Aggiungi Gioco</h5>
                            <p>Carica un nuovo gioco nel catalogo</p>
                        </div>
                    </a>
                    
                    @auth
                    <a href="{{ route('dashboard') }}" class="link-item">
                        <div class="link-icon">🎛️</div>
                        <div class="link-text">
                            <h5>Dashboard Admin</h5>
                            <p>Gestisci il tuo catalogo</p>
                        </div>
                    </a>
                    @endauth
                    
                    <div class="mt-4">
                        <div class="section-header">
                            <h2>🏷️ Generi Disponibili</h2>
                        </div>
                        <div class="d-flex flex-wrap">
                            @foreach($genres->take(8) as $genre)
                                <span class="badge me-2 mb-2" style="background: #2a475e; padding: 0.5rem 0.8rem; font-size: 0.8rem;">
                                    {{ $genre->name }}
                                </span>
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="section-header">
                            <h2>🕹️ Piattaforme</h2>
                        </div>
                        <div class="d-flex flex-wrap">
                            @foreach($platforms->take(6) as $platform)
                                <span class="badge me-2 mb-2" style="background: #90ba3c; padding: 0.5rem 0.8rem; font-size: 0.8rem;">
                                    {{ $platform->name }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection