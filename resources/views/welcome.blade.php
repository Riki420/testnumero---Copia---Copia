@extends('layouts.app')
@section('content')
<section>
<div class="d-flex flex-column justify-content-between">
    <div class="container flex-grow-1">
        <p class="fs-2 text-center my-5">Esplora il Nostro Menù</p>
        <hr class="my-2">
        <div class="d-flex justify-content-center flex-column align-items-center my-5">
            @foreach($categories as $category)
            <div>
                <a href="{{route('categories.show', $category->id)}}" class="btn btn-info my-4 btn-lg "><strong>{{ $category->name }}</strong></a>
            </div>
            @endforeach
        </div>
    </div>
    
    
    <footer class="mt-5 w-100 text-white bg-danger text-center p-5">
      <div class=mb-3>
        <div class="card-header"><strong>Locanda del Pellegrino</strong></div>
        <hr class="my-2">
        <div class="card-body">
          <p class="card-text">
              Indirizzo Azienda<br>
              Altre Informazioni<br>
          </p>
          <img src="percorso/al/tuo/logo.png" alt="Logo" class="rounded-circle mx-auto d-block" style="width:50px;">
        </div>
      </div>
    </footer>
</div>
</section>
@endsection