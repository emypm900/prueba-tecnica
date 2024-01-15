@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @if(Auth::user())
            <div class="d-flex justify-content-end mb-2">
                <a href="{{ route('book.create') }}" class="btn btn-secondary">Nuevo Libro</a>
            </div>
        @endif         
            <div class="container mt-4">
                <form action="{{ route('books.search') }}" method="GET" class="mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" name="search" class="form-control" placeholder="Buscar libros">
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-secondary">Buscar</button>
                        </div>
                    </div>
                </form>
        @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
        @endif
        @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
        @endif         
            <div class="container mt-4">
            <table class="table">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Autor</th>
                            <th>Año de Publicacion</th>
                        @if(Auth::user())
                        @if($books->contains('user_id', Auth::user()->id))
                            <th>Acciones</th>
                        @endif
                        @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $book)
                            <tr>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->publication_year }}</td>
                            @if(Auth::user())
                            @if($book->user_id == Auth::user()->id)
                                <td>
                                    <div class="d-grid gap-2 d-md-block">    
                                        <a type="button" class="btn btn-secondary btn-sm" href="{{ route('book.edit', ['id' => $book->id]) }}">Editar</a>
                                        <a type="button" class="btn btn-danger btn-sm" href="{{ route('book.destroy', ['id' => $book->id]) }}">Eliminar</a>
                                    </div>
                                </td>
                            @endif
                            @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection