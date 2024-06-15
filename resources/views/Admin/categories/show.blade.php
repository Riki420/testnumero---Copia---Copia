@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex flex-wrap align-items-center px-2">
            <p class="text-center fs-1 my-5 flex-grow-1">{{ $category->name }}</p>         
            <span class="p-4"><a href="/" class="btn btn-danger"><i class="fas fa-arrow-left"></i></i></a></span>
        </div>
    </div>

<hr class="my-3">
@if($dishes->isEmpty())
    <p class="fs-4 my-5 text-center">Nessun piatto disponibile in questa categoria.</p>
@else
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-center my-5 flex-wrap">
                @foreach($dishes as $dish)
                <div class="card m-4" style="width: 18rem;">
                    <img class="card-img-top" src="{{asset($dish->image_path)}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><b>{{$dish->name}}</b></h5>
                        <hr class="my-1">
                        <p>{{$dish->desc}}</p>
                    </div>
                    <div class="card-footer text-center">
                        <div class="text-center w-100">
                            <span class="text-center">{{$dish->price}} €</span>
                        </div>
                    
                    </div>
                </div>
        
                @endforeach
            </div>
        </div>
    </div>
@endif

@endsection