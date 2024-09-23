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
            padding-top: 0.5rem;
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

        /* Contenddor tierlist */

        .tier-header,
        .tier-contenedor {
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
        }

        /* Header */
        .cabecera-tierlist {
            font-size: 1rem;
            color: rgb(255, 255, 255);

            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            width: 100%;
            max-width: 1200px;
        }

        .cabecera-tierlist h1 {
            margin-block: 10px;
            text-align: center;
        }

        .filtro-navegacion {
            display: flex;
            flex-wrap: wrap;
            /* Permite que los elementos se distribuyan en múltiples filas */
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
            padding-block: 10px;
            width: 100%;
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
            width: 33%;
            max-width: 106px;
            height: auto;
            border-radius: 5px;
        }

        .filtro-t-selected {
            background-color: #f06414 !important;
            border: 2px solid #f06414 !important;
            color: hsl(0, 0%, 100%) !important;
            font-weight: bold;
        }

        /* Crear Tierlist */
        .tier-imagenes {
            margin: 0 auto;
            display: flex;
            justify-content: flex-start;
            width: fit-content;
            max-width: 1200px;
            flex-wrap: wrap;
            background: hsla(0, 0%, 0%, 0.5);
            height: fit-content;
            padding: 10px;
        }

        .buscar-label {
            font-size: 1rem;
        }

        .buscar-tierlist {
            height: 1.75rem;
            width: 100%;
            max-width: 500px;
            border-radius: 5px;
            text-align: center;
            text-transform: uppercase;
            font-size: 1rem;
            font-weight: bold;
            background-color: #f06414;
            color: white;
        }

        .buscar-tierlist:focus-visible {
            outline: none;
            border: 1px solid #ffffff;
        }

        .buscar-tierlist option {
            font-size: 1rem;
            padding: 5px;
            font-weight: normal;
            color: #000000;
            background-color: rgb(255, 255, 255);
        }

        .make {
            box-sizing: border-box;
            padding: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .input-tier {
            width: 25%;
            background-color: transparent;
            border: none;
            font-size: 1rem;
            font-weight: bold;
        }

        /* Imagenes de los heroes en el footer */
        .imagen-footer img {
            width: 80px;
            height: 80px;
        }

        .imagen-footer span {
            display: none;
        }

        .tier-footer {
            color: rgba(255, 255, 255, 0.507);
            /* cursiva*/
            font-style: italic;
        }
    </style>

    <header class="tier-header">
        <nav class="barra-navegacion">
            <button class="boton-navegacion filtro-seleccionado" wire:navigate.hover href="/tierlist">
                Ver Tierlist
            </button>
            <a href="/tierlist-maker" style="text-decoration: none;">
                <button class="boton-navegacion">
                    Hacer Tierlist
                </button>
            </a>
        </nav>
    </header>
    <main class="tier-contenedor">
        <header class="cabecera-tierlist">
            <h1>Tierlist {{ $tierlist->nombre ?? '' }}</h1>
            {{-- buscar --}}
            <label class="buscar-label" for="buscar-tierlist">Seleccione una tierlist:</label>
            <select class="buscar-tierlist" id="buscar-tierlist" name="buscar-tierlist"
                wire:change="seleccionarTierlist($event.target.value)">
                <option value="">última tierlist</option>
                @foreach ($tierlistNames as $id => $nombre)
                    <option value="{{ $id }}">{{ $nombre }}</option>
                @endforeach
            </select>
            {{-- Filtro por rol --}}
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
        <div class="cargador" style="border-top-color:#ffffff8d;" wire:loading wire:target='filtrarPorRol'></div>
        <article class="tierlist" wire:loading.remove wire:target='filtrarPorRol'>
            {{-- Rellenar los tiers --}}
            @foreach ($tierlistGrouped as $tier)
                {{-- Título del tier con color --}}
                <div class="tier-row-head" style="background-color: {{ $tier->color }};">
                    {{ $tier->nombre ?? 'Tier ' . $tier->posicion }}
                </div>

                {{-- Contenido del tier: Imágenes de los héroes, ordenados por su posición y de derecha a izquierda --}}
                <div class="tier-row-content">
                    @foreach ($tier->entries->sortBy('posicion') as $entry)
                        <img src="{{ $entry->hero->img_path }}" alt="{{ $entry->hero->nombre }}" class="hero-img"
                            title="{{ $entry->hero->nombre }}">
                    @endforeach
                </div>
            @endforeach
        </article>
        <footer class="tier-footer">
            <p>Creado el: {{ $tierlist->fecha ?? '' }}</p>
        </footer>
    </main>
</div>
