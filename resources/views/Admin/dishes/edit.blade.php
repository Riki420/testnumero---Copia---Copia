@extends('layouts.dashboard')

@section('content')
<div class="container">
        <div class="col-md-8 offset-md-2">
        <div class="d-flex justify-content-between">
            <span class="fs-1"><b>Modifica il tuo Piatto</b></span>
            <span class="p-4"><a href="{{route('admin.dashboard')}}" class="btn btn-danger"><i class="fas fa-arrow-left"></i></a></span>
        </div>
        <hr class="my-4">
        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
         @endif
            
<section>
    <form method="POST" action="{{ route('dishes.update', $dish->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nome Piatto</label>
            <input type="text" class="form-control" id="name" name="name"value="{{ $dish->name }}" required>
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">Descrizione</label>
            <textarea class="form-control" id="desc" name="desc" rows="3">{{ $dish->desc }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image">Immagine del Piatto</label>
            <input type="file" class="form-control-file" id="image" name="image">
            @if ($dish->image_path)
                <img src="{{ asset($dish->image_path) }}" alt="Immagine del Piatto" width="50">
            @endif
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ $dish->price }}" required>
        </div>
        <div class="mb-3">
            <select name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="isActive" name="isActive" value="1" {{ $dish->isActive ? 'checked' : '' }}>
            <label class="form-check-label" for="isActive">Disponibile nel Menù</label>
        </div>
        <button type="submit" class="btn btn-primary">Aggiorna Piatto</button>
    </form>

</section>
        </div>
</div>
@endsection