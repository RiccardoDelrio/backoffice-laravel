@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-4">
-        <div class="col-lg-8">
            <!-- Header con breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('videogames.index') }}">Games Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $videogame->title }}</li>
                </ol>
            </nav>

            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-0">
                                <i class="fas fa-gamepad me-2"></i>
                                Game Details
                            </h4>
                            <small class="opacity-75">Complete information about this game</small>
                        </div>
                        <div>
                            @if($videogame->is_beta)
                                <span class="badge bg-warning fs-6">BETA</span>
                            @else
                                <span class="badge bg-success fs-6">Released</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="row g-0">
                        <!-- Immagine del gioco -->
                        <div class="col-md-4">
                            <img src="{{ $videogame->image }}" class="img-fluid h-100 w-100" style="object-fit: cover;" alt="{{ $videogame->title }}">
                        </div>
                        
                        <!-- Dettagli del gioco -->
                        <div class="col-md-8">
                            <div class="p-4">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <h2 class="mb-0">{{ $videogame->title }}</h2>
                                    <span class="badge bg-success fs-5">{{ $videogame->price }}</span>
                                </div>

                                <p class="text-muted mb-4">{{ $videogame->description }}</p>

                                <div class="row mb-4">
                                    <div class="col-sm-6 mb-3">
                                        <h6 class="text-muted mb-1">Developer</h6>
                                        <p class="mb-0 fw-bold">{{ $videogame->developer }}</p>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <h6 class="text-muted mb-1">Release Year</h6>
                                        <p class="mb-0 fw-bold">{{ $videogame->release_year }}</p>
                                    </div>
                                    @if($videogame->genres->isNotEmpty())
                                    <div class="col-12 mb-3">
                                        <h6 class="text-muted mb-2">Genres</h6>
                                        @foreach($videogame->genres as $genre)
                                            <span class="badge bg-primary me-1">{{ $genre->name }}</span>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>

                                <!-- Azioni -->
                                <div class="d-flex gap-2 pt-3 border-top">
                                    <a href="{{ route('videogames.edit', $videogame->id) }}" class="btn btn-outline-secondary">
                                        <i class="fas fa-edit"></i> Edit Game
                                    </a>
                                    <form action="{{ route('videogames.destroy', $videogame->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this game?')">
                                            <i class="fas fa-trash"></i> Delete Game
                                        </button>
                                    </form>
                                    <a href="{{ route('videogames.index') }}" class="btn btn-outline-primary ms-auto">
                                        <i class="fas fa-arrow-left"></i> Back to Dashboard
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