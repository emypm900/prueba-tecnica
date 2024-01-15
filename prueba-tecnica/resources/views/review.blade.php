@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(Auth::user())
            <div class="d-flex justify-content-end mb-2">
                <a href="{{ route('review.create') }}" class="btn btn-secondary">Nueva Review</a>
            </div>
            @endif         
            <div class="container mt-4">
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
            @foreach($reviews as $review)
                <div class="card mb-4" style="max-width: 600px; margin: auto;">
                    <div class="card-header d-flex justify-content-between">
                        <h4>{{ $review->user->name . ' ' . $review->user->surname }}</h4>
                        @if(Auth::user())
                            @if($review->user->id == Auth::user()->id)
                            <div class="dropdown">
                                <button class="btn btn-secondary bg-transparent text-dark btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="{{ route('review.edit', ['id' => $review->id]) }}">Editar</a></li>
                                    <li><a class="dropdown-item" href="{{ route('review.destroy', ['id' => $review->id]) }}">Eliminar</a></li>
                                </ul>
                            </div>
                            @endif
                        @endif
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $review->title }}</h5>
                        <p class="card-text">{{ $review->review_text }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Rating: {{ $review->rating }}</li> <!-- agregar logica para que muestre estrellas dependiendo del rating -->
                    </ul>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection