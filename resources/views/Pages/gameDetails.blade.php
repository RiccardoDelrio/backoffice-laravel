@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col">
            <div class="card">
                <div class="card-header">Game Details</div>

                <div class="card-body">
                    <h5>{{ $videogame->title }}</h5>
                    <p><strong>Genre:</strong> {{ $videogame->genre }}</p>
                    <p><strong>Release Date:</strong> {{ $videogame->release_date }}</p>
                    <a href="{{ route('videogames.edit', $videogame->id) }}" class="btn btn-secondary">Edit</a>
                    <form action="{{ route('videogames.destroy', $videogame->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection