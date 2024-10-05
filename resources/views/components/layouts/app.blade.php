<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Estilos de livewire --}}
    @livewireStyles()
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

            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        #content {
            flex: 1;
        }

        .btn_sesion {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #f06414;
            color: #ffffff;
            border: 0;
            border-radius: 0.25rem;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.2s ease-in-out;
            z-index: 15;

            display: flex;
            justify-content: center;
            align-items: center;
        }

        .btn_sesion:hover {
            background: #ff8b47;
            color: #ffffff;
        }

        .btn_sesion:active {
            scale: 0.9;
        }

        .btn_nav {
            background: #ffffff;
            color: #414141;
            border: 0;
            border-radius: 0.25rem;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.2s ease-in-out;
        }

        .btn_nav:hover {
            background: #464646;
            color: #ffffff;
        }

        .btn_nav:active {
            scale: 0.9;
        }
    </style>

    @stack('styles')

</head>

<body>
    @auth
        <a href="/panelControl">
            <button class="btn_sesion">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-menu-2">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M4 6l16 0" />
                    <path d="M4 12l16 0" />
                    <path d="M4 18l16 0" />
                </svg>
            </button>
        </a>
    @endauth

    @csrf
    {{ $slot }}

    @livewireScripts()

    @stack('scripts')

</body>

</html>
