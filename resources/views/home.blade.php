<!doctype html>
<html>
    <head>
        <!-- Styles and Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        <nav>
            <a class="btn btn-primary" href="{{route('singer')}}" role="button">Aggiungi Un Cantante</a>
            <a class="btn btn-primary" href="{{route('song')}}" role="button">Aggiungi Una Canzone</a>
            <a class="btn btn-primary" href="{{route('viewsingerdata')}}" role="button">Visulizza Dati</a>
        </nav>
        <main>
            @yield('content')
        </main>

    </body>
</html>
