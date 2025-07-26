@extends('layouts.master')

@section('title', 'Modifica Gioco - SteamLike')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <h1>✏️ Modifica Gioco</h1>
        <p class="lead">Aggiorna le informazioni di "{{ $videogame->title }}"</p>
    </div>
</section>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <nav aria-label="breadcrumb" class="steam-breadcrumb mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('videogames.index') }}">Libreria Giochi</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('videogames.show', $videogame->id) }}">{{ $videogame->title }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Modifica</li>
                </ol>
            </nav>

            <div class="steam-card">
                <div class="card-header">
                    <h4 class="mb-0">
                        <i class="fas fa-edit me-2"></i>Modifica Gioco
                    </h4>
                    <small class="text-muted">Aggiorna le informazioni del videogioco</small>
                </div>

                <div class="card-body">
                    <form action="{{ route('videogames.update', $videogame) }}" method="POST" enctype="multipart/form-data" class="steam-form">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Colonna sinistra -->
                            <div class="col-md-6">
                                <!-- Titolo -->
                                <div class="form-group">
                                    <label for="title" class="form-label">
                                        <i class="fas fa-gamepad"></i>Titolo del Gioco
                                    </label>
                                    <input type="text" class="form-control" id="title" name="title" 
                                           value="{{ old('title', $videogame->title) }}" 
                                           placeholder="Inserisci il titolo del gioco" required>
                                    @error('title')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Developer -->
                                <div class="form-group">
                                    <label for="developer" class="form-label">
                                        <i class="fas fa-code"></i>Sviluppatore
                                    </label>
                                    <input type="text" class="form-control" id="developer" name="developer" 
                                           value="{{ old('developer', $videogame->developer) }}" 
                                           placeholder="Nome dello sviluppatore" required>
                                    @error('developer')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Anno di rilascio -->
                                <div class="form-group">
                                    <label for="release_year" class="form-label">
                                        <i class="fas fa-calendar"></i>Anno di Rilascio
                                    </label>
                                    <input type="number" class="form-control" id="release_year" name="release_year" 
                                           value="{{ old('release_year', $videogame->release_year) }}" 
                                           min="1970" max="{{ date('Y') + 5 }}" 
                                           placeholder="2024" required>
                                    @error('release_year')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Prezzo -->
                                <div class="form-group">
                                    <label for="price" class="form-label">
                                        <i class="fas fa-euro-sign"></i>Prezzo (€)
                                    </label>
                                    <input type="text" class="form-control" id="price" name="price" 
                                           value="{{ old('price', $videogame->price) }}" 
                                           placeholder="19.99" required>
                                    <small class="form-text">Inserisci 0 per giochi gratuiti</small>
                                    @error('price')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Colonna destra -->
                            <div class="col-md-6">
                                <!-- Immagine -->
                                <div class="form-group">
                                    <label for="image" class="form-label">
                                        <i class="fas fa-image"></i>Immagine di Copertina
                                    </label>
                                    
                                    <!-- Anteprima immagine corrente -->
                                    @if($videogame->image)
                                        <div class="current-image-preview mb-3">
                                            <p class="mb-2 text-muted">Immagine attuale:</p>
                                            <img src="{{ asset('storage/'.$videogame->image) }}" class="img-thumbnail current-game-image" 
                                                 alt="{{ $videogame->title }}">
                                        </div>
                                    @endif
                                    
                                    <input type="file" class="form-control" id="image" name="image" accept="image/*">                          
                                    <small class="form-text">
                                        Carica una nuova immagine per sostituire quella attuale, oppure lascia vuoto per mantenerla
                                    </small>
                                    @error('image')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Status Beta -->
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-flag"></i>Stato del Gioco
                                    </label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="is_beta" name="is_beta" 
                                               value="1" {{ old('is_beta', $videogame->is_beta) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_beta">
                                            Questo gioco è in versione Beta
                                        </label>
                                    </div>
                                    @error('is_beta')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Generi -->
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-tags"></i>Generi
                                    </label>
                                    <div class="row">
                                        @foreach ($genres as $genre)
                                            <div class="col-6 mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" 
                                                           value="{{ $genre->id }}" id="genre-{{ $genre->id }}"
                                                           name="genres[]" 
                                                           {{ (collect(old('genres', $videogame->genres->pluck('id')))->contains($genre->id)) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="genre-{{ $genre->id }}">
                                                        {{ $genre->name }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('genres')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Piattaforme -->
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="fas fa-desktop"></i>Piattaforme
                                    </label>
                                    <div class="row">
                                        @foreach ($platforms as $platform)
                                            <div class="col-6 mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" 
                                                           value="{{ $platform->id }}" id="platform-{{ $platform->id }}"
                                                           name="platforms[]" 
                                                           {{ (collect(old('platforms', $videogame->platforms->pluck('id')))->contains($platform->id)) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="platform-{{ $platform->id }}">
                                                        {{ $platform->name }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('platforms')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Descrizione - Full width -->
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="description" class="form-label">
                                        <i class="fas fa-align-left"></i>Descrizione del Gioco
                                    </label>
                                    <textarea class="form-control" id="description" name="description" 
                                              rows="4" placeholder="Inserisci una descrizione dettagliata del gioco..." required>{{ old('description', $videogame->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Pulsanti di azione -->
                        <div class="d-flex justify-content-between align-items-center pt-4 mt-4" style="border-top: 1px solid #2a475e;">
                            <a href="{{ route('videogames.show', $videogame->id) }}" class="btn-action secondary">
                                <i class="fas fa-arrow-left"></i> Annulla
                            </a>
                            <div class="d-flex gap-3">
                                <button type="reset" class="btn-action danger">
                                    <i class="fas fa-undo"></i> Reset
                                </button>
                                <button type="submit" class="btn-steam">
                                    <i class="fas fa-save"></i> Aggiorna Gioco
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection