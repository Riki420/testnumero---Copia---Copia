@extends('layouts.dashboard');
@section('content')
<div class="container">
    <div class="d-flex flex-row justify-content-between">
        
    </div>
    <hr class="my-4">

    <script>
        const forms = document.querySelectorAll('.formToggle');

        forms.forEach(function(form) {
            form.addEventListener('change', function(event) {
                const isActive = document.querySelectorAll('.customHidden');
                isActive.forEach(function(hidden) {
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