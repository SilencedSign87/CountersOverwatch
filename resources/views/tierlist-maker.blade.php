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

        .tier-row-head,
        .tier-row-content {
            background-color: hsla(0, 0%, 0%, 0.5);
            border-bottom: 10px solid hsl(226, 31%, 47%);
            min-height: 80px;
        }

        .tier-row-head {
            display: flex;
            justify-content: center;
            align-items: center;
            color: #000000;
            font-weight: bold;
            font-size: 1.5rem;
        }

        .tier-row-content {
            display: flex;
            flex-wrap: wrap;
        }

        .hero-img {
            box-sizing: border-box;
            width: 33%;
            max-width: 106px;
            height: auto;
            border-radius: 5px;
            cursor: grab;
            transition: scale 0.1s ease-in,
            border 0.1 ease-in;
        }

        .hero-img:hover {
            scale: 1.05;
            border: 2px solid hsl(0, 0%, 100%);
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
        {{-- Filtros por rol --}}
        <header>
            <nav class="filtro-navegacion">
                <button wire:click="filtrarPorRol(null)"
                    class="{{ $filtroR == null ? 'filtro-t-selected' : '' }}">Todos</button>
                <button wire:click="filtrarPorRol('tank')"
                    class="{{ $filtroR == 'tank' ? 'filtro-t-selected' : '' }}">Tank</button>
                <button wire:click="filtrarPorRol('dps')"
                    class="{{ $filtroR == 'dps' ? 'filtro-t-selected' : '' }}">DPS</button>
                <button wire:click="filtrarPorRol('supp')"
                    class="{{ $filtroR == 'supp' ? 'filtro-t-selected' : '' }}">Support</button>
            </nav>
        </header>
        {{-- Tierlist Rederizada --}}
        <article class="tierlist">
            @foreach ($renderTiers as $tier)
                <div class="tier-row-head" style="background-color: {{ $tier['color'] }};">
                    {{ $tier['nombre'] }}
                </div>
                <div class="tier-row-content">
                    @foreach ($tier['entries'] as $entry)
                        <img src="{{ $entry['img_path'] }}" alt="{{ $entry['nombre'] }}" class="hero-img"
                            title="{{ $entry['nombre'] }}">
                    @endforeach
                </div>
            @endforeach
        </article>
    </main>
    {{-- Imagenes y botones de control --}}
    <footer class="tier-footer">
        <div class="tier-row-content">
            @foreach ($renderHeroesDisponibles as $hero)
                <img src="{{ $hero['img_path'] }}" alt="{{ $hero['nombre'] }}" class="hero-img"
                    title="{{ $hero['nombre'] }}">
            @endforeach
        </div>
    </footer>

</div>
