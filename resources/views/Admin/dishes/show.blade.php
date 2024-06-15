@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
            <span class="fs-1"><b>Crea il tuo Piatto</b></span>
            <span class="p-4"><a href="{{ route('admin.dashboard') }}" class="btn btn-danger"><i class="fas fa-arrow-left"></i></a></span>
    </div> 
    <hr class="my-4">       
    <div class="container">

        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset($dish->image_path) }}" class="card-img-top" alt="{{ $dish->name }}">

            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <span class="fs-1"><strong>{{ $dish->name }}</strong></span>
                    <p class="card-text"><strong>Descrizione:</strong> {{ $dish->desc }}</p>
                    <p class="card-text"><strong>Categorie:</strong> 
                        @foreach ($categories as $category)
                            {{ $category->id }},
                        @endforeach
                    </p>
                    <p class="card-text"><strong>Prezzo:</strong> {{ $dish->price }} €</p>
                    <p class="card-text"><strong>Disponibile nel Menù::</strong> {{ $dish->isActive ? 'Sì' : 'No' }}</p>
                    <a href="{{ route('dishes.edit', $dish->id) }}" class="btn btn-warning"><i class="fas fa-pencil-alt"></i> Modifica</a>
                    <form action="{{ route('dishes.destroy', $dish->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Elimina</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
   
</div>
@endsection
