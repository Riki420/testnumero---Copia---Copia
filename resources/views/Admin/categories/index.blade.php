@extends('layouts.dashboard');

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between flex-grow-1 flex-wrap">
            <h1 class="text-center mb-4"><b>Gestisci le tue Categorie</b></h1>
            <div class="d-flex">
                <span class="p-4"><a href="{{route('categories.create')}}" class="btn btn-secondary">Crea la Categoria</a></span>
                <span class="p-4"><a href="{{route('dishes.create')}}" class="btn btn-primary">Crea il tuo Piatto</a></span>

            </div>
        </div>
        <hr class="my-4">
        <div class="d-sm-flex flex wrapd-lg-flex justify-content-center flex-wrap">
            @foreach($categories as $category)
            <div class="d-flex flex-column border align-items-center">
                <div class="d-flex justify-content-between p-4">
                    <h5 class="card-title"><b>{{$category->name}}</b></h5>   
                    <div>
                        <!-- Pulsante Elimina -->
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline m-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mx-2 button-trigger"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                </div>
    
            </div>
            @if(session('warning'))
                <div class="alert alert-warning">
                    {{ session('warning') }}
                    <a href="{{ route('categories.create') }}" class="btn btn-primary">Crea una nuova categoria</a>
                </div>
            @endif
            @endforeach
        </div>
    </div>
@endsection