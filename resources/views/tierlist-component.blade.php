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
                margin: 0.5rem 0;
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
                position: relative;
                justify-content: center;
                width: 100%;
            }

            .tierlist {
                width: 100%;
                max-width: 1200px;
                border-radius: 5px;
                background-color: hsla(220, 100%, 12%, 0.5);
                display: grid;
                grid-template-columns: minmax(2rem, 1fr) 6fr;
                padding: 1%;
            }

            .tier-row-head,
            .tier-row-content {
                background-color: hsla(0, 0%, 0%, 0.7);
                border: 2px solid #f06414;
                border-radius: 5px;
                color: wheat;
            }

            .tier-row-content img {
                max-height: 5rem;
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
        <article class="tierlist">
            @if ($modo === 'verTierlist')
                {{-- Rellenar los tiers --}}
                @foreach ($tierlistGrouped as $tier => $heroes)
                    {{-- Título del tier --}}
                    <div class="tier-row-head">
                        Tier {{ $tier }}
                    </div>
                    {{-- Contenido del tier: Imágenes de los héroes --}}
                    <div class="tier-row-content">
                        @foreach ($heroes as $hero)
                            <img src="{{ $hero->img_path }}" alt="{{ $hero->nombre }}" class="hero-img">
                        @endforeach
                    </div>
                @endforeach
            @else
                {{-- Tiers vacíos --}}
                <div class="tier-row-head"></div>
                <div class="tier-row-content"></div>
            @endif
        </article>
    </main>

    @if ($modo === 'hacerTierlist')
        <footer class="tier-imagenes">

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
