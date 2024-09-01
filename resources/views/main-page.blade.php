<div>
    <style>
        .texto-nav {
            margin-left: 0.25rem;
        }

        .nav-link {
            justify-content: center;
        }

        .custom-nav-tabs {
            display: flex;
            align-items: center;
            justify-content: center;
            border-bottom: none;

            background: rgba(255, 255, 255, .2);
            /* Desenfoque */
            backdrop-filter: blur(0.5rem);
            /* Desenfoque para navegadores WebKit */
            -webkit-backdrop-filter: blur(0.5rem);

            border-radius: calc(var(--bs-border-radius) - 1px);

            padding: 1%;

        }

        .custom-nav-tabs .nav-item {
            margin: 0 5px;
        }

        .custom-nav-tabs .nav-link {
            font-size: 1.25rem;
            font-weight: bold;
            border: 0.2rem solid rgb(255, 255, 255);
            background-color: #ffffffb2;
            color: rgba(0, 0, 0, 0.548);
            border-radius: 5%;
            padding: 10px 15px;
            transition: all 0.3s ease;
            height: 3rem;
            /* Tamaño de los botones superiores */
            width: 9rem;
            /* Cambia flex-direction a 'row' */
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            text-align: center;
            /* Define un ancho mínimo para el elemento */
            min-width: 100px;
            /* Ajusta este valor según sea necesario */
        }

        /* Estilo de los iconos de rol */
        .img_menu {
            display: flex;
            align-items: center;
            opacity: 0.50;
            mix-blend-mode: multiply;
            width: 1.75rem;
            height: 1.75rem;
        }

        .img_counters {
            opacity: 0.8;
            mix-blend-mode: multiply;
            width: 1.25rem;
            height: 1.25rem;
        }

        .custom-nav-tabs .nav-link.active {
            background-color: white;
            color: #3d3d3d;
            border: 0.2rem solid #ffffff;
        }

        .custom-nav-tabs .nav-link:hover:not(.active) {
            background-color: #ececec;
        }

        .iconRol {
            height: 1rem;
            width: auto;
        }

        .nav-item {
            transition: transform 0.2s ease;
        }

        .nav-item:hover {
            transform: scale(1.01);
        }

        .card {
            transition: transform 0.2s cubic-bezier(0.34, 1.3, 0.86, 1.12);
        }

        .card:hover {
            transform: scale(1.05);
        }

        .imgHero {
            width: 20%;
            height: auto;
        }

        .imgSM {
            width: 10vh;
            height: auto;
            margin: none;
            background: rgb(255, 255, 255, 0.10);
            border-radius: 20%;
        }

        .infoModal {
            /* Fondo del modal */
            background: rgba(0, 0, 0, 0);
        }

        .subtitulo {
            color: #ffffff;
            text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.212);
        }

        .loading {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .counters {
            justify-content: center;
        }

        /* Tarjeta de héroe */
        .tarjeta_heroe {
            border: none;
            background: rgba(230, 244, 255, 0.9);
        }

        .tarjeta_heroe:hover {
            background: rgba(255, 255, 255, 0.9);
        }

        /* Nombre del heroe en el modal */
        .nombreHeroe {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            font-weight: bold;
            gap: 0.5rem;
        }


        /* Transparencia del modal */

        .modal-content {
            /* Fondo semi-transparente */
            background: rgba(233, 245, 255, 0.85);
            /* Desenfoca el fondo */
            backdrop-filter: blur(0.5rem);
            /* Desenfoque para navegadores WebKit */
            -webkit-backdrop-filter: blur(0.5rem);
            /* Sin bordes */
            border: none;
        }

        .modal-header,
        .modal-footer {
            /* Elimina bordes del header y footer */
            border: none;
            /* Fondo semi-transparente */
            background: rgba(233, 245, 255, 0.55);
        }

        /* Alerta del modal */
        .alert-danger {
            background-color: rgba(220, 53, 69, 0.25);
        }

        .alert-primary {
            background-color: rgba(32, 136, 168, 0.25);
        }

        /* Texto del modal */
        .nombre_rol {
            font-weight: bold;
        }

        /* Boton de información */
        .masInfo {
            font-weight: bold;
            color: white;
            background: #F06414;
        }

        .masInfo:hover {
            background: rgb(255, 120, 41);
        }

        /* Responsividad para el diseño de cartas */
        @media (min-width: 1200px) {
            .card-container {
                grid-template-columns: repeat(5, 1fr);
            }

            /* Imagenes del modal */
            .counters {
                display: flex;
                flex-wrap: wrap;
                justify-content: flex-start;
            }

            .counters .imgSM {
                width: calc(100% / 5 - 10px);
                /* 5 imágenes por fila */
                margin: 4px;
            }
        }

        @media (max-width: 1199px) and (min-width: 992px) {
            .card-container {
                grid-template-columns: repeat(4, 1fr);
            }

            /* Imágenes del modal */
            .counters {
                display: flex;
                flex-wrap: wrap;
                justify-content: flex-start;
            }

            .counters .imgSM {
                width: calc(100% / 4 - 10px);
                /* 4 imágenes por fila */
                margin: 4px;
            }
        }

        @media (max-width: 991px) and (min-width: 768px) {
            .card-container {
                grid-template-columns: repeat(3, 1fr);
            }

            /* Imágenes del modal */
            .counters {
                display: flex;
                flex-wrap: wrap;
                justify-content: flex-start;
            }

            .counters .imgSM {
                width: calc(100% / 3 - 10px);
                /* 3 imágenes por fila */
                margin: 4px;
            }
        }

        @media (max-width: 767px) {
            .card-container {
                grid-template-columns: repeat(2, 1fr);
            }

            .nombreHeroe img {
                width: 1.25rem;
                height: auto;
            }

            .card-title {
                text-align: center;
            }

            .nombreHeroe {
                font-size: 1.5rem;
            }

            .card-complex {
                flex-direction: column !important;
            }

            .me-md-2 {
                margin-right: 0 !important;
            }

            .mb-2 {
                margin-bottom: 0.5rem;

            }

            /* Imagenes del modal */
            .counters {
                display: flex;
                flex-wrap: wrap;
                justify-content: flex-start;
            }

            .counters .imgSM {
                width: calc(100% / 2 - 10px);
                /* 2 imágenes por fila */
                margin: 4px;
            }
        }
    </style>


    <div class="container mt-5 mb-5 p-3">

        {{-- Botones de navegación --}}
        <ul class="nav custom-nav-tabs p-1 sticky-top" id="myTab" role="tablist">

            <li class="nav-item py-1 " role="presentation">
                <button class="nav-link rounded-3 {{ $selectedFilter == 'all' ? 'active' : '' }}" id="all-tab"
                    type="button" wire:click="todosHeroes" wire:loading.attr="disabled" wire:target="todosHeroes">
                    <span wire:loading.class="spinner-border spinner-border-sm" wire:target="todosHeroes">
                        <span class="visually-hidden">Cargando...</span>
                    </span>
                    TODOS
                </button>
            </li>

            <li class="nav-item py-1 " role="presentation">
                <button class="nav-link rounded-3 {{ $selectedFilter == 'tank' ? 'active' : '' }}" id="tanque-tab"
                    type="button" wire:click="soloTank" wire:loading.attr="disabled" wire:target="soloTank">
                    <span wire:loading.class="spinner-border spinner-border-sm" wire:target="soloTank">
                        <span class="visually-hidden">Cargando...</span>
                    </span>
                    <span wire:loading.remove>
                        <img class="m-0 img_menu"
                            src="https://images.blz-contentstack.com/v3/assets/blt9c12f249ac15c7ec/bltcb94e9203be4088a/dark_circle_tank.svg">
                    </span>
                    <span class="texto-nav">
                        TANK
                    </span>
                </button>
            </li>

            <li class="nav-item py-1 " role="presentation">
                <button class="nav-link rounded-3 {{ $selectedFilter == 'dps' ? 'active' : '' }}" id="dps-tab"
                    type="button" wire:click="soloDps" wire:loading.attr="disabled" wire:target="soloDps">
                    <span wire:loading.class="spinner-border spinner-border-sm" wire:target="soloDps">
                        <span class="visually-hidden">Cargando...</span>
                    </span>
                    <span wire:loading.remove>
                        <img class="m-0 img_menu"
                            src="https://images.blz-contentstack.com/v3/assets/blt9c12f249ac15c7ec/blt052e8b02aef879b0/dark_circle_damage.svg" />
                    </span>
                    <span class="texto-nav">
                        DPS
                    </span>
                </button>
            </li>

            <li class="nav-item py-1 " role="presentation">
                <button class="nav-link rounded-3 {{ $selectedFilter == 'supp' ? 'active' : '' }}" id="soporte-tab"
                    type="button" wire:click="soloSupp" wire:loading.attr="disabled" wire:target="soloSupp">
                    <span wire:loading.class="spinner-border spinner-border-sm" wire:target="soloSupp">
                        <span class="visually-hidden">Cargando...</span>
                    </span>
                    <span wire:loading.remove>
                        <img class="m-0 img_menu"
                            src="https://images.blz-contentstack.com/v3/assets/blt9c12f249ac15c7ec/blt8cf279e9b3126ef8/dark_circle_support.svg" />
                    </span>
                    <span class="texto-nav">
                        SUPPORT
                    </span>
                </button>
            </li>
        </ul>

        {{-- Subtitulos --}}
        @if ($selectedFilter)
            @if ($selectedFilter == 'tank')
                <h6 class="h5 text-center mt-3 subtitulo">Lista de Counters del rol de tank</h6>
            @elseif ($selectedFilter == 'dps')
                <h6 class="h5 text-center mt-3 subtitulo">Lista de Counters del rol de dps</h6>
            @elseif ($selectedFilter == 'supp')
                <h6 class="h5 text-center mt-3 subtitulo">Lista de Counters del rol de supp</h6>
            @else
                <h6 class="h5 text-center mt-3 subtitulo">Lista de Counters</h6>
            @endif
        @endif

        {{-- Cartas de los Héroes --}}
        <div class="mt-4 card-container" style="display: grid; gap: 20px;">
            @if ($heroes)
                @foreach ($heroes as $heroe)
                    <div class="card shadow-md tarjeta_heroe" style="width: 100%;"
                        wire:click="selectHero({{ $heroe->id }})" data-bs-toggle="modal" data-bs-target="#heroInfo">
                        <img src="{{ $heroe->img_path }}" class="card-img-top" alt="Imagen de {{ $heroe->nombre }}">
                        <div class="card-body">
                            <div class="d-flex align-items-center flex-column flex-md-row card-complex">
                                <div class="me-md-2 mb-2 mb-md-0">
                                    <span class="h6">
                                        @if ($heroe->rol == 'tank')
                                            <img class="img_menu"
                                                src="https://images.blz-contentstack.com/v3/assets/blt9c12f249ac15c7ec/bltcb94e9203be4088a/dark_circle_tank.svg">
                                        @elseif ($heroe->rol == 'dps')
                                            <img class="img_menu"
                                                src="https://images.blz-contentstack.com/v3/assets/blt9c12f249ac15c7ec/blt052e8b02aef879b0/dark_circle_damage.svg" />
                                        @elseif ($heroe->rol == 'supp')
                                            <img class="img_menu"
                                                src="https://images.blz-contentstack.com/v3/assets/blt9c12f249ac15c7ec/blt8cf279e9b3126ef8/dark_circle_support.svg" />
                                        @else
                                            *
                                        @endif
                                    </span>
                                </div>
                                <div>
                                    <h5 class="card-title text-uppercase mb-0">{{ $heroe->nombre }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>


        {{-- Modal de información --}}
        <div wire:ignore.self class="modal fade infoModal" id="heroInfo" tabindex="-1" aria-labelledby="heroInfoLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img class="img-thumbnail imgHero me-3" src="{{ $selectedHero->img_path ?? '' }}"
                                alt="{{ $selectedHero->nombre ?? '' }}" style="width: 100px; height: auto;">
                            <h1 class="modal-title display-4 nombreHeroe text-uppercase"
                                wire:loading.class="loading-modal-title">
                                @if (!$selectedHero)
                                    <div class="spinner-border text-primary me-2 border-4" role="status">
                                        <span class="visually-hidden">Cargando...</span>
                                    </div>
                                @elseif($selectedHero->rol == 'tank')
                                    <img
                                        src="https://images.blz-contentstack.com/v3/assets/blt9c12f249ac15c7ec/bltcb94e9203be4088a/dark_circle_tank.svg">
                                @elseif ($selectedHero->rol == 'dps')
                                    <img
                                        src="https://images.blz-contentstack.com/v3/assets/blt9c12f249ac15c7ec/blt052e8b02aef879b0/dark_circle_damage.svg" />
                                @elseif ($selectedHero->rol == 'supp')
                                    <img
                                        src="https://images.blz-contentstack.com/v3/assets/blt9c12f249ac15c7ec/blt8cf279e9b3126ef8/dark_circle_support.svg" />
                                @endif
                                {{ $selectedHero->nombre ?? '' }}
                            </h1>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body" wire:loading.class="loading">
                        <div wire:loading>
                            <div class="spinner-border text-primary me-2" role="status">
                                <span class="visually-hidden">Cargando...</span>
                            </div>
                            {{-- <p class="mt-2">Cargando información del héroe...</p> --}}
                        </div>
                        <div wire:loading.remove>
                            <div class="row">
                                <div class="col-6">
                                    <div class="row">
                                        <h1 class="h5">Counters</h1>
                                        <h6>(Es malo contra:)</h6>
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
                                    <div class="row">
                                        <h1 class="h5">Es Counter</h1>
                                        <h6>(Es bueno contra:)</h6>
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn masInfo">Más Información</button>
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
