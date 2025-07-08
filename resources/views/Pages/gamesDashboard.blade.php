@extends('layouts.master')
@section('content')

<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col">
            <div class="card">
                <div class="card-header">Games Dashboard</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Game Title</th>
                                <th>Genre</th>
                                <th>Release Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($videogames as $videogame)
                                <tr>
                                    <td>{{ $videogame->title }}</td>
                                    <td>{{ $videogame->genre }}</td>
                                    <td>{{ $videogame->release_date }}</td>
                                    <td><a href="{{ route('videogames.show', $videogame->id) }}" class="btn btn-primary">View Details</a></td>
                                    <td><a href="{{ route('videogames.edit', $videogame->id) }}" class="btn btn-secondary">Edit</a></td>
                                    <td>
                                        <form action="{{ route('videogames.destroy', $videogame->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection