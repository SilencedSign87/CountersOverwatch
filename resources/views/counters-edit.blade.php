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
            display: none;
            width: 100%;
            height: 100vh;
            max-width: 300px;
            background: hsla(0, 0%, 100%, 0.8);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 10;
        }

        .sidebar-content {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-start;
            width: 100% ;
            height: 100%;
            padding: 3em 1em;
            gap: 1em;
        }
        .sidebar-content a{
            width: 80%;
            text-decoration: none;
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

    <aside id="sidebar">
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btnSidebar = document.getElementById('btnToggle');
            const btnCerrar = document.getElementById('cerrarsesion');

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

            btnSidebar.onclick = function() {
                const sidebar = document.getElementById('sidebar');
                sidebar.style.display = sidebar.style.display === 'block' ? 'none' : 'block';
            }
        });
    </script>
</body>

</html>
