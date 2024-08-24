<div>
    <style>
        .custom-nav-tabs {
            display: flex;
            justify-content: center;
            border-bottom: none;
            background: rgba(255, 255, 255, 0.178);
            padding: 1%;
        }

        .custom-nav-tabs .nav-item {
            margin: 0 10px;
        }

        .custom-nav-tabs .nav-link {
            font-size: 1.25rem;
            font-weight: bold;
            border: 0.2rem solid rgb(255, 255, 255);
            background-color: #ffffffb2;
            color: rgba(0, 0, 0, 0.548);
            border-radius: 5%;
            padding: 10px 20px;
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .custom-nav-tabs .nav-link img {
            margin-bottom: 5px;
            width: 24px;
            height: 24px;
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
            height: 1.5rem;
            width: auto;
        }

        .card {
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: scale(1.1);
        }

        .imgHero {
            width: 10%;
            height: auto;
        }

        .imgSM {
            width: 20%;
            height: auto;
        }
    </style>

    <div class="container mt-5 mb-5 p-3">
        <ul class="nav custom-nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $selectedFilter == 'all' ? 'active' : '' }}" id="all-tab" type="button"
                    wire:click="todosHeroes">
                    TODOS
                </button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $selectedFilter == 'tank' ? 'active' : '' }}" id="tanque-tab" type="button"
                    wire:click="soloTank">
                    <svg class="iconRol" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-shield-fill" viewBox="0 0 16 16">
                        <path
                            d="M5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.8 11.8 0 0 1-2.517 2.453 7 7 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7 7 0 0 1-1.048-.625 11.8 11.8 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 63 63 0 0 1 5.072.56" />
                    </svg>
                    TANQUE
                </button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $selectedFilter == 'dps' ? 'active' : '' }}" id="dps-tab" type="button"
                    wire:click="soloDps">
                    <svg class="iconRol" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-crosshair" viewBox="0 0 16 16">
                        <path
                            d="M8.5.5a.5.5 0 0 0-1 0v.518A7 7 0 0 0 1.018 7.5H.5a.5.5 0 0 0 0 1h.518A7 7 0 0 0 7.5 14.982v.518a.5.5 0 0 0 1 0v-.518A7 7 0 0 0 14.982 8.5h.518a.5.5 0 0 0 0-1h-.518A7 7 0 0 0 8.5 1.018zm-6.48 7A6 6 0 0 1 7.5 2.02v.48a.5.5 0 0 0 1 0v-.48a6 6 0 0 1 5.48 5.48h-.48a.5.5 0 0 0 0 1h.48a6 6 0 0 1-5.48 5.48v-.48a.5.5 0 0 0-1 0v.48A6 6 0 0 1 2.02 8.5h.48a.5.5 0 0 0 0-1zM8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                    </svg>
                    DAÑO
                </button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $selectedFilter == 'supp' ? 'active' : '' }}" id="soporte-tab" type="button"
                    wire:click="soloSupp">
                    <svg class="iconRol" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                    </svg>
                    SOPORTE
                </button>
            </li>
        </ul>

        <div class="mt-5" style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 20px;">
            @if ($heroes)
                @foreach ($heroes as $heroe)
                    <div class="card shadow-lg" style="width: 100%;" wire:click="selectHero({{ $heroe->id }})"
                        data-bs-toggle="modal" data-bs-target="#heroInfo">
                        <img src="{{ $heroe->img_path }}" class="card-img-top" alt="Imagen de {{ $heroe->nombre }}">
                        <div class="card-body">
                            <div class="row items-center">
                                <div class="col-2">
                                    <span class="h6">
                                        @if ($heroe->rol == 'tank')
                                            <svg class="iconRol" xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="currentColor" class="bi bi-shield-fill"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.8 11.8 0 0 1-2.517 2.453 7 7 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7 7 0 0 1-1.048-.625 11.8 11.8 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 63 63 0 0 1 5.072.56" />
                                            </svg>
                                        @elseif ($heroe->rol == 'dps')
                                            <svg class="iconRol" xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="currentColor" class="bi bi-crosshair"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M8.5.5a.5.5 0 0 0-1 0v.518A7 7 0 0 0 1.018 7.5H.5a.5.5 0 0 0 0 1h.518A7 7 0 0 0 7.5 14.982v.518a.5.5 0 0 0 1 0v-.518A7 7 0 0 0 14.982 8.5h.518a.5.5 0 0 0 0-1h-.518A7 7 0 0 0 8.5 1.018zm-6.48 7A6 6 0 0 1 7.5 2.02v.48a.5.5 0 0 0 1 0v-.48a6 6 0 0 1 5.48 5.48h-.48a.5.5 0 0 0 0 1h.48a6 6 0 0 1-5.48 5.48v-.48a.5.5 0 0 0-1 0v.48A6 6 0 0 1 2.02 8.5h.48a.5.5 0 0 0 0-1zM8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                                            </svg>
                                        @elseif ($heroe->rol == 'supp')
                                            <svg class="iconRol" xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="currentColor" class="bi bi-plus-circle"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                <path
                                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                            </svg>
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
        <div wire:ignore.self class="modal fade" id="heroInfo" tabindex="-1" aria-labelledby="heroInfoLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img class="img-thumbnail imgHero me-3" src="{{ $selectedHero->img_path ?? '' }}"
                                alt="Imagen del héroe" style="width: 100px; height: auto;">
                            <h1 class="modal-title display-4">{{ $selectedHero->nombre ?? '' }}</h1>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <h1 class="display-6">Counters</h1>
                                </div>
                                <div class="row alert alert-danger p-2">
                                    @if ($counters)
                                        @foreach ($counters as $counter)
                                            <img class="imgSM" src="{{ $counter->img_path }}"
                                                alt="Imagen de {{ $counter->nombre }}">
                                        @endforeach
                                    @else
                                        No hay registros
                                    @endif
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <h1 class="display-6">Counter</h1>
                                </div>
                                <div class="row alert alert-success p-2">
                                    @if ($countereas)
                                        @foreach ($countereas as $counterea)
                                            <img class="imgSM" src="{{ $counterea->img_path }}"
                                                alt="Imagen de {{ $counterea->nombre }}">
                                        @endforeach
                                    @else
                                        No hay registros
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
