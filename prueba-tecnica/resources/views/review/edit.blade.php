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
                       Crear nueva review
                    </div>
                    <div class="card-body">
                        <form action="{{ route('review.update', $review->id) }}" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupSelect">Libro &nbsp;&nbsp;&nbsp;</label>
                                    <select class="form-select" id="inputGroupSelect" name="book_id">
                                    @foreach($books as $book)
                                        <option value="{{ $book->id }}" {{ $book->id == $review->book_id ? 'selected' : '' }}>{{ $book->title }}</option>
                                    @endforeach
                                    </select>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Titulo  &nbsp;&nbsp;</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="title" value="{{ $review->title }}">
                            </div>
                            <div class="input-group">
                                <span class="input-group-text">Reseña</span>
                                <textarea class="form-control" aria-label="Reseña" name="review_text">{{ $review->review_text }}</textarea>
                            </div>
                            <div class="input-group mt-3">
                                <label class="input-group-text" for="inputGroupSelect01">Rating &nbsp;</label>
                                <select class="form-select" id="inputGroupSelect01" name="rating">
                                    @foreach([1, 2, 3, 4, 5] as $ratingValue)
                                        <option value="{{ $ratingValue }}" {{ $review->rating == $ratingValue ? 'selected' : '' }}>
                                            @for ($i = 0; $i < $ratingValue; $i++)
                                                ★
                                            @endfor
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-flex justify-content-end mt-3">
                                <button type="submit" class="btn btn-secondary">Actualizar Review</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection