<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modificar Counters</title>

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

        .btn_resaltado {
            background: #f06414;
            color: #ffffff;
            border: 0;
            border-radius: 0.25rem;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.2s ease-in-out;
        }

        .btn_resaltado:hover {
            background: #ff8b47;
            color: #ffffff;
        }

        .btn_resaltado:active {
            scale: 0.9;
        }

        .btn_accion {
            background: #ffffff;
            color: #414141;
            border: 0;
            border-radius: 0.25rem;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.2s ease-in-out;
        }

        .btn_accion:hover {
            background: #bdbdbd;
            color: #ffffff;
        }

        .btn_accion:active {
            scale: 0.9;
        }

        .btn_toggle {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            top: 10px;
            left: 10px;
            background: #f06414;
            color: #ffffff;
            border: 0;
            border-radius: 0.25rem;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.2s ease-in-out;
            z-index: 15;
        }

        .btn_toggle:hover {
            background: #ff8b47;
            color: #ffffff;
        }

        .btn_toggle:active {
            scale: 0.9;
        }

        #sidebar {

            box-sizing: border-box;
            width: 100%;
            height: 100vh;
            max-width: 300px;
            background: hsla(0, 0%, 100%, 0.8);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 10;

            /* Animación de entrada */
            transform: translateX(0);
            opacity: 1;
            transition: transform 0.2s ease-in-out,
                opacity 0.2s ease-in-out,
                display .2s ease allow-discrete;

            @starting-style {
                transform: translateX(-100%);
                opacity: 0;
            }
        }

        #sidebar.hide {
            opacity: 0;
            display: none;
            transform: translateX(-100%);
        }

        .sidebar-content {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-start;
            width: 100%;
            height: 100%;
            padding: 3em 1em;
            gap: 1em;
        }

        .sidebar-content a {
            width: 80%;
            text-decoration: none;
        }

        .editar_contenedor {
            margin: 0 auto;
            width: 100%;
            max-width: 1200px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            gap: 10px;
        }

        #contendor_heroes_objetivo {
            width: 85vw;
            height: 100px;
            display: flex;
            gap: 2px;
            justify-content: center;
            align-items: flex-start;
            overflow: hidden;
            /* Cambia a hidden para esconder las imágenes al inicio */
            background: hsla(0, 0%, 100%, 0.50);
            border-radius: 5px;
            padding: 5px;
        }

        .boton_rol {
            width: 80px;
            height: 80px;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            transition: all 0.3s ease;
        }

        .boton_rol:hover {
            background: rgba(255, 255, 255, 0.75);
        }

        .boton_rol:active {
            background: rgba(255, 255, 255, 1);
        }

        .boton_rol.seleccionado {
            background: rgba(255, 255, 255)
        }

        .contenedor_heroes {
            display: flex;
            overflow-x: hidden;
            width: 0;
            /* Ancho inicial 0 para la animación */
            white-space: nowrap;
            transition: width 0.75s ease-in-out;
            /* Transición del ancho */
            background: hsla(0, 0%, 100%, 0.75);
        }

        .contenedor_heroes.active {
            width: 100%;
            overflow-x: auto;
            /* Ancho al mostrar el contenedor, ajústalo según necesites */
        }

        .imagen_heroe {
            opacity: 0;
            box-sizing: border-box;
            width: 80px;
            height: 80px;
            transition: opacity 0.25s ease;
        }

        .imagen_heroe.active {
            opacity: 1;
        }

        .imagen_heroe:hover {
            border: 1px solid #f06414;
        }

        .imagen_heroe:active {
            border: 1px solid #ffffff;
        }
    </style>

</head>

<body>

    <button id="btnToggle" class="btn_toggle">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="icon icon-tabler icons-tabler-outline icon-tabler-layout-sidebar">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
            <path d="M9 4l0 16" />
        </svg>
    </button>

    <aside id="sidebar" class="hide">
        <div class="sidebar-content">
            <h1>Navegación</h1>
            <a href="/">
                <button class="btn_accion" style="width: 100%">Ver Counters</button>
            </a>
            <a href="/tierlist">
                <button class="btn_accion" style="width: 100%">Ver tierlist</button>
            </a>
            <a href="/tierlist-maker">
                <button class="btn_accion" style="width: 100%">Hacer tierlist</button>
            </a>
            <button id="cerrarsesion" class="btn_resaltado" style="width: 80%">Cerrar Sesión</button>
        </div>
    </aside>

    <article class="editar_contenedor">
        <header>
            <h1>Editar Counters</h1>
        </header>
        <section>
            <div id="contendor_heroes_objetivo">
                @foreach ($HeroesRol as $rol => $heroes)
                    <div class="boton_rol" data-rol="{{ $rol }}">
                        @if ($rol == 'tank')
                            <img src="/logos/tankLogo.svg" alt="logo de tank" width="30" height="30">
                        @elseif($rol == 'dps')
                            <img src="/logos/dpsLogo.svg" alt="logo de tank" width="30" height="30">
                        @elseif($rol == 'supp')
                            <img src="/logos/suppLogo.svg" alt="logo de tank" width="30" height="30">
                        @endif
                    </div>
                    <div class="contenedor_heroes" data-rol="{{ $rol }}">
                        @foreach ($heroes as $hero)
                            <img src="{{ $hero['img_path'] }}" alt="{{ $hero['nombre'] }}" class="imagen_heroe">
                        @endforeach
                    </div>
                @endforeach
            </div>
            <div id="contendor_hero_counters">

            </div>
        </section>
        <footer>
            <div id="contendor_heroes_add">

            </div>

        </footer>
    </article>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btnSidebar = document.getElementById('btnToggle');
            const btnCerrar = document.getElementById('cerrarsesion');
            const sidebar = document.getElementById('sidebar');

            const botonesRol = document.querySelectorAll('.boton_rol');
            const contenedoresHeroes = document.querySelectorAll('.contenedor_heroes');

            botonesRol.forEach(boton => {
                boton.addEventListener('click', function() {
                    // Obtener el rol del botón
                    const rol = boton.dataset.rol;

                    if (boton.classList.contains('seleccionado')) {
                        // Colapsar el contenedor si está activo
                        boton.classList.remove('seleccionado');
                        contenedoresHeroes.forEach(contenedor => {
                            if (contenedor.dataset.rol === rol) {
                                contenedor.classList.remove('active');
                            }
                        });
                        return;
                    }

                    // Remover la clase .seleccionado de todos los botones
                    botonesRol.forEach(b => b.classList.remove('seleccionado'));

                    // Añadir la clase .seleccionado solo al botón activo
                    boton.classList.add('seleccionado');

                    // Expande las imágenes del rol seleccionado
                    contenedoresHeroes.forEach(contenedor => {
                        if (contenedor.dataset.rol === rol) {

                            // Activa el contenedor
                            contenedor.classList.add('active');

                            // Activa las imágenes dentro del contenedor con un pequeño retraso
                            const imagenes = contenedor.querySelectorAll('.imagen_heroe');
                            setTimeout(() => {
                                    imagenes.forEach(img => img.classList.add(
                                        'active'));
                                },
                                200
                            ); // Tiempo en milisegundos para que las imágenes aparezcan después del contenedor
                        } else {
                            // Resetea el contenedor si es otro rol
                            contenedor.classList.remove('active');

                            // También resetea las imágenes del contenedor
                            const imagenes = contenedor.querySelectorAll('.imagen_heroe');
                            imagenes.forEach(img => img.classList.remove('active'));
                        }
                    });
                });
            });

            // Cerrar sesión
            btnCerrar.onclick = function() {
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

            // Abrir/cerrar el sidebar con el botón de toggle
            btnSidebar.onclick = function() {
                sidebar.classList.toggle('hide'); // Cambiar la clase del sidebar
            }

            // Detectar clic fuera del sidebar
            document.addEventListener('click', function(event) {
                // Si el sidebar está abierto
                if (!sidebar.classList.contains('hide')) {
                    // Verificar si el clic fue fuera del sidebar y del botón de toggle
                    if (!sidebar.contains(event.target) && !btnSidebar.contains(event.target)) {
                        sidebar.classList.add('hide'); // Cerrar el sidebar
                    }
                }
            });
        });
    </script>
</body>

</html>
