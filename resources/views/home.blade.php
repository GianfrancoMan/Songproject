<!doctype html>
<html>
    <head>
        <!-- Styles and Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        <nav>
            <a class="btn btn-primary" href="{{route('singer')}}" role="button">{{ __('Aggiungi un cantante') }}</a>
            <a class="btn btn-primary" href="{{route('song')}}" role="button">{{ __('Aggiungi una canzone') }}</a>
            <a class="btn btn-primary" href="{{route('viewsingerdata')}}" role="button">{{ __('Visualizza dati') }}</a>
        </nav>
        <main>
            @yield('content')
        </main>

    </body>
</html>
