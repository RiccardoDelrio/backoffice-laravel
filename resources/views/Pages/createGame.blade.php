@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-lg-8">
            <!-- Header con breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('videogames.index') }}">Games Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create New Game</li>
                </ol>
            </nav>

            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">
                        <i class="fas fa-plus me-2"></i>Create New Game
                    </h4>
                    <small class="opacity-75">Add a new game to your collection</small>
                </div>

                <div class="card-body">
                    <form action="{{ route('videogames.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <!-- Colonna sinistra -->
                            <div class="col-md-6">
                                <!-- Titolo -->
                                <div class="mb-3">
                                    <label for="title" class="form-label fw-semibold">
                                        <i class="fas fa-gamepad me-2 text-success"></i>Game Title
                                    </label>
                                    <input type="text" class="form-control" id="title" name="title" 
                                           value="{{ old('title') }}" 
                                           placeholder="Enter the game title" required>
                                    @error('title')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Developer -->
                                <div class="mb-3">
                                    <label for="developer" class="form-label fw-semibold">
                                        <i class="fas fa-code me-2 text-success"></i>Developer
                                    </label>
                                    <input type="text" class="form-control" id="developer" name="developer" 
                                           value="{{ old('developer') }}" 
                                           placeholder="Enter the developer name" required>
                                    @error('developer')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Anno di rilascio -->
                                <div class="mb-3">
                                    <label for="release_year" class="form-label fw-semibold">
                                        <i class="fas fa-calendar me-2 text-success"></i>Release Year
                                    </label>
                                    <input type="number" class="form-control" id="release_year" name="release_year" 
                                           value="{{ old('release_year') }}" 
                                           min="1970" max="{{ date('Y') + 5 }}" 
                                           placeholder="2024" required>
                                    @error('release_year')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Prezzo -->
                                <div class="mb-3">
                                    <label for="price" class="form-label fw-semibold">
                                        <i class="fas fa-dollar-sign me-2 text-success"></i>Price
                                    </label>
                                    <input type="text" class="form-control" id="price" name="price" 
                                           value="{{ old('price') }}" 
                                           placeholder="$19.99" required>
                                    @error('price')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Colonna destra -->
                            <div class="col-md-6">
                                <!-- Immagine -->
                                <div class="mb-3">
                                    <label for="image" class="form-label fw-semibold">
                                        <i class="fas fa-image me-2 text-success"></i>Image 
                                    </label>
                                    <input type="file" class="form-control" id="image" name="image" 
                                          required>                          
                                    <small class="form-text text-muted">
                                        Upload a valid image file for the game cover
                                    </small>
                                </div>

                                <!-- Status Beta -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">
                                        <i class="fas fa-flag me-2 text-success"></i>Game Status
                                    </label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="is_beta" name="is_beta" 
                                               value="1" {{ old('is_beta') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_beta">
                                            This game is in Beta version
                                        </label>
                                    </div>
                                    @error('is_beta')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Generi -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">
                                        <i class="fas fa-tags me-2 text-success"></i>Genres
                                    </label>
                                    <div class="row">
                                        @foreach ($genres as $genre)
                                            <div class="col-6 mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" 
                                                           value="{{ $genre->id }}" id="genre-{{ $genre->id }}"
                                                           name="genres[]" 
                                                           {{ (collect(old('genres', []))->contains($genre->id)) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="genre-{{ $genre->id }}">
                                                        {{ $genre->name }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('genres')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Descrizione - Full width -->
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-4">
                                    <label for="description" class="form-label fw-semibold">
                                        <i class="fas fa-align-left me-2 text-success"></i>Game Description
                                    </label>
                                    <textarea class="form-control" id="description" name="description" 
                                              rows="4" placeholder="Enter a detailed description of the game..." required>{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Pulsanti di azione -->
                        <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                            <a href="{{ route('videogames.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Cancel
                            </a>
                            <div>
                                <button type="reset" class="btn btn-outline-warning me-2">
                                    <i class="fas fa-undo me-2"></i>Reset Form
                                </button>
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-plus me-2"></i>Create Game
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
