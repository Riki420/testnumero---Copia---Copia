<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Menù</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        
/* Toggle Input for Dashboard Plates */
.switch {
    width: 80px;
    height: 30px;
    position: relative;
}

.switch input {
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    opacity: 0;
    z-index: 100;
    position: absolute;
    width: 100%;
    height: 100%;
    cursor: pointer;
}

.switch label {
    display: block;
    width: 80%;
    height: 95%;
    position: relative;
    background: #fff;
    border-radius: 30px 30px 30px 30px;
    transition: all 0.5s ease;
}

.switch input ~ label i {
    display: block;
    height: 26px;
    width: 26px;
    position: absolute;
    transform: translate(0%, -50%);
    left: 0%;
    top: 50%;
    z-index: 2;
    border-radius: inherit;
    background-color: #a71a07; /* Fallback */
    transition: all 0.5s ease;
}

.switch label + span {
    content: "";
    display: inline-block;
    position: absolute;
    left: 70px;
    top: 5px;
    width: 18px;
    height: 18px;
    border-radius: 10px;
    background: #a02101;
    transition: all 0.5s ease;
    z-index: 2;
}

/* Toggle */
.switch input:checked ~ label + span {
    content: "";
    display: inline-block;
    position: absolute;
    width: 18px;
    height: 18px;
    border-radius: 10px;
    transition: all 0.5s ease;
    z-index: 2;
    background: #009600;
}

.switch input:checked ~ label i {
    left: auto;
    left: 63%;
    background-color: #216821;
    transition: all 0.5s ease;
}

/* Bootstrap Breakpoints */
@media (max-width: 576px) {
    /* Extra small devices (portrait phones, less than 576px) */
    .switch {
        width: 60px; /* Larghezza adeguata per dispositivi extra small */
        height: 22px; /* Altezza proporzionale */
    }
    .switch input ~ label i {
        width: 20px; /* Dimensione adeguata per il cerchio interno */
        height: 20px;
    }
}
    </style>
</head>

<body>
    <!-- <nav class="my-navbar">


        <div>
            <a href="/" class="text-decoration-none"><span class="fs-xs-5">Locanda del Pellegrino</span></a>
        </div>
        <div>
            <a href="/" class="text-decoration-none"><span class="fs-xs-5 me-2">Home</span></a>

            <a href="{{route ('admin.dashboard')}}" class="text-decoration-none"><span class="fs-xs-5">Dashboard</span></a>  

        </div>
    </nav> -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-danger text-bg-dark border">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Locanda del Pellegrino</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route ('admin.dashboard')}}">Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>




    <section class="p-5 bg-white vh-100 d-flex flex-wrap">
        @yield('content')
    </section>

    <!--BOTTONE LINGUA-->
    <div class="language-switcher">
        <form action="{{ route('language.switch') }}" method="POST">
            @csrf
            <button type="submit" name="language" value="{{ app()->getLocale() == 'en' ? 'it' : 'en' }}">
                {{ app()->getLocale() == 'en' ? 'Italiano' : 'English' }}
            </button>
        </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>