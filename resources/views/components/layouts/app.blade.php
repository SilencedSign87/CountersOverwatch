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
        <button id="btnCerrar" onclick="cerrarSesion()" class="btn_sesion">Cerrar Sesión</button>
        <script>
            // Ajax para cerrar sesión
            function cerrarSesion() {
                fetch('/tierlist-maker/logout', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        window.location.href = '/';
                    })
                    .catch(error => {
                        console.error('Error al cerrar sesión:', error);
                    });
            }
        </script>
    @endauth

    @csrf
    {{ $slot }}

    @livewireScripts()

    @stack('scripts')

</body>

</html>
