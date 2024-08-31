<div>
    <style>
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
            width: 13rem;
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
            transform: scale(1.02);
        }

        .loading {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
    </style>

    <div class="container mt-5 mb-5 p-3">

        <ul class="nav custom-nav-tabs p-2" id="myTab" role="tablist">            
            
            <li class="nav-item py-1" role="presentation">
                <button class="nav-link {{ $Modo == 'heroe' ? 'active' : '' }}" id="dps-tab" type="button"
                    wire:click="nuevoHeroe" wire:loading.attr="disabled" wire:target="nuevoHeroe">
                    <span wire:loading wire:target="nuevoHeroe" class="spinner-border spinner-border-sm" role="status"
                        aria-hidden="true"></span>
                    <span class="texto-nav">Editar Héroes</span>
                </button>
            </li>

            <li class="nav-item py-1" role="presentation">
                <button class="nav-link {{ $Modo == 'counters' ? 'active' : '' }}" id="all-tab" type="button"
                    wire:click="editCounter" wire:loading.attr="disabled" wire:target="editCounter">
                    <span wire:loading wire:target="editCounter" class="spinner-border spinner-border-sm" role="status"
                        aria-hidden="true"></span>
                    Editar Counters
                </button>
            </li>


            <li class="nav-item py-1" role="presentation">
                <button class="nav-link {{ $Modo == 'algo' ? 'active' : '' }}" id="soporte-tab" type="button"
                    wire:click="algo" wire:loading.attr="disabled" wire:target="algo">
                    <span wire:loading wire:target="algo" class="spinner-border spinner-border-sm" role="status"
                        aria-hidden="true"></span>
                    <span class="texto-nav">Salir</span>
                </button>
            </li>

        </ul>
        
    </div>

    {{-- llama a los componentes --}}
    @if ($Modo && $Modo == 'counters')
        @livewire('EditarCounters')
    @elseif ($Modo && $Modo == 'heroe')
        @livewire('AddHero')
    @endif
</div>
