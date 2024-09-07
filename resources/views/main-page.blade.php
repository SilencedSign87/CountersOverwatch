<div>
    {{-- Estilos de la pantalla --}}
    @push('styles')
        <style>
            /* Spinner */
            .spinner {
                border: 2px solid transparent;
                border-radius: 100%;
                border-top: 2px solid rgba(0, 0, 0, 0.50);
                width: 30px;
                height: 30px;
                animation: spin 0.5s linear infinite;
            }

            @keyframes spin {
                0% {
                    transform: rotate(0deg);
                }

                100% {
                    transform: rotate(360deg);
                }
            }

            /* General styles */
            .overflow-hidden {
                overflow: hidden;
            }

            /* Navigation styles */
            .navegacion {
                margin: 1rem 0;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 0.5rem;
                gap: 0.75rem;
                flex-wrap: wrap;
                position:sticky;
                top:0;
                z-index: 10;
            }

            .boton_navegacion {
                width: 9rem;
                height: 3rem;
                min-width: 6rem;
                border-radius: 0.25rem;
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
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .boton_navegacion:hover {
                background-color: hsl(0, 0%, 90%);
                color: hsl(0, 0%, 0%);
            }

            .boton_navegacion:active {
                background-color: hsla(0, 0%, 100%, 1);
                scale: 0.95;
            }

            .seleccionado {
                background-color: hsl(0, 0%, 100%);
                color: hsl(0, 0%, 0%);
            }

            /* Grid container styles */
            .contenedor {
                display: grid;
                grid-template-columns: repeat(6, minmax(150px, 250px));
                gap: 1vw;
                margin: 0.5rem;
                max-width: calc(100% - 1rem);
                justify-content: center;
            }

            /* Card styles */
            .tarjeta {
                box-sizing: border-box;
                border: 2px solid hsla(0, 0%, 100%, .7);
                background: hsla(0, 0%, 100%, .8);
                border-radius: 0.25rem;
                aspect-ratio: 9 / 11;
                overflow: hidden;
                display: flex;
                flex-direction: column;
                transition: scale 0.1s ease-in, background-color 0.2s ease-in-out;
            }

            .tarjeta:hover {
                background: hsla(0, 0%, 100%, 0.9);
                scale: 1.05;
            }

            .tarjeta:active {
                background: hsla(0, 0%, 100%, 1);
                scale: 1;
            }

            .imagen_tarjeta img {
                display: block;
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .nombre {
                flex-grow: 1;
                display: flex;
                justify-content: center;
                align-items: center;
                text-align: center;
                font-size: 1rem;
                font-weight: bold;
                text-transform: uppercase;
                gap: 0.5rem;
            }

            /* Modal styles */
            .modal {
                display: none;
                position: fixed;
                z-index: 1050;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                transition: opacity 0.2s linear;
            }

            .modal.show {
                display: block;
                opacity: 1;
            }

            .modal-dialog {
                position: relative;
                width: 100vw;
                height: 90vh;
                max-width: 1000px;
                max-height: 800px;
                border-radius: 0.5rem;
                padding: 0.5rem;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: auto;
            }

            .modal-body {
                max-height: 70vh;
                overflow-y: auto;
                padding: 1rem;
            }

            .modal-header,
            .modal-footer {
                background: hsla(0, 0%, 100%, 0.2);
                border: 0;
            }

            .modal-content {
                background-color: rgba(255, 255, 255, 0.80);
                backdrop-filter: blur(0.5rem);
                -webkit-backdrop-filter: blur(0.5rem);
                border: 0;
            }

            .titulo_modal {
                display: flex;
                justify-content: start;
                align-items: center;
                gap: 1rem;
            }

            .titulo_modal img {
                border: 2px solid hsla(0, 0%, 100%, 0.5);
                border-radius: 0.5rem;
                max-width: 6rem;
                height: auto;
            }

            .titulo_modal span {
                font-size: 1.75rem;
                font-weight: bold;
            }

            .cuerpo {
                display: grid;
            }

            .nota {
                justify-self: center;
                display: flex;
                justify-content: center;
                align-items: center;
                padding-inline: 3rem;
                padding-block: 0.25rem;
                border-radius: 0.5rem;
                gap: 0.5rem;
                font-size: 1.1rem;
                font-weight: 500;
                text-align: center;
                background: rgba(255, 120, 41, 0.15);
                border: 1px solid rgb(255, 120, 41);
                color: rgb(197, 79, 11);
            }

            .texto-cuerpo {
                font-size: 1.5rem;
                justify-content: center;
                text-transform: uppercase;
                margin-block: 0.5rem;
            }

            .imgSM {
                width: calc(100% / 5 - 2px);
                border-radius: 20%;
            }

            .img_counters {
                width: 1.5rem;
                height: 1.5rem;
            }

            .nombre_rol span {
                font-weight: bold;
            }

            .alert-danger {
                background-color: rgba(220, 53, 69, 0.25);
            }

            .alert-primary {
                background-color: rgba(32, 136, 168, 0.25);
            }

            .btn-cerrar {
                background: #f06414;
                color: #fff;
                border: 0;
                border-radius: 0.25rem;
                padding: 0.5rem 1rem;
                font-size: 1rem;
                cursor: pointer;
                transition: background 0.2s ease-in-out;
            }

            .btn-cerrar:hover {
                background: #ff7424;
            }

            .btn-cerrar:active {
                scale: 0.95;
            }

            @media (max-width: 1400px) {
                .contenedor {
                    grid-template-columns: repeat(5, 1fr);
                }

                .imgSM {
                    width: calc(100% / 4 - 2px);
                }
            }

            @media (max-width: 1200px) {
                .contenedor {
                    grid-template-columns: repeat(4, 1fr);
                }

                .imgSM {
                    width: calc(100% / 3 - 2px);
                }
            }

            @media (max-width: 960px) {
                .contenedor {
                    grid-template-columns: repeat(3, 1fr);
                }

                .imgSM {
                    width: calc(100% / 2 - 2px);
                }
            }

            @media (max-width: 720px) {
                .contenedor {
                    grid-template-columns: repeat(2, 1fr);
                }

                .imgSM {
                    width: calc(100% / 2 - 2px);
                }
            }
        </style>
    @endpush
    {{-- Componete de la pantalla --}}
    {{-- Navegación --}}
    <div class="navegacion">
        <button class="boton_navegacion {{ $selectedFilter === 'all' ? 'seleccionado' : '' }}" wire:click='todosHeroes'>
            <div class="spinner" wire:loading wire:target='todosHeroes, selectHero'></div>
            <span>
                todos
            </span>
        </button>
        <button class="boton_navegacion {{ $selectedFilter === 'tank' ? 'seleccionado' : '' }}" wire:click='soloTank'>
            <div class="spinner" wire:loading wire:target='soloTank'></div>
            <img src="/logos/tankLogo.svg" alt="logo de tank" width="30" height="30" wire:loading.remove
                wire:target='soloTank'>
            <span>
                tank
            </span>
        </button>
        <button class="boton_navegacion {{ $selectedFilter === 'dps' ? 'seleccionado' : '' }}" wire:click='soloDps'>
            <div class="spinner" wire:loading wire:target='soloDps'></div>
            <img src="/logos/dpsLogo.svg" alt="logo de tank" width="30" height="30" wire:loading.remove
                wire:target='soloDps'>
            <span>
                dps
            </span>
        </button>
        <button class="boton_navegacion {{ $selectedFilter === 'supp' ? 'seleccionado' : '' }}" wire:click='soloSupp'>
            <div class="spinner" wire:loading wire:target='soloSupp'></div>
            <img src="/logos/suppLogo.svg" alt="logo de tank" width="30" height="30" wire:loading.remove
                wire:target='soloSupp'>
            <span>
                supp
            </span>
        </button>
    </div>

    {{-- Cartas de pantalla --}}
    <div class="contenedor" wire:loading.remove wire:target='todosHeroes ,soloTank ,soloDps ,soloSupp'>
        @foreach ($heroes as $hero)
            <div class="tarjeta" wire:click="selectHero({{ $hero->id }})" onclick="openModal('heroCounters')">
                <div class="imagen_tarjeta">
                    <img src="{{ $hero->img_path }}" alt="{{ $hero->nombre }}">
                </div>
                <div class="nombre">
                    @if ($hero->rol === 'tank')
                        <img src="/logos/tankLogo.svg" alt="logo de tank" width="30" height="30">
                    @elseif ($hero->rol === 'dps')
                        <img src="/logos/dpsLogo.svg" alt="logo de tank" width="30" height="30">
                    @elseif($hero->rol === 'supp')
                        <img src="/logos/suppLogo.svg" alt="logo de tank" width="30" height="30">
                    @endif
                    <span>
                        {{ $hero->nombre }}
                    </span>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Modal --}}

    <div wire:ignore.self class="modal fade" id="heroCounters" tabindex="-1" role="dialog"
        aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    {{-- Cabecera --}}
                    <div class="titulo_modal" wire:loading.remove wire:target='selectHero'>
                        <img src="{{ $selectedHero->img_path ?? '' }}" alt="{{ $selectedHero->nombre ?? '' }}">
                        <span>{{ $selectedHero->nombre ?? '' }}</span>
                    </div>
                    <div class="head-load" wire:loading wire:target='selectHero, reiniciar'>
                        <div class="spinner"></div>
                        <span>Cargando...</span>
                    </div>

                    <button type="button" class="btn-close" onclick="closeModal('heroCounters')"></button>
                </div>
                <div class="cuerpo modal-body" wire:loading.remove wire:target='selectHero'>
                    {{-- Cuerpo --}}
                    <div class="nota">
                        <span>
                            {{ $selectedHero->nota ?? 'llamen a dios' }}
                        </span>
                    </div>
                    <div class="row contenido-counters">
                        <div class="col-6">
                            <div class="row texto-cuerpo">
                                Counters
                            </div>
                            @foreach ($countersByRol as $rol => $counters)
                                @if (count($counters) > 0)
                                    <div class="row alert alert-danger mb-1 counters py-2 px-0">
                                        <h6 class="nombre_rol text-uppercase d-flex align-items-center">
                                            @if ($rol == 'tank')
                                                <img class="m-0 img_counters"
                                                    src="https://images.blz-contentstack.com/v3/assets/blt9c12f249ac15c7ec/bltcb94e9203be4088a/dark_circle_tank.svg">
                                                <span class="ms-2">TANK</span>
                                            @elseif ($rol == 'dps')
                                                <img class="m-0 img_counters"
                                                    src="https://images.blz-contentstack.com/v3/assets/blt9c12f249ac15c7ec/blt052e8b02aef879b0/dark_circle_damage.svg">
                                                <span class="ms-2">DPS</span>
                                            @elseif($rol == 'supp')
                                                <img class="m-0 img_counters"
                                                    src="https://images.blz-contentstack.com/v3/assets/blt9c12f249ac15c7ec/blt8cf279e9b3126ef8/dark_circle_support.svg">
                                                <span class="ms-2">SUPPORT</span>
                                            @else
                                                <span>*</span>
                                            @endif
                                        </h6>

                                        @foreach ($counters as $counter)
                                            <img class="imgSM py-1" src="{{ $counter->img_path }}"
                                                alt="Imagen de {{ $counter->nombre }}">
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach

                        </div>
                        <div class="col-6">
                            <div class="row texto-cuerpo">
                                es Counter
                            </div>
                            @foreach ($countereasByRol as $rol => $countereas)
                                @if (count($countereas) > 0)
                                    <div class="row alert alert-primary mb-1 counters py-2 px-0">
                                        <h6 class="nombre_rol text-uppercase d-flex align-items-center">
                                            @if ($rol == 'tank')
                                                <img class="m-0 img_counters"
                                                    src="https://images.blz-contentstack.com/v3/assets/blt9c12f249ac15c7ec/bltcb94e9203be4088a/dark_circle_tank.svg">
                                                <span class="ms-2">TANK</span>
                                            @elseif ($rol == 'dps')
                                                <img class="m-0 img_counters"
                                                    src="https://images.blz-contentstack.com/v3/assets/blt9c12f249ac15c7ec/blt052e8b02aef879b0/dark_circle_damage.svg">
                                                <span class="ms-2">DPS</span>
                                            @elseif($rol == 'supp')
                                                <img class="m-0 img_counters"
                                                    src="https://images.blz-contentstack.com/v3/assets/blt9c12f249ac15c7ec/blt8cf279e9b3126ef8/dark_circle_support.svg">
                                                <span class="ms-2">SUPPORT</span>
                                            @else
                                                <span>*</span>
                                            @endif
                                        </h6>

                                        @foreach ($countereas as $counterea)
                                            <img class="imgSM py-1" src="{{ $counterea->img_path }}"
                                                alt="Imagen de {{ $counterea->nombre }}">
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- Boton --}}
                    <button type="button" class="btn-cerrar" onclick="closeModal('heroCounters')"
                        aria-label="Close" aria-hidden="true">
                        Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>


    {{-- Javascript de la pantalla --}}
    @push('scripts')
        <script>
            // function openModal(modalId) {
            //     document.getElementById(modalId).classList.add('show');
            //     document.body.classList.add('overflow-hidden');
            // }
            function openModal(modalId) {
                const modal = document.getElementById(modalId);
                modal.style.display = 'block'; // Asegura que el modal esté en pantalla
                setTimeout(() => modal.classList.add('show'), 10); // Añade la clase de fade-in después de un pequeño retraso
                document.body.classList.add('overflow-hidden');
            }

            // function closeModal(modalId) {
            //     document.getElementById(modalId).classList.remove('show');
            //     document.body.classList.remove('overflow-hidden');

            //     // Emite un evento para que Livewire se reinicie
            //     window.dispatchEvent(new Event('modalClosed'));
            // }
            function closeModal(modalId) {
                const modal = document.getElementById(modalId);
                // Emite un evento para que Livewire se reinicie
                window.dispatchEvent(new Event('modalClosed'));
                modal.classList.remove('show'); // Remueve la clase de fade-out
                document.body.classList.remove('overflow-hidden');

                setTimeout(() => modal.style.display = 'none', 400); // Oculta el modal después de que termine la transición
            }

            // Si hace click fuera del modal, se cierra
            window.onclick = function(event) {
                if (event.target.classList.contains('modal')) {
                    closeModal('heroCounters');
                }
            }
        </script>
    @endpush
</div>
