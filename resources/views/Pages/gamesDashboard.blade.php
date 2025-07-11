@extends('layouts.master')
@section('content')

<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-0">
                                <i class="fas fa-gamepad me-2"></i>
                                Games Dashboard
                            </h4>
                            <small class="opacity-75">Manage your game collection</small>
                        </div>
                        <div>
                            <a href="{{ route('videogames.create') }}" class="btn btn-light btn-sm">
                                <i class="fas fa-plus"></i> Add New Game
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body p-0">
                    @if($videogames->isNotEmpty())
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="border-0 ps-4">Game</th>
                                        <th class="border-0">Developer</th>
                                        <th class="border-0">Year</th>
                                        <th class="border-0">Price</th>
                                        <th class="border-0">Status</th>
                                        <th class="border-0 text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($videogames as $videogame)
                                        <tr>
                                            <td class="ps-4">
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset('storage/'.$videogame->image) }}" class="rounded me-3" width="50" height="50" style="object-fit: cover;" alt="{{ $videogame->title }}">
                                                    <div>
                                                        <h6 class="mb-0 fw-bold">{{ $videogame->title }}</h6>
                                                        <small class="text-muted">{{ Str::limit($videogame->description, 60) }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <span class="text-dark">{{ $videogame->developer }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <span class="badge bg-primary">{{ $videogame->release_year }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <span class="badge bg-success">{{ $videogame->price }}</span>
                                            </td>
                                            <td class="align-middle">
                                                @if($videogame->is_beta)
                                                    <span class="badge bg-warning">BETA</span>
                                                @else
                                                    <span class="badge bg-success">Released</span>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('videogames.show', $videogame->id) }}" class="btn btn-outline-primary btn-sm" title="View Details">
                                                        <i class="fas fa-eye"></i> View
                                                    </a>
                                                    <a href="{{ route('videogames.edit', $videogame->id) }}" class="btn btn-outline-secondary btn-sm" title="Edit">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                </div>
                                                <form action="{{ route('videogames.destroy', $videogame->id) }}" method="POST" class="d-inline ms-1">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm" title="Delete" onclick="return confirm('Are you sure you want to delete this game?')">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-gamepad fa-3x text-muted mb-3"></i>
                            <h4 class="text-muted">No games found</h4>
                            <p class="text-muted">Start by adding your first game to the collection!</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection