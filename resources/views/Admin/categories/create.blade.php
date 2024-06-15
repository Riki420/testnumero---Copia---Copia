@extends('layouts.dashboard')
@section('content')
<section class="d-flex justify-content-center w-100">
    <div>
        <form method="POST" action="{{ route('categories.store') }}">
        @csrf
            <div class="mb-3">
                <label for="name" class="form-label"><strong class="fs-3"> Categoria</strong></label>
                <hr class="my-2">
                <input type="text" class="form-control" id="name" name="name" placeholder="Primi" required class="my-2">
            </div>
            <button type="submit" class="btn btn-primary">Crea Categoria</button>
        </form>

    </div>
</section>
@endsection