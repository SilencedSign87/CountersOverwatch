<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- Estilos de livewire --}}
    @livewireStyles()

    {{-- estilos de bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Titulo dado en el componente --}}
    <title>{{ $title ?? 'Page Title' }}</title>

    {{-- Icono de la parte superior del navegador --}}
    <link rel="icon" href="https://static.playoverwatch.com/img/favicon-2f5255d1c6.ico" type="image/x-icon">

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        body {
            background: linear-gradient(to bottom, rgb(52, 127, 211), rgb(32, 93, 163));
            background-attachment: fixed;
            background-size: cover;
            display: flex;
            flex-direction: column;
            min-height: 100%;
        }

        #content {
            flex: 1;
        }

        /* Estilo del scroll*/
        ::-webkit-scrollbar {
            width: 8px;
            /* Tamaño del scroll */
        }

        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.25);
            /* Color del fondo del scroll */
        }

        ::-webkit-scrollbar-thumb {
            background: rgb(194, 194, 194);
            /* Color del scroll */
            border-radius: 1rem;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgb(165, 165, 165);
            /* Color del scroll al pasar el ratón */
        }
    </style>
    @stack('styles')
</head>

<body>
    @csrf
    {{ $slot }}
    @livewireScripts()
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    @stack('scripts')
</body>

</html>
