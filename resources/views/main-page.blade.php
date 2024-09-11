      <div>
          {{-- Estilos de la pantalla --}}
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

                  /* General styles */
                  .desbordamiento-oculto {
                      overflow: hidden;
                  }

                  /* Navigation styles */
                  .barra-navegacion {
                      margin: 1rem 0;
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

                  /* Grid container styles */
                  .rejilla-contenedor {
                      display: grid;
                      grid-template-columns: repeat(6, minmax(150px, 225px));
                      gap: 1vw;
                      margin: 0.5rem;
                      max-width: calc(100% - 1rem);
                      justify-content: center;
                  }

                  /* Card styles */
                  .tarjeta-heroe {
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

                  .tarjeta-heroe:hover {
                      background: hsla(0, 0%, 100%, 0.9);
                      scale: 1.05;
                  }

                  .tarjeta-heroe:active {
                      background: hsla(0, 0%, 100%, 1);
                      scale: 1;
                  }

                  .imagen-tarjeta img {
                      display: block;
                      width: 100%;
                      height: 100%;
                      object-fit: cover;
                  }

                  .nombre-heroe {
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
                  .ventana-modal {
                      display: none;
                      position: fixed;
                      z-index: 1050;
                      left: 0;
                      top: 0;
                      width: 100%;
                      height: 100%;
                      background-color: rgba(0, 0, 0, 0.5);
                      transition: opacity 0.5s ease;
                  }

                  .ventana-modal.show {
                      display: block;
                      opacity: 1;
                  }

                  /* Animaciónes del modal */
                  .ventana-modal.show .contenido-modal {
                      /* Se aplica la animación al contenido */
                      animation: slideIn 0.3s ease-in-out forwards;
                  }

                  .ventana-modal .contenido-modal {
                      /* Estado inicial del contenido */
                      transform: translateY(-100%);
                  }

                  @keyframes slideIn {
                      0% {
                          transform: translateY(-100%);
                          opacity: 0;
                      }

                      100% {
                          transform: translateY(0);
                          opacity: 1;
                      }
                  }

                  .ventana-modal.fade-out .contenido-modal {
                      /* Animación de salida en el contenido */
                      animation: slideOut 0.3s ease-in-out forwards;
                  }

                  @keyframes slideOut {
                      0% {
                          transform: translateY(0);
                          opacity: 1;
                      }

                      100% {
                          transform: translateY(-100%);
                          opacity: 0;
                      }
                  }

                  /* Fin de las animaciones */
                  .contenido-modal {
                      background-color: rgba(255, 255, 255, 0.80);
                      backdrop-filter: blur(0.5rem);
                      -webkit-backdrop-filter: blur(0.5rem);
                      border: 0;
                      height: 100%;
                      width: 100%;
                      max-height: 700px;
                      max-width: 1000px;

                      border-radius: 1rem;

                      overflow: hidden;

                      position: relative;

                      display: flex;
                      /* Habilita Flexbox */
                      flex-direction: column;
                      /* Alinea los elementos verticalmente */
                  }

                  .dialogo-modal {

                      width: 100%;
                      height: 100%;

                      border-radius: 0.5rem;
                      /* padding: 0.5rem; */
                      display: flex;

                      align-items: center;
                      justify-content: center;
                      position: relative;
                  }

                  .head-load {
                      margin: auto;
                      display: grid;
                      gap: 0.5rem;
                  }

                  .head-load .cargador {
                      margin: auto;
                  }

                  .head-load span {
                      margin: auto;
                  }

                  .cabecera-modal {
                      padding: 1rem;
                      display: flex;
                      justify-content: space-between;
                      align-items: center;
                      flex-grow: 0;
                      /* No crece */
                  }

                  .cuerpo-modal {
                      padding-top: 0.25rem;
                      /* max-height: 75%; */
                      overflow-y: auto;
                      flex-grow: 1;
                      /* Crece para ocupar el espacio disponible */
                      overflow-y: auto;
                      /* Agrega una barra de desplazamiento si es necesario */
                  }

                  .pie-modal {
                      /* max-height: 15%; */
                      display: flex;
                      justify-content: flex-end;
                      align-items: center;
                      position: sticky;
                      bottom: 0;

                      flex-grow: 0;
                      /* No crece */
                  }

                  .cabecera-modal,
                  .pie-modal {
                      padding: 1rem;
                      background: hsla(0, 0%, 100%, 0.2);
                      border: 0;
                  }

                  .contenido-counters {
                      display: flex;
                      justify-content: center;
                      gap: 2px;
                      padding: 2px;
                  }

                  .columna-contenido {
                      width: 50%;
                      display: flex;
                      flex-direction: column;
                      gap: 2px;
                  }

                  .titulo-modal {
                      display: flex;
                      justify-content: start;
                      align-items: center;
                      gap: 1rem;
                  }

                  .titulo-modal img {
                      border: 2px solid hsla(0, 0%, 100%, 0.5);
                      border-radius: 0.5rem;
                      max-width: 6rem;
                      height: auto;
                  }

                  .titulo-modal span {
                      font-size: 1.75rem;
                      font-weight: bold;
                  }

                  .cuerpo-contenido {
                      display: grid;
                  }

                  .nota-heroe {
                      justify-self: center;
                      display: flex;
                      justify-content: center;
                      align-items: center;
                      padding-inline: 3rem;
                      padding-block: 0.3rem;
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
                      font-size: 1.25rem;
                      text-align: center;
                      text-transform: uppercase;
                      margin-block: 0.25rem;
                  }

                  .imagen-pequena {
                      
                      width: calc(100% / 5 - 4px);
                      border-radius: 20%;
                  }

                  .imagen-contador {
                      width: 1.5rem;
                      height: 1.5rem;
                  }

                  .nombre-rol {
                      display: flex;
                      justify-content: flex-start;
                      align-items: center;
                      gap: 0.5rem;
                      height: 3rem;
                  }

                  .nombre-rol span {
                      font-weight: bold;
                  }

                  .alerta-peligro {
                      color: rgb(220, 53, 53);
                      background-color: rgba(220, 53, 53, 0.25);
                      border: 1px solid rgb(220, 53, 69);
                      border-radius: 0.5rem;
                      padding: 0.25rem;
                  }

                  .alerta-primario {
                      color: rgb(32, 136, 168);
                      background-color: rgba(32, 136, 168, 0.25);
                      border: 1px solid rgb(32, 136, 168);
                      border-radius: 0.5rem;
                      padding: 0.25rem;
                  }

                  .btn-close {
                      margin-inline: auto;
                      display: flex;
                      align-items: center;
                      justify-content: center;
                      cursor: pointer;
                      margin: 0;
                      padding: 0;
                      background: none;
                      border: none;
                      width: 2rem;
                      height: 2rem;
                  }

                  .boton-cerrar {
                      background: #f06414;
                      color: #fff;
                      border: 0;
                      border-radius: 0.25rem;
                      padding: 0.5rem 1rem;
                      font-size: 1rem;
                      cursor: pointer;
                      transition: background 0.2s ease-in-out;
                  }

                  .boton-cerrar:hover {
                      background: #ff7424;
                  }

                  .boton-cerrar:active {
                      scale: 0.95;
                  }

                  @media (max-width: 1400px) {
                      .rejilla-contenedor {
                          grid-template-columns: repeat(5, 1fr);
                      }

                      .imagen-pequena {
                          width: calc(100% / 4 - 4px);
                      }
                  }

                  @media (max-width: 1200px) {
                      .rejilla-contenedor {
                          grid-template-columns: repeat(4, 1fr);
                      }

                      .imagen-pequena {
                          width: calc(100% / 3 - 4px);
                      }
                  }

                  @media (max-width: 960px) {
                      .rejilla-contenedor {
                          grid-template-columns: repeat(3, 1fr);
                      }

                      .contenido-modal {
                          max-height: 100%;
                      }

                      .imagen-pequena {
                          width: calc(100% / 2 - 4px);
                      }
                  }

                  @media (max-width: 720px) {
                      .rejilla-contenedor {
                          grid-template-columns: repeat(2, 1fr);
                      }

                      .contenido-modal {
                          max-height: 100%;
                      }

                      .imagen-pequena {
                          width: calc(100% / 2 - 4px);
                      }
                  }
              </style>
          @endpush
          {{-- Navegación --}}
          <div class="barra-navegacion">
              <button class="boton-navegacion {{ $selectedFilter === 'all' ? 'filtro-seleccionado' : '' }}"
                  wire:click='todosHeroes'>
                  <div class="cargador" wire:loading wire:target='todosHeroes, selectHero'></div>
                  <span>
                      todos
                  </span>
              </button>
              <button class="boton-navegacion {{ $selectedFilter === 'tank' ? 'filtro-seleccionado' : '' }}"
                  wire:click='soloTank'>
                  <div class="cargador" wire:loading wire:target='soloTank'></div>
                  <img src="/logos/tankLogo.svg" alt="logo de tank" width="30" height="30" wire:loading.remove
                      wire:target='soloTank'>
                  <span>
                      tank
                  </span>
              </button>
              <button class="boton-navegacion {{ $selectedFilter === 'dps' ? 'filtro-seleccionado' : '' }}"
                  wire:click='soloDps'>
                  <div class="cargador" wire:loading wire:target='soloDps'></div>
                  <img src="/logos/dpsLogo.svg" alt="logo de tank" width="30" height="30" wire:loading.remove
                      wire:target='soloDps'>
                  <span>
                      dps
                  </span>
              </button>
              <button class="boton-navegacion {{ $selectedFilter === 'supp' ? 'filtro-seleccionado' : '' }}"
                  wire:click='soloSupp'>
                  <div class="cargador" wire:loading wire:target='soloSupp'></div>
                  <img src="/logos/suppLogo.svg" alt="logo de tank" width="30" height="30" wire:loading.remove
                      wire:target='soloSupp'>
                  <span>
                      supp
                  </span>
              </button>
          </div>
          {{-- Cartas de pantalla --}}
          <div class="rejilla-contenedor" wire:loading.remove wire:target='todosHeroes ,soloTank ,soloDps ,soloSupp'>
              @foreach ($heroes as $hero)
                  <div class="tarjeta-heroe" wire:click="selectHero({{ $hero->id }})"
                      onclick="abrirModal('contadoresHeroe')">
                      <div class="imagen-tarjeta">
                          <img src="{{ $hero->img_path }}" alt="{{ $hero->nombre }}">
                      </div>
                      <div class="nombre-heroe">
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
          <div wire:ignore.self class="ventana-modal" id="contadoresHeroe" tabindex="-1" role="dialog"
              aria-labelledby="modalTitleId" aria-hidden="true">
              <div class="dialogo-modal" id="dialogo-modal" role="document">
                  <div id="contenido-modal" class="contenido-modal">
                      <div class="head-load" wire:loading wire:target='selectHero, reiniciar'>
                          <div class="cargador"></div>
                          <span>Cargando...</span>
                      </div>
                      <div class="cabecera-modal" wire:loading.remove wire:target='selectHero'>
                          {{-- Cabecera --}}
                          <div class="titulo-modal">
                              <img src="{{ $selectedHero->img_path ?? '' }}" alt="{{ $selectedHero->nombre ?? '' }}">
                              <span>{{ $selectedHero->nombre ?? '' }}</span>
                          </div>

                          <button type="button" class="btn-close" onclick="cerrarModal('contadoresHeroe')">
                              <svg width="2rem" height="2rem" viewBox="0 0 24 24" fill="none"
                                  xmlns="http://www.w3.org/2000/svg">
                                  <path
                                      d="M3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12Z"
                                      stroke="#000000" stroke-width="2" />
                                  <path d="M9 9L15 15M15 9L9 15" stroke="#000000" stroke-width="2"
                                      stroke-linecap="round" />
                              </svg>
                          </button>
                      </div>
                      <div class="cuerpo-contenido cuerpo-modal" wire:loading.remove wire:target='selectHero'>
                          {{-- Cuerpo --}}
                          <div class="nota-heroe">
                              <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 24 24"
                                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round"
                                  class="icon icon-tabler icons-tabler-outline icon-tabler-exclamation-circle">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                  <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                  <path d="M12 9v4" />
                                  <path d="M12 16v.01" />
                              </svg>
                              <span>
                                  {{ $selectedHero->nota ?? 'llamen a dios' }}
                              </span>
                          </div>
                          <div class=" contenido-counters">
                              <div class="columna-contenido">
                                  <div class=" texto-cuerpo">
                                      Counters
                                  </div>
                                  @foreach ($countersByRol as $rol => $counters)
                                      @if (count($counters) > 0)
                                          <div class=" alerta-peligro counters">
                                              <div class="nombre-rol">
                                                  @if ($rol == 'tank')
                                                      <img class="m-0 imagen-contador"
                                                          src="https://images.blz-contentstack.com/v3/assets/blt9c12f249ac15c7ec/bltcb94e9203be4088a/dark_circle_tank.svg">
                                                      <span class="ms-2">TANK</span>
                                                  @elseif ($rol == 'dps')
                                                      <img class="m-0 imagen-contador"
                                                          src="https://images.blz-contentstack.com/v3/assets/blt9c12f249ac15c7ec/blt052e8b02aef879b0/dark_circle_damage.svg">
                                                      <span class="ms-2">DPS</span>
                                                  @elseif($rol == 'supp')
                                                      <img class="m-0 imagen-contador"
                                                          src="https://images.blz-contentstack.com/v3/assets/blt9c12f249ac15c7ec/blt8cf279e9b3126ef8/dark_circle_support.svg">
                                                      <span class="ms-2">SUPPORT</span>
                                                  @else
                                                      <span>*</span>
                                                  @endif
                                              </div>
                                              @foreach ($counters as $counter)
                                                  <img class="imagen-pequena" src="{{ $counter->img_path }}"
                                                      alt="Imagen de {{ $counter->nombre }}">
                                              @endforeach
                                          </div>
                                      @endif
                                  @endforeach
                              </div>
                              <div class="columna-contenido">
                                  <div class=" texto-cuerpo">
                                      es Counter
                                  </div>
                                  @foreach ($countereasByRol as $rol => $countereas)
                                      @if (count($countereas) > 0)
                                          <div class=" alerta-primario counters">
                                              <div class="nombre-rol">
                                                  @if ($rol == 'tank')
                                                      <img class="m-0 imagen-contador"
                                                          src="https://images.blz-contentstack.com/v3/assets/blt9c12f249ac15c7ec/bltcb94e9203be4088a/dark_circle_tank.svg">
                                                      <span class="ms-2">TANK</span>
                                                  @elseif ($rol == 'dps')
                                                      <img class="m-0 imagen-contador"
                                                          src="https://images.blz-contentstack.com/v3/assets/blt9c12f249ac15c7ec/blt052e8b02aef879b0/dark_circle_damage.svg">
                                                      <span class="ms-2">DPS</span>
                                                  @elseif($rol == 'supp')
                                                      <img class="m-0 imagen-contador"
                                                          src="https://images.blz-contentstack.com/v3/assets/blt9c12f249ac15c7ec/blt8cf279e9b3126ef8/dark_circle_support.svg">
                                                      <span class="ms-2">SUPPORT</span>
                                                  @else
                                                      <span>*</span>
                                                  @endif
                                              </div>

                                              @foreach ($countereas as $counterea)
                                                  <img class="imagen-pequena" src="{{ $counterea->img_path }}"
                                                      alt="Imagen de {{ $counterea->nombre }}">
                                              @endforeach
                                          </div>
                                      @endif
                                  @endforeach
                              </div>
                          </div>
                      </div>
                      <div class="pie-modal" wire:loading.remove wire:target='selectHero'>
                          {{-- Boton --}}
                          <button type="button" class="boton-cerrar" onclick="cerrarModal('contadoresHeroe')"
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
                  function abrirModal(idModal) {
                      const modal = document.getElementById(idModal);
                      modal.style.display = 'block';
                      setTimeout(() => modal.classList.add('show'), 10);
                      document.querySelector('#' + idModal + ' .boton-cerrar').setAttribute('aria-hidden', 'false');
                      document.getElementById('contadoresHeroe').setAttribute('aria-hidden', 'false');
                      document.body.classList.add('desbordamiento-oculto');

                  }

                  function cerrarModal(idModal) {
                      const modal = document.getElementById(idModal);
                      window.dispatchEvent(new Event('modalCerrado'));
                      modal.classList.add('fade-out');
                      document.querySelector('#' + idModal + ' .boton-cerrar').setAttribute('aria-hidden', 'true');
                      document.getElementById('contadoresHeroe').setAttribute('aria-hidden', 'true');
                      document.body.classList.remove('desbordamiento-oculto');

                      setTimeout(() => {
                          modal.classList.remove('fade-out');
                          modal.style.display = 'none';
                      }, 300);


                  }
                  const modalbg = document.getElementById('contadoresHeroe');
                  const modalCo = document.getElementById('contenido-modal');
                  //detectar click fuera de de la ventana modal
                  modalbg.addEventListener('click', (e) => {
                      //   console.log(e.target);
                      if (e.target.id == 'dialogo-modal') {
                          cerrarModal('contadoresHeroe');
                      }
                  });
              </script>
          @endpush
      </div>
