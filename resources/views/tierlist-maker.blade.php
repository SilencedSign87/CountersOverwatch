<div>
    <style>
        /* Spinner */
        .cargador {
            border: 2px solid transparent;
            border-radius: 100%;
            border-top: 2px solid rgba(0, 0, 0, 0.50);
            width: 30px;
            height: 30px;
            animation: girar 0.5s linear infinite;
        }

        @keyframes girar {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Barra de navegación */
        .barra-navegacion {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0.5rem;
            gap: 0.75rem;
            flex-wrap: wrap;
            position: sticky;
            top: 0;
            z-index: 10;
            background: transparent;

            animation: blur linear both;
            animation-timeline: scroll();
            animation-range: 0 400px;
        }

        @keyframes blur {
            to {
                box-shadow:
                    0px 5px 50px -5px rgba(49, 120, 201, 0.1),
                    0px 0px 0 1px rgba(49, 120, 201, 0.1);
                background-color: rgba(49, 120, 201, 0.3);
                backdrop-filter: blur(10px);
            }
        }

        .boton-navegacion {
            width: fit-content;
            height: 3rem;
            min-width: 6rem;
            border-radius: 0.25rem;
            padding-left: 1rem;
            padding-right: 1rem;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
            font-family: system-ui;
            text-transform: uppercase;
            font-weight: bold;
            font-size: 1.2rem;
            background-color: hsla(0, 0%, 100%, 0.75);
            color: hsla(0, 0%, 0%, 0.7);
            border: 2px solid hsl(0, 0%, 100%);
            backdrop-filter: blur(1rem);
            -webkit-backdrop-filter: blur(1rem);
            transition: background-color 0.2s ease-in, color 0.2s ease-in, scale 0.1s ease-in;
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
        }

        .boton-navegacion:hover {
            background-color: hsl(0, 0%, 90%);
            color: hsl(0, 0%, 0%);
        }

        .boton-navegacion:active {
            background-color: hsla(0, 0%, 100%, 1);
            scale: 0.95;
        }

        .filtro-seleccionado {
            background-color: hsl(0, 0%, 100%);
            color: hsl(0, 0%, 0%);
        }

        /* Estilos del header y contenedor y footer */
        .tier-header,
        .tier-contenedor,
        .tier-footer {
            margin: 0 auto;
            width: 100%;
            max-width: 1500px;
        }

        .tier-contenedor {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            position: relative;
            gap: 10px;
        }

        .tier-footer {
            box-sizing: border-box;
            /* Ajustar tamaño al contenido */
            width: 100%;
            max-width: 1427px;
            padding: 10px;
            border-radius: 10px;
            background-color: hsla(220, 100%, 12%, 0.5);
        }

        /* Filtros de rol */
        .filtro-navegacion {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 0.5rem;
        }

        @media (max-width: 768px) {
            .filtro-navegacion {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        .filtro-navegacion button {
            padding: 5px;
            font-size: 1rem;
            width: 7rem;
            height: 2rem;
            flex: 1 1 1 calc(25% - 1rem);
            /* Cada botón ocupa un 25% del ancho con un pequeño margen */
            background-color: hsla(0, 0%, 100%, 0.6);
            color: hsla(0, 0%, 0%, 0.7);
            border: 2px solid hsl(0, 0%, 100%);
            border-radius: 5px;
            text-align: center;
            text-transform: uppercase;
        }

        .filtro-navegacion button:hover {
            background-color: hsl(0, 0%, 90%);
            color: hsl(0, 0%, 0%);
        }

        .filtro-navegacion button:active {
            scale: 0.95;
        }

        .filtro-t-selected {
            background-color: #f06414 !important;
            border: 2px solid #f06414 !important;
            color: hsl(0, 0%, 100%) !important;
            font-weight: bold;
        }

        /* Estilos de la tierlist */
        .tierlist {
            box-sizing: border-box;
            width: 100%;
            max-width: 1427px;
            border-radius: 5px;
            background-color: hsla(220, 100%, 12%, 0.5);
            display: grid;
            grid-template-columns: minmax(60px, 1fr) 11fr;
            padding: 1%;
        }

        .tier_row_head,
        .tier_row_content {
            background-color: hsla(0, 0%, 0%, 0.5);
            border-bottom: 10px solid hsl(226, 31%, 47%);
            min-height: 75px;
        }

        .tier_row_head {
            display: flex;
            justify-content: center;
            align-items: center;
            color: #000000;
            font-weight: bold;
            font-size: 1.5rem;
        }

        .tier_row_content {
            display: flex;
            flex-wrap: wrap;
        }

        .imagen_heroe {
            box-sizing: border-box;
            width: 33%;
            max-width: 75px;
            height: auto;
            border-radius: 5px;
            cursor: grab;
            transition: scale 0.1s ease-in,
                border 0.1 ease-in;
        }

        .imagen_heroe:hover {
            scale: 1.05;
            border: 2px solid hsl(0, 0%, 100%);
        }

        .btn_guardar {
            display: block;
            margin: 0 auto;
            width: fit-content;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            border-radius: 5px;
            background-color: hsla(0, 0%, 100%, 0.6);
            color: hsla(0, 0%, 0%, 0.7);
            border: 2px solid hsl(0, 0%, 100%);
            border-radius: 5px;
            text-align: center;
            text-transform: uppercase;
        }

        .btn_guardar:hover {
            background-color: hsl(0, 0%, 90%);
            color: hsl(0, 0%, 0%);
        }

        .btn_guardar:active {
            background-color: hsla(0, 0%, 100%, 1);
            scale: 0.95;
        }
    </style>

    <header class="tier-header">
        <nav class="barra-navegacion">
            <button class="boton-navegacion" wire:navigate.hover href="/tierlist">
                Ver Tierlist
            </button>
            <button class="boton-navegacion filtro-seleccionado" wire:navigate.hover href="/tierlist-maker">
                Hacer Tierlist
            </button>
        </nav>
    </header>
    {{-- TIerlist --}}
    <main class="tier-contenedor">
        {{-- Filtros por rol (los mismos que antes) --}}
        <header>
            <nav class="filtro-navegacion">
                <button class="filtro-t-selected" onclick="filtrarPorRol(null)">Todos</button>
                <button onclick="filtrarPorRol('tank')" class="">Tank</button>
                <button onclick="filtrarPorRol('dps')" class="">DPS</button>
                <button onclick="filtrarPorRol('supp')" class="}">Support</button>
            </nav>
        </header>
        {{-- Botón Guardar --}}
        <button onclick="guardarTierlist()" class="btn_guardar">Guardar Tierlist</button>

        {{-- Tierlist Renderizada --}}
        <article class="tierlist">
            @foreach ($tiers as $tierIndex => $tier)
                <div class="tier_row_head" style="background-color: {{ $tier['color'] }};">
                    {{ $tier['nombre'] }}
                </div>
                <div class="tier_row_content" id="tier-{{ $tierIndex }}" data-tier-index="{{ $tierIndex }}">
                    @foreach ($tier['entries'] as $entryIndex => $entry)
                        <img src="{{ $entry['img_path'] }}" alt="{{ $entry['nombre'] }}" class="imagen_heroe"
                            title="{{ $entry['nombre'] }}" data-hero-id="{{ $entry['id'] }}"
                            data-index="{{ $entryIndex }}">
                    @endforeach
                </div>
            @endforeach
        </article>

        {{-- Footer con héroes disponibles --}}
        <footer class="tier-footer">
            <div class="tier_row_content" id="heroes-disponibles">
                @foreach ($heroesDisponibles as $heroIndex => $hero)
                    <img src="{{ $hero['img_path'] }}" alt="{{ $hero['nombre'] }}" class="imagen_heroe"
                        title="{{ $hero['nombre'] }}" data-hero-id="{{ $hero['id'] }}"
                        data-index="{{ $heroIndex }}" data-rol="{{ $hero['rol'] }}">
                @endforeach
            </div>
        </footer>
    </main>


    <script>
        if (typeof tiers === 'undefined') {
            // Inicializar Sortable.js para cada tier y el footer
            let tiers = document.querySelectorAll('.tier_row_content');

            tiers.forEach(tier => {
                new Sortable(tier, {
                    group: 'shared', // Permitir arrastrar entre tiers y el footer
                    animation: 150,
                    onEnd: function(evt) {
                        // Actualizar la posición de los héroes en el DOM
                        actualizarPosiciones();
                    }
                });
            });
        }

        // Función para actualizar la posición de los héroes en el DOM
        function actualizarPosiciones() {
            tiers.forEach(tier => {
                let heroes = tier.querySelectorAll('.imagen_heroe');
                heroes.forEach((hero, index) => {
                    hero.dataset.index = index;
                });
            });
        }

        // Función para filtrar por rol
        function filtrarPorRol(rol) {
            let heroes = document.querySelectorAll('.imagen_heroe');
            let botonesFiltro = document.querySelectorAll('.filtro-navegacion button');

            heroes.forEach(hero => {
                if (rol === null || hero.dataset.rol === rol) {
                    hero.style.display = 'block';
                } else {
                    hero.style.display = 'none';
                }
            });

            // Actualizar la clase del botón seleccionado
            botonesFiltro.forEach(boton => {
                if (boton.getAttribute('onclick') === `filtrarPorRol('${rol}')` || (rol === null && boton
                        .getAttribute('onclick') === 'filtrarPorRol(null)')) {
                    boton.classList.add('filtro-t-selected');
                } else {
                    boton.classList.remove('filtro-t-selected');
                }
            });

            actualizarPosiciones();
        }

        function actualizarPosiciones() {
            let tiers = document.querySelectorAll('.tier_row_content');
            tiers.forEach(tier => {
                let heroes = tier.querySelectorAll(
                    '.imagen_heroe:not([style*="display: none"])'); // Seleccionar solo los héroes visibles
                heroes.forEach((hero, index) => {
                    hero.dataset.index = index;
                });
            });

            // Actualizar la posición de los héroes en el footer (si es necesario)
            let footerHeroes = document.querySelectorAll('#heroes-disponibles .imagen_heroe:not([style*="display: none"])');
            footerHeroes.forEach((hero, index) => {
                hero.dataset.index = index;
            });
        }

        // Función para guardar la tierlist
        function guardarTierlist() {
            let tierlistData = [];
            tiers.forEach(tier => {
                let tierIndex = tier.dataset.tierIndex;
                let tierEntries = [];
                let heroes = tier.querySelectorAll('.imagen_heroe');
                heroes.forEach(hero => {
                    tierEntries.push({
                        hero_id: hero.dataset.heroId,
                        posicion: hero.dataset.index
                    });
                });
                tierlistData.push({
                    tier_index: tierIndex,
                    entries: tierEntries
                });
            });
            console.log(tierlistData);

        }
    </script>

</div>
