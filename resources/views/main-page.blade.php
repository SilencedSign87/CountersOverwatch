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
            background: rgba(255, 255, 255, 0.178);
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

        .custom-nav-tabs .nav-link img {
            margin-bottom: 5px;
            width: 20px;
            height: 20px;
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
            transition: transform 0.2s ease;
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
            justify-content: space-around;
        }

        /* Tarjeta de héroe */
        .tarjeta_heroe {
            border:none;
        }

        /* Nombre del heroe en el modal */
        .nombreHeroe {
            font-weight: bold;
        }
        /


        /* Transparencia del modal */

        .modal-content {
            background: rgba(255, 255, 255, 0.75);
            /* Fondo semi-transparente */
            backdrop-filter: blur(2rem);
            /* Desenfoca el fondo */
            -webkit-backdrop-filter: blur(2rem);
            /* Desenfoque para navegadores WebKit */
            border: none;
            /* Sin bordes */
        }

        .modal-header,
        .modal-footer {
            border: none;
            /* Elimina bordes del header y footer */
            background: rgba(255, 255, 255, 0.4);
            /* Fondo semi-transparente */
        }

        /* Alerta del modal */
        .alert-danger {
            background-color: rgba(220, 53, 69, 0.25);
            /* El último valor (0.5) es la transparencia */
        }

        .alert-success {
            background-color: rgba(25, 135, 84, 0.25);
        }
        /* Texto del modal */
        .nombre_rol{
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
        }

        @media (max-width: 1199px) and (min-width: 992px) {
            .card-container {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        @media (max-width: 991px) and (min-width: 768px) {
            .card-container {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 767px) {
            .card-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>


    <div class="container mt-5 mb-5 p-3">

        {{-- Botones de navegación --}}
        <ul class="nav custom-nav-tabs p-1" id="myTab" role="tablist">

            <li class="nav-item py-1" role="presentation">
                <button class="nav-link {{ $selectedFilter == 'all' ? 'active' : '' }}" id="all-tab" type="button"
                    wire:click="todosHeroes" wire:loading.attr="disabled" wire:target="todosHeroes">
                    <span wire:loading.class="spinner-border spinner-border-sm" wire:target="todosHeroes">
                        <span class="visually-hidden">Cargando...</span>
                    </span>
                    <span>TODOS</span>
                </button>
            </li>

            <li class="nav-item py-1" role="presentation">
                <button class="nav-link {{ $selectedFilter == 'tank' ? 'active' : '' }}" id="tanque-tab" type="button"
                    wire:click="soloTank" wire:loading.attr="disabled" wire:target="soloTank">
                    <span wire:loading.class="spinner-border spinner-border-sm" wire:target="soloTank">
                        <span class="visually-hidden">Cargando...</span>
                    </span>
                    <span wire:loading.remove>
                        <i class="bi bi-shield-fill"></i>
                    </span>
                    <span class="texto-nav">
                        TANQUE
                    </span>
                </button>
            </li>

            <li class="nav-item py-1" role="presentation">
                <button class="nav-link {{ $selectedFilter == 'dps' ? 'active' : '' }}" id="dps-tab" type="button"
                    wire:click="soloDps" wire:loading.attr="disabled" wire:target="soloDps">
                    <span wire:loading.class="spinner-border spinner-border-sm" wire:target="soloDps">
                        <span class="visually-hidden">Cargando...</span>
                    </span>
                    <span wire:loading.remove><i class="bi bi-crosshair"></i>
                    </span>
                    <span class="texto-nav">
                        DAÑO
                    </span>
                </button>
            </li>

            <li class="nav-item py-1" role="presentation">
                <button class="nav-link {{ $selectedFilter == 'supp' ? 'active' : '' }}" id="soporte-tab" type="button"
                    wire:click="soloSupp" wire:loading.attr="disabled" wire:target="soloSupp">
                    <span wire:loading.class="spinner-border spinner-border-sm" wire:target="soloSupp">
                        <span class="visually-hidden">Cargando...</span>
                    </span>
                    <span wire:loading.remove><i class="bi bi-plus-circle"></i>
                    </span>
                    <span class="texto-nav">
                        SOPORTE
                    </span>
                </button>
            </li>
        </ul>

        {{-- Subtitulos --}}
        @if ($selectedFilter)
            @if ($selectedFilter == 'tank')
                <h6 class="h5 text-center mt-3 subtitulo">Lista de Counters del rol de tanque</h6>
            @elseif ($selectedFilter == 'dps')
                <h6 class="h5 text-center mt-3 subtitulo">Lista de Counters del rol de daño</h6>
            @elseif ($selectedFilter == 'supp')
                <h6 class="h5 text-center mt-3 subtitulo">Lista de Counters del rol de apoyo</h6>
            @else
                <h6 class="h5 text-center mt-3 subtitulo">Todos los héroes</h6>
            @endif
        @endif

        {{-- Cartas de los Héroes --}}
        <div class="mt-4 card-container" style="display: grid; gap: 20px;">
            @if ($heroes)
                @foreach ($heroes as $heroe)
                    <div class="card shadow-lg tarjeta_heroe" style="width: 100%;"
                        wire:click="selectHero({{ $heroe->id }})" data-bs-toggle="modal" data-bs-target="#heroInfo">
                        <img src="{{ $heroe->img_path }}" class="card-img-top" alt="Imagen de {{ $heroe->nombre }}">
                        <div class="card-body">
                            <div class="row items-center">
                                <div class="col-2">
                                    <span class="h6">
                                        @if ($heroe->rol == 'tank')
                                            <i class="bi bi-shield-fill"></i>
                                        @elseif ($heroe->rol == 'dps')
                                            <i class="bi bi-crosshair"></i>
                                        @elseif ($heroe->rol == 'supp')
                                            <i class="bi bi-plus-circle"></i>
                                        @else
                                            *
                                        @endif
                                    </span>
                                </div>
                                <div class="col">
                                    <h5 class="card-title text-left h5">{{ $heroe->nombre }}</h5>
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
                                alt="Imagen del héroe" style="width: 100px; height: auto;">
                            <h1 class="modal-title display-4 nombreHeroe" wire:loading.class="loading-modal-title">
                                {{ $selectedHero->nombre ?? '' }}</h1>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" wire:loading.class="loading">
                        <div wire:loading>
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Cargando...</span>
                            </div>
                            <p class="mt-2">Cargando información del héroe...</p>
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
                                            <div class="row alert alert-danger mb-1 counters">
                                                {{-- <h6>Rol: {{ $rol }}</h6> --}}
                                                <h6 class="nombre_rol text-uppercase">
                                                    @if ($rol == 'tank')
                                                        <i class="bi bi-shield-fill"></i> Tanque
                                                    @elseif ($rol == 'dps')
                                                        <i class="bi bi-crosshair"></i> Daño
                                                    @elseif($rol == 'supp')
                                                        <i class="bi bi-plus-circle"></i> Soporte
                                                    @else
                                                        <span>*</span>
                                                    @endif
                                                    
                                                </h6>

                                                @foreach ($counters as $counter)
                                                    <img class="imgSM p-1" src="{{ $counter->img_path }}"
                                                        alt="Imagen de {{ $counter->nombre }}">
                                                @endforeach
                                                {{-- @else
                                                No hay registros --}}

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
                                            <div class="row alert alert-success mb-1 counters">
                                                {{-- <h6>Rol: {{ $rol }}</h6> --}}
                                                <h6 class="nombre_rol text-uppercase">
                                                    @if ($rol == 'tank')
                                                        <i class="bi bi-shield-fill"></i> Tanque
                                                    @elseif ($rol == 'dps')
                                                        <i class="bi bi-crosshair"></i> Daño
                                                    @elseif($rol == 'supp')
                                                        <i class="bi bi-plus-circle"></i> Soporte
                                                    @else
                                                        <span>*</span>
                                                    @endif
                                                    
                                                </h6>

                                                @foreach ($countereas as $counterea)
                                                    <img class="imgSM p-1" src="{{ $counterea->img_path }}"
                                                        alt="Imagen de {{ $counterea->nombre }}">
                                                @endforeach
                                                {{-- @else
                                                No hay registros --}}

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
