<div>
    <title>Tierlist Maker</title>
    
    <link rel="stylesheet" href="tierlist-maker.css">

    <header class="tier-header">
        <nav class="barra-navegacion">
            <a href="/tierlist">
                <button class="boton-navegacion">
                    Ver Tierlist
                </button>
            </a>
            <a href="/tierlist-maker">
                <button class="boton-navegacion filtro-seleccionado">
                    Hacer Tierlist
                </button>
            </a>
        </nav>
    </header>

    <main class="tier-contenedor">
        <header>
            <nav class="filtro-navegacion">
                <button class="filtro-t-selected" onclick="filtrarPorRol(null)">Todos</button>
                <button onclick="filtrarPorRol('tank')" class="">Tank</button>
                <button onclick="filtrarPorRol('dps')" class="">DPS</button>
                <button onclick="filtrarPorRol('supp')" class="}">Support</button>
            </nav>
        </header>

        <button onclick="guardarTierlist()" class="btn_guardar">Guardar Tierlist</button>

        <article class="tierlist">
            @foreach ($tiers as $tierIndex => $tier)
                <div class="tier_row_head" style="background-color: {{ $tier['color'] }};">
                    {{ $tier['nombre'] }}
                </div>
                <div class="tier_row_content" id="tier-{{ $tierIndex }}" data-tier-index="{{ $tierIndex }}"
                    data-color="{{ $tier['color'] }}">
                    @foreach ($tier['entries'] as $entryIndex => $entry)
                        <img src="{{ $entry['img_path'] }}" alt="{{ $entry['nombre'] }}" class="imagen_heroe"
                            title="{{ $entry['nombre'] }}" data-hero-id="{{ $entry['id'] }}"
                            data-index="{{ $entryIndex }}">
                    @endforeach
                </div>
                <div class="tier_row_control">
                    <button onclick="editarTier({{ $tierIndex }})">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-settings">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M14.647 4.081a.724 .724 0 0 0 1.08 .448c2.439 -1.485 5.23 1.305 3.745 3.744a.724 .724 0 0 0 .447 1.08c2.775 .673 2.775 4.62 0 5.294a.724 .724 0 0 0 -.448 1.08c1.485 2.439 -1.305 5.23 -3.744 3.745a.724 .724 0 0 0 -1.08 .447c-.673 2.775 -4.62 2.775 -5.294 0a.724 .724 0 0 0 -1.08 -.448c-2.439 1.485 -5.23 -1.305 -3.745 -3.744a.724 .724 0 0 0 -.447 -1.08c-2.775 -.673 -2.775 -4.62 0 -5.294a.724 .724 0 0 0 .448 -1.08c-1.485 -2.439 1.305 -5.23 3.744 -3.745a.722 .722 0 0 0 1.08 -.447c.673 -2.775 4.62 -2.775 5.294 0zm-2.647 4.919a3 3 0 1 0 0 6a3 3 0 0 0 0 -6z" />
                        </svg>
                    </button>
                </div>
            @endforeach
        </article>

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

    {{-- Modal para editar los valores del row --}}
    <div class="modal-bg">
        <div class="modal-aux">
            <article class="modal-content">
                <header>
                    Aquí se mostrará el modal
                    <button onclick="cerrarModal()">Cerrar</button>
                </header>
            </article>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

    <script>
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
                    entries: tierEntries,
                    color: tier.dataset.color
                });
            });
            console.log(tierlistData);

        }

        function editarTier(tierIndex) {
            console.log(tierIndex);
            // Abrir el modal
            let modal = document.querySelector('.modal-bg');
            document.body.style.overflow = 'hidden';
            modal.style.display = 'block';
        }

        function cerrarModal() {
            let modal = document.querySelector('.modal-bg');
            document.body.style.overflow = 'auto';
            modal.style.display = 'none';
        }

        // detectar click fuera de de la ventana modal
        const modalbg = document.querySelector('.modal-bg');
        modalbg.addEventListener('click', (e) => {
            if (e.target.className !== 'modal-bg') {
                cerrarModal();
            }
        });
    </script>
</div>
