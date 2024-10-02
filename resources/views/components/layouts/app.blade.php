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

        .btn_cerrar {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: transparent;
            color: tomato;
            border: 2px solid tomato;
            padding: 10px 20px;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
            z-index: 11;
        }

        .btn_cerrar:hover {
            cursor: pointer;
            background-color: tomato;
            color: white;
        }

        .btn_cerrar:active {
            scale: 0.9;
        }
    </style>

    @stack('styles')

</head>

<body>
    @auth
        <button id="btnCerrar" onclick="cerrarSesion()" class="btn_cerrar">Cerrar Sesión</button>
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
