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
                <div class="tier_row">
                    <div class="tier_row_head" style="background-color: {{ $tier['color'] }};" contenteditable="true"
                        data-tier-index="{{ $tierIndex }}">
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
    <div class="modal-bg" id="modal-tier">
        <div class="modal-aux">
            <article class="modal-content">
                <header>
                    <h2>Editando Tier</h2>
                    <button onclick="cerrarModal('modal-tier')">×</button>
                </header>
                <section>
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Nombre del tier">
                    <label for="color">Color:</label>
                    <input class="color-tier" type="color" id="color" name="color" placeholder="Color del tier">
                    <input type="hidden" id="tierIndex" name="tierIndex">

                    <div class="colores-predefinidos">
                        @foreach (['#FF7F7F', '#FFBF7F', '#FFDF7F', '#FFFF7F', '#BFFF7F', '#7FFF7F', '#7FFFFF', '#7FBFFF', '#7F7FFF', '#FF7FFF', '#BF7FBF', '#3B3B3B', '#858585', '#CFCFCF', '#F7F7F7'] as $color)
                            <button class="color-predefinido" style="background-color: {{ $color }}"
                                onclick="seleccionarColorPredefinido('{{ $color }}')"></button>
                        @endforeach
                    </div>
                    <div class="acciones-tier">
                        <button class="accion_btn"
                            onclick="moverTier(document.getElementById('tierIndex').value, 'arriba')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-square-arrow-up">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M16 12l-4 -4l-4 4" />
                                <path d="M12 16v-8" />
                                <path
                                    d="M3 3m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                            </svg>
                            Subir Tier</button>
                        <button class="accion_btn"
                            onclick="moverTier(document.getElementById('tierIndex').value, 'abajo')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-square-arrow-down">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8 12l4 4l4 -4" />
                                <path d="M12 8v8" />
                                <path
                                    d="M3 3m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                            </svg>
                            Bajar Tier
                        </button>
                    </div>
                    <div class="acciones-tier">
                        <button class="accion_btn" onclick="vaciarTier(document.getElementById('tierIndex').value)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-wash-dry-shade">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M3 3m0 3a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3z" />
                                <path d="M3 11l8 -8" />
                                <path d="M3 17l14 -14" />
                            </svg>
                            Vaciar Tier</button>
                        <button class="accion_btn" onclick="eliminarTier(document.getElementById('tierIndex').value)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-trash-x">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 7h16" />
                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                <path d="M10 12l4 4m0 -4l-4 4" />
                            </svg>
                            Eliminar Tier</button>
                    </div>
                    <div class="acciones-tier">
                        <button class="accion_btn"
                            onclick="agregarTier(document.getElementById('tierIndex').value, 'arriba')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-swipe-up">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 16m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                <path d="M12 12v-8" />
                                <path d="M9 7l3 -3l3 3" />
                            </svg>
                            Añadir tier arriba</button>
                        <button class="accion_btn"
                            onclick="agregarTier(document.getElementById('tierIndex').value, 'abajo')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-swipe-down">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 4a4 4 0 1 1 0 8a4 4 0 0 1 0 -8z" />
                                <path d="M12 12v8" />
                                <path d="M9 17l3 3l3 -3" />
                            </svg>
                            Añadir tier abajo</button>
                    </div>
                </section>
                <footer>
                    <button class="btn_resaltado" onclick="guardarCambiosTier()">Guardar</button>
                </footer>
            </article>
        </div>
    </div>

    {{-- Modal para guardar la tierlist --}}

    <div class="modal-bg" id="modal-guardar">
        <div class="modal-aux">
            <div class="modal-content cont-save">
                <h2>Guardando Tierlist</h2>
                <button id="btn-guardar-png" class="accion_btn">Guardar en PNG</button>
                @auth
                    <button class="accion_btn">guardar en la base de datos</button>
                @endauth
                <button class="btn_resaltado" onclick="cerrarModal('modal-guardar')"
                    style="font-size: 1.5rem">×</button>
            </div>
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

        // Funciones para abrir y cerrar modales
        function abrirModal(modalId) {
            let modal = document.getElementById(modalId);
            let modalContent = modal.querySelector('.modal-content');
            document.body.style.overflow = 'hidden';
            modal.style.display = 'block';
            modal.classList.add('mostrar');
            modalContent.classList.remove('oculto');
        }

        function cerrarModal(modalId) {
            let modal = document.getElementById(modalId);
            let modalContent = modal.querySelector('.modal-content');
            modalContent.classList.add('oculto');

            setTimeout(function() {
                document.body.style.overflow = 'auto';
                modal.style.display = 'none';
                modal.classList.remove('mostrar'); // Eliminar la clase "mostrar"
            }, 200);
        }

        // Detectar click fuera del modal de editar
        const modalTier = document.getElementById('modal-tier');
        modalTier.addEventListener('click', (e) => {
            if (e.target.className === 'modal-aux') {
                cerrarModal('modal-tier');
            }
        });

        // Detectar click fuera del modal de guardar
        const modalGuardar = document.getElementById('modal-guardar');
        modalGuardar.addEventListener('click', (e) => {
            if (e.target.className === 'modal-aux') {
                cerrarModal('modal-guardar');
            }
        });

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

                let nombreTier = "";
                if (tier.previousElementSibling) {
                    nombreTier = tier.previousElementSibling.textContent.trim();
                }

                tierlistData.push({
                    tier_index: tierIndex,
                    entries: tierEntries,
                    nombre: nombreTier, // Usar la variable nombreTier
                    color: tier.dataset.color
                });
            });
            console.log(tierlistData);

            

            // Abrir modal para guardar la tierlist
            abrirModal('modal-guardar');
        }

        function editarTier(tierIndex) {
            //Cargar datos del tier
            let tier = document.getElementById(`tier-${tierIndex}`);
            let nombreTier = tier.previousElementSibling.textContent.trim();
            let colorTier = tier.dataset.color;

            // Asignar valores a los inputs del modal
            document.getElementById('nombre').value = nombreTier;
            document.getElementById('color').value = colorTier;
            document.getElementById('tierIndex').value = tierIndex;

            abrirModal('modal-tier');
        }

        function guardarCambiosTier() {
            let tierIndex = document.getElementById('tierIndex').value;
            let nuevoNombre = document.getElementById('nombre').value;
            let nuevoColor = document.getElementById('color').value;

            // Actualizar el nombre y color del tier en el DOM
            let tier = document.getElementById(`tier-${tierIndex}`);
            tier.previousElementSibling.textContent = nuevoNombre;
            tier.dataset.color = nuevoColor;
            tier.previousElementSibling.style.backgroundColor = nuevoColor;

            cerrarModal('modal-tier');
        }

        function seleccionarColorPredefinido(color) {
            document.getElementById('color').value = color;
        }

        function vaciarTier(tierIndex) {
            let tier = document.getElementById(`tier-${tierIndex}`);
            let footer = document.getElementById('heroes-disponibles');

            // Mover todos los héroes del tier al footer
            while (tier.firstChild) {
                footer.appendChild(tier.firstChild);
            }

            actualizarPosiciones();
        }

        function eliminarTier(tierIndex) {
            let tier = document.getElementById(`tier-${tierIndex}`);
            let tierRowHead = tier.previousElementSibling;
            let tierRowControl = tier.nextElementSibling;

            // Mover todos los héroes del tier al footer
            vaciarTier(tierIndex);

            // Eliminar el tier del DOM (incluyendo el contenido)
            tier.parentNode.remove(); // Eliminar el contenedor tier_row completo

            cerrarModal('modal-tier');

            actualizarPosicionesTiers();

        }

        function agregarTier(tierIndex, direccion) {
            let tier = document.getElementById(`tier-${tierIndex}`);
            let nuevoTierIndex = parseInt(tierIndex) + (direccion === 'arriba' ? 0 : 1); // Calcular el nuevo índice

            // Crear los elementos del nuevo tier
            let nuevoTierRow = document.createElement('div');
            nuevoTierRow.classList.add('tier_row');

            let nuevoTierRowHead = document.createElement('div');
            nuevoTierRowHead.classList.add('tier_row_head');
            nuevoTierRowHead.style.backgroundColor = tier.dataset.color;
            nuevoTierRowHead.textContent = 'Nuevo Tier'; // Puedes establecer un nombre por defecto

            let nuevoTierRowContent = document.createElement('div');
            nuevoTierRowContent.classList.add('tier_row_content');
            nuevoTierRowContent.id = `tier-${nuevoTierIndex}`;
            nuevoTierRowContent.dataset.tierIndex = nuevoTierIndex;
            nuevoTierRowContent.dataset.color = tier.dataset.color;

            let nuevoTierRowControl = document.createElement('div');
            nuevoTierRowControl.classList.add('tier_row_control');
            let nuevoBotonEditar = document.createElement('button');
            nuevoBotonEditar.innerHTML =
                '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-settings"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14.647 4.081a.724 .724 0 0 0 1.08 .448c2.439 -1.485 5.23 1.305 3.745 3.744a.724 .724 0 0 0 .447 1.08c2.775 .673 2.775 4.62 0 5.294a.724 .724 0 0 0 -.448 1.08c1.485 2.439 -1.305 5.23 -3.744 3.745a.724 .724 0 0 0 -1.08 .447c-.673 2.775 -4.62 2.775 -5.294 0a.724 .724 0 0 0 -1.08 -.448c-2.439 1.485 -5.23 -1.305 -3.745 -3.744a.724 .724 0 0 0 -.447 -1.08c-2.775 -.673 -2.775 -4.62 0 -5.294a.724 .724 0 0 0 .448 -1.08c-1.485 -2.439 1.305 -5.23 3.744 -3.745a.722 .722 0 0 0 1.08 -.447c.673 -2.775 4.62 -2.775 5.294 0zm-2.647 4.919a3 3 0 1 0 0 6a3 3 0 0 0 0 -6z"/></svg>'; // Agrega el SVG del botón de editar
            nuevoBotonEditar.onclick = function() {
                editarTier(nuevoTierIndex);
            };
            nuevoTierRowControl.appendChild(nuevoBotonEditar);

            // Agregar los elementos al nuevo tier row
            nuevoTierRow.appendChild(nuevoTierRowHead);
            nuevoTierRow.appendChild(nuevoTierRowContent);
            nuevoTierRow.appendChild(nuevoTierRowControl);

            // Insertar el nuevo tier en el DOM
            let tierRow = tier.parentNode;
            if (direccion === 'arriba') {
                tierRow.parentNode.insertBefore(nuevoTierRow, tierRow);
            } else {
                tierRow.parentNode.insertBefore(nuevoTierRow, tierRow.nextSibling);
            }

            // Agregar event listeners a los tier_row_head para detectar cambios
            document.querySelectorAll('.tier_row_head').forEach(tierHead => {
                tierHead.addEventListener('input', function() {
                    guardarNombreTier(this);
                });
            });

            // Función para guardar el nombre del tier en el dataset
            function guardarNombreTier(tierHead) {
                let tierIndex = tierHead.dataset.tierIndex;
                document.getElementById(`tier-${tierIndex}`).previousElementSibling.textContent = tierHead.textContent
                .trim();
            }

            // Inicializar Sortable.js para el nuevo tier
            new Sortable(nuevoTierRowContent, {
                group: 'shared',
                animation: 150,
                onEnd: function(evt) {
                    actualizarPosiciones();
                }
            });

            actualizarPosicionesTiers();
        }


        function moverTier(tierIndex, direccion) {
            let tierRow = document.getElementById(`tier-${tierIndex}`).parentNode; // Obtener el contenedor de la fila

            if (direccion === 'arriba' && tierRow.previousElementSibling) {
                tierRow.parentNode.insertBefore(tierRow, tierRow.previousElementSibling);
            } else if (direccion === 'abajo' && tierRow.nextElementSibling) {
                tierRow.parentNode.insertBefore(tierRow.nextElementSibling, tierRow);
            }

            actualizarPosicionesTiers();
        }

        function actualizarPosicionesTiers() {
            let tierRows = document.querySelectorAll('.tier_row_content'); // Seleccionar todos los tier_row_content
            tierRows.forEach((tierRow, index) => {
                tierRow.dataset.tierIndex = index; // Actualizar el data-tier-index
            });
        }

        function guardarNuevoNombreTier(tierHead, nuevoNombre) {
            // Reemplazar el input con el nuevo nombre
            tierHead.innerHTML = nuevoNombre;
        }
    </script>
</div>
