@extends('layouts.master')

@section('title', $videogame->title . ' - SteamLike')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <h1>🎮 {{ $videogame->title }}</h1>
        <p class="lead">{{ Str::limit($videogame->description, 100) }}</p>
        <div class="d-flex gap-3 align-items-center">
            @if($videogame->price > 0)
                <span class="game-price fs-4">€{{ number_format($videogame->price, 2) }}</span>
            @else
                <span class="game-price fs-4 text-success">Gratuito</span>
            @endif
            @if($videogame->is_beta)
                <span class="badge badge-steam bg-warning">BETA</span>
            @else
                <span class="badge badge-steam bg-success">Rilasciato</span>
            @endif
        </div>
    </div>
</section>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Steam Breadcrumb -->
            <nav aria-label="breadcrumb" class="steam-breadcrumb mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('videogames.index') }}">Libreria Giochi</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $videogame->title }}</li>
                </ol>
            </nav>

            <div class="steam-card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-0">
                                <i class="fas fa-info-circle me-2"></i>
                                Dettagli del Gioco
                            </h4>
                            <small class="text-muted">Informazioni complete su questo videogioco</small>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="{{ route('videogames.edit', $videogame->id) }}" class="btn-action primary">
                                <i class="fas fa-edit"></i> Modifica
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="row g-0">
                        <!-- Immagine del gioco -->
                        <div class="col-md-5">
                            <div class="game-image-container">
                                <img src="{{ asset('storage/'.$videogame->image) }}" class="game-detail-image" alt="{{ $videogame->title }}">
                            </div>
                        </div>
                        
                        <!-- Dettagli del gioco -->
                        <div class="col-md-7">
                            <div class="p-4">
                                <div class="game-info">
                                    <h2 class="game-title-detail">{{ $videogame->title }}</h2>
                                </div>

                                <div class="game-metadata">
                                    <div class="row mb-4">
                                        <div class="col-sm-6 mb-3">
                                            <div class="info-box">
                                                <h6 class="info-label">Sviluppatore</h6>
                                                <p class="info-value">{{ $videogame->developer }}</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <div class="info-box">
                                                <h6 class="info-label">Anno di Rilascio</h6>
                                                <p class="info-value">{{ $videogame->release_year }}</p>
                                            </div>
                                        </div>
                                        @if($videogame->genres->isNotEmpty())
                                        <div class="col-12 mb-3">
                                            <div class="info-box">
                                                <h6 class="info-label">Generi</h6>
                                                <div class="game-genres">
                                                    @foreach($videogame->genres as $genre)
                                                        <span class="badge">{{ $genre->name }}</span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @if($videogame->platforms->isNotEmpty())
                                        <div class="col-12 mb-3">
                                            <div class="info-box">
                                                <h6 class="info-label">Piattaforme</h6>
                                                <div class="game-platforms">
                                                    @foreach($videogame->platforms as $platform)
                                                        <span class="platform-badge">
                                                            <i class="fab fa-{{ strtolower($platform->name) }}"></i>
                                                            {{ $platform->name }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Azioni -->
                                <div class="game-actions-detail">
                                    <a href="{{ route('videogames.edit', $videogame->id) }}" class="btn-action primary">
                                        <i class="fas fa-edit"></i> Modifica Gioco
                                    </a>
                                    <form action="{{ route('videogames.destroy', $videogame->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action danger" onclick="return confirm('Sei sicuro di voler eliminare questo gioco?')">
                                            <i class="fas fa-trash"></i> Elimina Gioco
                                        </button>
                                    </form>
                                    <a href="{{ route('videogames.index') }}" class="btn-action secondary">
                                        <i class="fas fa-arrow-left"></i> Torna alla Libreria
                                    </a>
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