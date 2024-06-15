@extends('layouts.dashboard')
@section('content')
<div class="container">

    <!--
    <div class="d-flex justify-content-between flex-grow-1 flex-wrap">
        <h1 class="text-center mb-4"><b>SCEGLI I PIATTI DEL MENU</b></h1>
        <div class="d-flex">
            <span class="p-4"><a href="{{route('categories.create')}}" class="btn btn-secondary">Crea la Categoria</a></span>
            <span class="p-4"><a href="{{route('dishes.create')}}" class="btn btn-primary">Crea il tuo Piatto</a></span>

            <div class="col-auto">
                <select name="category_id" id="category_id" class="form-control mb-2 mr-sm-2">
                    <option value="">Tutte le Categorie</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </div>
    -->

    <div class="d-flex justify-content-between flex-grow-1 flex-wrap align-items-center">
        <h1 class="text-center mb-4"><b>{{__('messages.dashboardtitle')}}</b></h1>
        <div class="d-flex align-items-center flex-wrap">
            <div class="d-flex">
                <span class="p-4"><a href="{{route('categories.create')}}" class="btn btn-secondary">Crea la Categoria</a></span>
                <span class="p-4"><a href="{{route('dishes.create')}}" class="btn btn-primary">Crea il tuo Piatto</a></span>
            </div>

            <div class="d-flex justify-content-xs-center flex-grow-1 ">
                <form method="POST" action="{{ route('admin.dashboard') }}" class="form-inline mb-2 d-flex">
                    @csrf
                    <div class="d-flex justify-content-xs-center flex-grow-1">
                        <select name="category_id" id="category_id" class="form-control mb-2 mr-sm-2">
                            <option value="">Tutte le Categorie</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Filtra</button>
                </form>

            </div>
        </div>
    </div>


    <hr class="my-4">
    <!-- DISHES CARDS ON DASHBOARD -->
    <div class="container">
        <div class="row">
        </div>
    </div>
    @if($dishes->isEmpty())
        <p class="fs-3 text-center text-danger"><strong>{{$selectedCategoryName}}</strong></p>
        <hr class="my-2">
        <p class="fs-3">Nessun piatto disponibile.</p>
    @else
    <p class="fs-3 text-center text-danger"><strong>{{$selectedCategoryName}}</strong></p>
    <hr class="my-2">

    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-center my-5 flex-wrap">
                @foreach($dishes as $dish)
            
                <div class="card m-4" style="width: 18rem;">
                    
                    <a href="{{ route('dishes.show', $dish->id)}}"><img class="card-img-top" src="{{ asset($dish->image_path) }}" alt="Card image cap"></a>
                    
                    <div class="card-body">
                        <h5 class="card-title text-center"><b>{{$dish->name}}</b></h5>
                    </div>
                    <div class="card-footer d-flex justify-content-around">
                        <div>
                            <a href="{{route('dishes.edit', $dish->id)}}" class="btn btn-warning"><i class="fas fa-pencil"></i></a>
                        </div>
                        <div>
                            <!--Gestire isActive-->
                            <form method="POST" action="{{ route('dishes.update', $dish->id) }}" class="formToggle">
                                @method('PATCH')
                                @csrf
                                <div class="switch">
                                    <input type="checkbox" class="visibilityToggle" {{ $dish->isActive ? 'checked' : '' }}>
                                    <input type="hidden" name="isActive" class="customHidden" value="{{ $dish->isActive ? 1 : 0 }}">
                                    <label><i></i></label>
                                    <span></span>
                                </div>
                            </form>
                        </div>
                        <div>
                            <!-- Pulsante Elimina -->
                            <form action="{{ route('dishes.destroy', $dish->id) }}" method="POST" class="d-inline m-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mx-2 button-trigger"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    @endif





    </div>
</div>
<script>
    const forms = document.querySelectorAll('.formToggle');

    forms.forEach(function(form) {
        form.addEventListener('change', function(event) {
            const hiddens = document.querySelectorAll('.customHidden');
            hiddens.forEach(function(hidden) {
                if (hidden.value == 1) {
                    hidden.value = 0;
                } else {
                    hidden.value = 1;
                }
                form.submit();
            })
        });
    });
</script>
@endsection