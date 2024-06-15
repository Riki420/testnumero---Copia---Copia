@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body d-flex flex-column align-items-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <div>
                        <a href="{{route('admin.dashboard')}}" class="btn btn-primary mt-4">GESTISCI IL TUO MENU</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
