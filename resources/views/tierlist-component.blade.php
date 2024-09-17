<div>
    @push('styles')
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



            /* Contenddor tierlist */
            .tier-contenedor {
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: center;
                width: 100%;
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
            .cabecera-tierlist h1{
                margin-block: 10px;
            }

            .filtro-navegacion {
                display: flex;
                flex-wrap: wrap;
                /* Permite que los elementos se distribuyan en múltiples filas */
                justify-content: center;
                align-items: center;
                gap: 0.5rem;
                padding: 10px;
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
                width: 100%;
                max-width: 1200px;
                border-radius: 5px;
                background-color: hsla(220, 100%, 12%, 0.5);
                display: grid;
                grid-template-columns: minmax(2rem, 1fr) 8fr;
                padding: 1%;
            }

            .tier-row-head,
            .tier-row-content {
                background-color: hsla(0, 0%, 0%, 0.5);
                /* border: 2px solid hsl(0, 0%, 34%); */
                border-bottom: 10px solid hsl(226, 31%, 47%);

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
                gap: 1px;
            }

            .hero-img {
                max-height: 85px;
                border-radius: 5px;
            }
            .filtro-t-selected {
                background-color: #f06414 !important;
                border: 2px solid #f06414 !important;
                color: hsl(0, 0%, 100%) !important;
                font-weight: bold;
            }
            /* Crear Tierlist */
            .tier-imagenes{
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
            /* Imagenes de los heroes en el footer */
            .imagen-footer img{
                width: 90px;
                height: 90px;
            }
            .imagen-footer span{
                display: none;
            }
        </style>
    @endpush

    <header class="tier-header">
        <nav class="barra-navegacion">
            <button class="boton-navegacion {{ $modo === 'verTierlist' ? 'filtro-seleccionado' : '' }}"
                wire:click="cambiarModo('verTierlist')">
                <div class="cargador" wire:loading wire:target='cambiarModo'></div>
                Ver Tierlist
            </button>
            <button class="boton-navegacion {{ $modo === 'hacerTierlist' ? 'filtro-seleccionado' : '' }}"
                wire:click="cambiarModo('hacerTierlist')">
                <div class="cargador" wire:loading wire:target='cambiarModo'></div>
                Hacer Tierlist
            </button>
        </nav>
    </header>

    <main class="tier-contenedor">
        <header class="cabecera-tierlist">
            <h1>Tierlist {{ $tierlist->nombre ?? '' }}</h1>
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
            @if ($modo === 'verTierlist')
                {{-- Rellenar los tiers --}}
                @foreach ($tierlistGrouped as $tier)
                    {{-- Título del tier con color --}}
                    <div class="tier-row-head" style="background-color: {{ $tier->color }};">
                        {{ $tier->nombre ?? 'Tier ' . $tier->posicion }}
                    </div>

                    {{-- Contenido del tier: Imágenes de los héroes --}}
                    <div class="tier-row-content">
                        @foreach ($tier->entries as $entry)
                            <img src="{{ $entry->hero->img_path }}" alt="{{ $entry->hero->nombre }}" class="hero-img"
                                title="{{ $entry->hero->nombre }}">
                        @endforeach
                    </div>
                @endforeach
            @else
                {{-- Tiers vacíos --}}
                <div class="tier-row-head">
                    
                </div>
                <div class="tier-row-content" style="text-align: center; color: #f06414;">
                    En construcción 🧑‍💻
                </div>
            @endif
        </article>
    </main>

    @if ($modo === 'hacerTierlist')
        <footer class="tier-imagenes">
            @foreach ($heroes as $hero)
                <div class="imagen-footer" id={{ $hero->id }}>
                    <img src="{{ $hero->img_path }}" alt="{{ $hero->nombre }}">
                    <span>{{ $hero->nombre }}</span>
                </div>
            @endforeach
        </footer>
    @endif

    @push('scripts')
        <script>
            function cargarTierlist() {
                // console.log('cargando tierlist');

            }
            window.addEventListener('cargaTierlist', cargarTierlist);
        </script>
    @endpush
</div>
