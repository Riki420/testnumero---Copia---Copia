@extends('layouts.dashboard');
@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <span class="fs-1"><b>Crea il tuo Piatto</b></span>
        <span class="p-4"><a href="{{route('admin.dashboard')}}" class="btn btn-danger"><i class="fas fa-arrow-left"></i></i></a></span>
    </div>
    <hr class="my-4">
    <!-- DISHES CARDS ON DASHBOARD -->

    <section>
        <form method="POST" action="{{ route('dishes.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome Piatto</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Inserisci il Nome del Piatto" required>
            </div>

            <div class="mb-3">
                <label for="desc" class="form-label">Descrizione</label>
                <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Inserisci il Prezzo del Piatto" required>
            </div>

            <div class="mb-3">
                <!-- Campo di input per l'immagine -->
                <input type="file" name="image" accept="image/*">
                
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <label for="category_id">Category:</label>
                    <select class="form-control" id="category_id" name="category_id">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="isActive" name="isActive" value="1" checked>
                <label class="form-check-label" for="isActive">Visibile</label>
            </div>

            <button type="submit" class="btn btn-primary">Crea Piatto</button>
        </form>
    </section>
</div>

@endsection