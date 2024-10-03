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
            max-width: 1250px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            gap: 10px;
        }

        .editar_contenedor section,
        .editar_contenedor footer,
        .editar_contenedor header {
            width: 100%;
            height: fit-content;
        }

        .editar_contenedor header {
            color: white;
            text-align: center;
        }

        #contendor_heroes_objetivo {
            box-sizing: border-box;
            width: 100%;
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
            overflow-y: hidden;
            /* Ancho al mostrar el contenedor, ajústalo según necesites */
            user-select: none;
        }

        .imagen_heroe {
            opacity: 0;
            box-sizing: border-box;
            width: 80px;
            height: 80px;
            transition: opacity 0.25s ease;
            border: none;
            user-select: none;
        }

        .imagen_heroe.active {
            opacity: 1;
            transition: all 0.25s;
            border: none;
        }

        /* Cuando una imagen esta seleccionada */
        .shaded {
            background: rgba(0, 0, 0, 0.25);
            /* cambiar la luminosidad de la imagen */
            filter: brightness(0.5);
        }

        .imagen_hero_objetido {
            background: rgba(0, 0, 0, 0.25);
            width: 90px;
            height: 90px;
            border-radius: 5px;
        }

        .imagen_heroe:hover {
            background: white;
        }

        .imagen_heroe:active {
            border: 1px solid white;
        }

        #contendor_heroes_add {
            box-sizing: border-box;
            width: 1250px;
            display: flex;
            gap: 2px;
            justify-content: center;
            align-items: flex-start;
            overflow: hidden;
            background: hsla(0, 0%, 100%, 0.50);
            border-radius: 5px;
            padding: 5px;
        }

        .boton_rol_footer {
            width: 80px;
            height: 80px;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            transition: all 0.3s ease;
        }

        .boton_rol_footer:hover {
            background: rgba(255, 255, 255, 0.75);
        }

        .boton_rol_footer:active {
            background: rgba(255, 255, 255, 1);
        }

        .contenedor_heroes_footer {
            display: flex;
            overflow-x: auto;
            width: 0;
            white-space: nowrap;
            transition: width 0.5s ease;
            background: hsla(0, 0%, 100%, 0.75);
        }

        .contenedor_heroes_footer.active {
            width: 80%;
        }

        .imagen_heroe_footer {
            box-sizing: border-box;
            width: 80px;
            height: 80px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .imagen_heroe_footer.active {
            opacity: 1;
        }

        #contendor_hero_counters {
            width: 100%;
        }

        #hero_selected_counters {
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
            overflow-x: auto;
            width: 100%;
            min-height: 90px;
            gap: 1px;
        }

        #counters_rol_tank {
            border: 2px solid rgb(108, 171, 255);
            background: rgba(108, 172, 255, 0.25);
        }

        #counters_rol_dps {
            border: 2px solid rgb(255, 142, 108);
            background: rgba(255, 142, 108, 0.25);
        }

        #counters_rol_supp {
            border: 2px solid rgb(57, 223, 132);
            background: rgba(57, 223, 132, 0.25);
        }

        .contenedor_row {
            box-sizing: border-box;
            padding-inline: 1em;
            height: 100px;
            width: 100%;
            overflow-x: auto;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 5px;
            background: hsla(0, 0%, 100%, 0.75)
        }

        .imagen_rol {
            background: transparent;
            width: 2em;
            height: 2em;
        }

        .imagen_contenedor_row {
            box-sizing: border-box;
            width: 100%;
            overflow-x: auto;
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            align-items: center;
            min-height: 94px;
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
                            <img draggable="false" src="/logos/tankLogo.svg" alt="logo de tank" width="30"
                                height="30">
                        @elseif($rol == 'dps')
                            <img draggable="false" src="/logos/dpsLogo.svg" alt="logo de tank" width="30"
                                height="30">
                        @elseif($rol == 'supp')
                            <img draggable="false" src="/logos/suppLogo.svg" alt="logo de tank" width="30"
                                height="30">
                        @endif
                    </div>
                    <div class="contenedor_heroes" data-rol="{{ $rol }}">
                        @foreach ($heroes as $hero)
                            <img src="{{ $hero['img_path'] }}" alt="{{ $hero['nombre'] }}" class="imagen_heroe"
                                draggable="false" data-id="{{ $hero['id'] }}" data-rol="{{ $rol }}"
                                onclick="selectHero('{{ $hero['id'] }}','{{ $hero['nombre'] }}' , '{{ $hero['img_path'] }}' , '{{ $rol }}')">
                        @endforeach
                    </div>
                @endforeach
            </div>
            <div id="contendor_hero_counters">
                <div id="heroe-selected" class="contenedor_row">

                </div>
                <div id="hero_selected_counters">
                    <div id="counters_rol_tank" class="imagen_contenedor_row">

                    </div>
                    <div id="counters_rol_dps" class="imagen_contenedor_row">

                    </div>
                    <div id="counters_rol_supp" class="imagen_contenedor_row">

                    </div>
                </div>
            </div>
        </section>
        <footer>
            <div id="contendor_heroes_add">
                @foreach ($HeroesRol as $rol => $heroes)
                    <div class="boton_rol_footer" data-rol="{{ $rol }}">
                        @if ($rol == 'tank')
                            <img src="/logos/tankLogo.svg" alt="logo de tank" width="30" height="30">
                        @elseif($rol == 'dps')
                            <img src="/logos/dpsLogo.svg" alt="logo de dps" width="30" height="30">
                        @elseif($rol == 'supp')
                            <img src="/logos/suppLogo.svg" alt="logo de supp" width="30" height="30">
                        @endif
                    </div>
                    <div class="contenedor_heroes_footer" data-rol="{{ $rol }}">
                        @foreach ($heroes as $hero)
                            <img src="{{ $hero['img_path'] }}" alt="{{ $hero['nombre'] }}" class="imagen_heroe_footer"
                                draggable="false" data-id="{{ $hero['id'] }}" data-rol="{{ $rol }}"
                                onclick="addCounter('{{ $hero['id'] }}' ,'{{ $hero['nombre'] }}' ,  '{{ $hero['img_path'] }}' , '{{ $rol }}')">
                        @endforeach
                    </div>
                @endforeach
            </div>
        </footer>
    </article>

    <script>
        // Datos de los counters
        let dataCounters = [];
        // objeto del heroe
        let selectedHeroObject = null;
        // matriz con los counters del heroe seleccionado
        let countersSelectedHero = [];

        // Cambia el heroe seleccionado
        function selectHero(id, nombre, img_path, rol) {
            selectedHeroObject = {
                'id': id,
                'nombre': nombre,
                'img_path': img_path,
                'rol': rol
            }

            // Buscar si el héroe ya tiene counters guardados en dataCounters
            let existingHeroData = dataCounters.find(heroData => heroData.hero_id == selectedHeroObject.id);

            if (existingHeroData) {
                // Si el héroe ya existe, cargar sus counters
                countersSelectedHero = existingHeroData.counters;
            } else {
                // Si el héroe es nuevo, inicializar un objeto para él en dataCounters
                dataCounters.push({
                    hero_id: selectedHeroObject.id,
                    img_path: selectedHeroObject.img_path, // O la forma en que accedas a la ruta de la imagen
                    counters: []
                });
                countersSelectedHero = []; // Reiniciar la lista de counters mostrados
            }

            // Renderizar la interfaz de usuario
            renderHeroCounters(selectedHeroObject);
            shadeHeroImages(id);
        }

        // añade counter al heroe seleccionado
        function addCounter(id, nombre, img_path, rol) {
            if (selectedHeroObject === null) {
                // Manejar el caso en el que no se haya seleccionado un héroe objetivo
                alert("Selecciona un héroe objetivo primero.");
                return;
            }

            // Buscar el héroe que se quiere añadir como counter
            let counterHero = {
                'nombre': nombre,
                'img_path': img_path,
                'rol': rol
            };

            // Verificar si el counter ya existe para este héroe
            let existingCounterIndex = countersSelectedHero.findIndex(counter => counter.hero_id == id);

            if (existingCounterIndex === -1) {
                // Si el counter no existe, agregarlo
                countersSelectedHero.push({
                    hero_id: id,
                    img_path: counterHero.img_path, // O la forma en que accedas a la ruta de la imagen
                    rol: rol
                });

                // Actualizar dataCounters con el nuevo counter
                let heroDataIndex = dataCounters.findIndex(heroData => heroData.hero_id == selectedHeroObject.id);
                dataCounters[heroDataIndex].counters = countersSelectedHero;

            } else {
                // Si el counter ya existe:
                // - No hacer nada
            }

            // Renderizar la interfaz de usuario
            renderHeroCounters(selectedHeroObject);
        }

        function removeCounter(id) {
            if (selectedHeroObject === null) {
                // Manejar el caso en el que no se haya seleccionado un héroe objetivo
                alert("Selecciona un héroe objetivo primero.");
                return;
            }

            // Buscar el índice del counter en countersSelectedHero
            let counterIndex = countersSelectedHero.findIndex(counter => counter.hero_id == id);

            if (counterIndex !== -1) {
                // Si se encuentra el counter, eliminarlo
                countersSelectedHero.splice(counterIndex, 1);

                // Actualizar dataCounters con la lista de counters actualizada
                let heroDataIndex = dataCounters.findIndex(heroData => heroData.hero_id == selectedHeroObject.id);
                dataCounters[heroDataIndex].counters = countersSelectedHero;

                // Renderizar la interfaz de usuario para reflejar el cambio
                renderHeroCounters(selectedHeroObject);
            }
        }

        function shadeHeroImages(selectedHeroId) {
            const heroImages = document.querySelectorAll('.imagen_heroe');
            heroImages.forEach(image => {
                if (image.dataset.id !== selectedHeroId) {
                    image.classList.add('shaded');
                } else {
                    // Asegurarse de que la imagen seleccionada no tenga la clase 'shaded'
                    image.classList.remove('shaded');
                }
            });
        }

        function shadeCounterSeleccionados() {
            const counterImages = document.querySelectorAll(
            '.imagen_heroe_footer'); // Seleccionar todas las imágenes de counters

            counterImages.forEach(image => {
                let counterId = image.dataset.id; // Obtener el ID del counter de la imagen

                // Buscar si el ID del counter está en countersSelectedHero
                let isSelected = countersSelectedHero.some(counter => counter.hero_id == counterId);

                if (isSelected) {
                    image.classList.add('shaded'); // Agregar la clase 'shaded' si el counter está seleccionado
                } else {
                    image.classList.remove('shaded'); // Quitar la clase 'shaded' si el counter no está seleccionado
                }
            });
        }

        // Renderiza la interfaz de usuario del héroe seleccionado y sus counters
        function renderHeroCounters(selectedHero) {
            let contenedorSelectedHero = document.getElementById('heroe-selected');
            let countersContenedor = document.getElementById('hero_selected_counters');

            // Crear una imagen del heroe seleccionado
            contenedorSelectedHero.innerHTML = `
                <img src="${selectedHero.img_path}" alt="${selectedHero.nombre}" class="imagen_hero_objetido" draggable="false" data-id="${selectedHero.id}" data-rol="${selectedHero.rol}">
                <img src="/logos/${selectedHero.rol}Logo.svg" alt="logo de tank" width="30" height="30" class=" imagen_rol" draggable="false" data-id="${selectedHero.id}" data-rol="${selectedHero.rol}">
                <h3>${selectedHero.nombre}</h3>
            `;
            // Limpiar las imagenes de counters existentes
            countersContenedor.innerHTML = ` 
                <div id = "counters_rol_tank" class="imagen_contenedor_row" ></div> 
                <div id = "counters_rol_dps" class="imagen_contenedor_row" ></div> 
                <div id = "counters_rol_supp" class="imagen_contenedor_row" ></div>
            `;

            // Renderizar los counters
            countersSelectedHero.forEach(counter => {
                let contenedorRol = document.getElementById(`counters_rol_${counter.rol}`);
                contenedorRol.innerHTML += `
                    <img onclick="removeCounter('${counter.hero_id}')" src="${counter.img_path}" alt="${counter.nombre}" class="imagen_hero_objetido" title="${counter.nombre}" data-hero-id="${counter.hero_id}" data-index="${countersSelectedHero.indexOf(counter)}">
                `;
            });
            // Actualizar la clase 'shaded' en los counters seleccionados
            shadeCounterSeleccionados()
        }

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

            const botonesRolFooter = document.querySelectorAll('.boton_rol_footer');
            const contenedoresHeroesFooter = document.querySelectorAll('.contenedor_heroes_footer');

            botonesRolFooter.forEach(boton => {
                boton.addEventListener('click', function() {
                    // Obtener el rol del botón
                    const rol = boton.dataset.rol;

                    if (boton.classList.contains('seleccionado')) {
                        // Colapsar el contenedor si está activo
                        boton.classList.remove('seleccionado');
                        contenedoresHeroesFooter.forEach(contenedor => {
                            if (contenedor.dataset.rol === rol) {
                                contenedor.classList.remove('active');
                            }
                        });
                        return;
                    }

                    // Remover la clase .seleccionado de todos los botones
                    botonesRolFooter.forEach(b => b.classList.remove('seleccionado'));

                    // Añadir la clase .seleccionado solo al botón activo
                    boton.classList.add('seleccionado');

                    // Expande las imágenes del rol seleccionado
                    contenedoresHeroesFooter.forEach(contenedor => {
                        if (contenedor.dataset.rol === rol) {

                            // Activa el contenedor
                            contenedor.classList.add('active');

                            // Activa las imágenes dentro del contenedor con un pequeño retraso
                            const imagenes = contenedor.querySelectorAll(
                                '.imagen_heroe_footer');
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
                            const imagenes = contenedor.querySelectorAll(
                                '.imagen_heroe_footer');
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
