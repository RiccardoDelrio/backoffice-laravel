@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col">
            <div class="card">
                <div class="card-header">Edit Game</div>

                <div class="card-body">
                    <form action="{{ route('videogames.update', $videogame->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">Game Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $videogame->title }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="genre" class="form-label">Genre</label>
                            <input type="text" class="form-control" id="genre" name="genre" value="{{ $videogame->genre }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="release_date" class="form-label
@endsection