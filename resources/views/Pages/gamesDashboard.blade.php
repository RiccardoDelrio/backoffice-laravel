@extends('layouts.master')

@section('title', 'Libreria Giochi - SteamLike')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <h1>🎮 La Tua Libreria</h1>
        <p class="lead">Gestisci la tua collezione di videogiochi e scopri nuovi titoli</p>
        <a href="{{ route('videogames.create') }}" class="btn-steam">Aggiungi Nuovo Gioco</a>
    </div>
</section>

<div class="container py-5">
    <!-- Stats Dashboard -->
    <div class="row mb-5">
        <div class="col-md-4 mb-3">
            <div class="stat-card">
                <span class="stat-number">{{ $videogames->count() }}</span>
                <div class="stat-label">Giochi Totali</div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="stat-card">
                <span class="stat-number">{{ $videogames->where('price', '>', 0)->count() }}</span>
                <div class="stat-label">Giochi a Pagamento</div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="stat-card">
                <span class="stat-number">{{ $videogames->where('price', 0)->count() }}</span>
                <div class="stat-label">Giochi Gratuiti</div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col">
            <div class="section-header">
                <h2>🎯 Dashboard Giochi</h2>
            </div>
            
            <div class="steam-card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-0">
                                <i class="fas fa-gamepad me-2"></i>
                                Gestione Collezione
                            </h4>
                            <small class="text-muted">Organizza e modifica i tuoi videogiochi</small>
                        </div>
                        <div>
                            <a href="{{ route('videogames.create') }}" class="btn-steam-secondary">
                                <i class="fas fa-plus"></i> Nuovo Gioco
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body p-0">
                    @if($videogames->isNotEmpty())
                        <div class="games-grid">
                            @foreach ($videogames as $videogame)
                                <div class="game-card">
                                    <img src="{{ asset('storage/'.$videogame->image) }}" class="game-image" alt="{{ $videogame->title }}">
                                    <div class="card-body">
                                        <h5 class="game-title">{{ $videogame->title }}</h5>
                                        <div class="game-meta mb-2">
                                            <span class="developer">{{ $videogame->developer }}</span> • 
                                            <span class="year">{{ $videogame->year }}</span>
                                        </div>
                                        <div class="game-price mb-3">
                                            @if($videogame->price > 0)
                                                €{{ number_format($videogame->price, 2) }}
                                            @else
                                                <span class="text-success">Gratuito</span>
                                            @endif
                                        </div>
                                        
                                        <div class="game-genres mb-3">
                                            @foreach ($videogame->genres as $genre)
                                                <span class="badge">{{ $genre->name }}</span>
                                            @endforeach
                                        </div>
                                        
                                        <div class="game-platforms mb-3">
                                            @foreach ($videogame->platforms as $platform)
                                                <span class="platform-badge">
                                                    <i class="fab fa-{{ strtolower($platform->name) }}"></i>
                                                    {{ $platform->name }}
                                                </span>
                                            @endforeach
                                        </div>
                                        
                                        <div class="game-actions">
                                            <a href="{{ route('videogames.show', $videogame->id) }}" class="btn-action primary">
                                                <i class="fas fa-eye"></i> Dettagli
                                            </a>
                                            <a href="{{ route('videogames.edit', $videogame->id) }}" class="btn-action secondary">
                                                <i class="fas fa-edit"></i> Modifica
                                            </a>
                                            <form method="POST" action="{{ route('videogames.destroy', $videogame->id) }}" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-action danger" onclick="return confirm('Sei sicuro di voler eliminare questo gioco?')">
                                                    <i class="fas fa-trash"></i> Elimina
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                    @else
                        <div class="empty-state">
                            <div class="empty-icon">
                                <i class="fas fa-gamepad"></i>
                            </div>
                            <h3>Nessun Gioco Trovato</h3>
                            <p>La tua libreria è vuota. Inizia aggiungendo il tuo primo videogioco!</p>
                            <a href="{{ route('videogames.create') }}" class="btn-steam">
                                <i class="fas fa-plus"></i> Aggiungi Primo Gioco
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection