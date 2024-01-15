@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="container mt-4">
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="card mb-4" style="max-width: 600px; margin: auto;">
                    <div class="card-header d-flex justify-content-between">
                       Editar libro
                    </div>
                    <div class="card-body">
                        <form action="{{ route('book.update', $book->id) }}" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Titulo  &nbsp;&nbsp;</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="title" value="{{ $book->title }}">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Autor  &nbsp;&nbsp;</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="author" value="{{ $book->author }}">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Año de publicación</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="publication_year" value="{{ $book->publication_year }}">
                            </div>
                            <div class="d-flex justify-content-end mt-3">
                                <button type="submit" class="btn btn-secondary">Actualizar Libro</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection