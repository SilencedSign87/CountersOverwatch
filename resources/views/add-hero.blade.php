<div>
    <style>
        .tarjeta_registro {
            width: 70vw;
        }

        .image-container {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .hero-image {
            height: 100%;
            /* Altura al 100% del contenedor */
            width: auto;
            /* Ancho automático */
            object-fit: contain;
            /* Mantiene la proporción y se asegura de que la imagen completa sea visible */
        }

        .role-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 1;
        }

        .card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(0.5rem);
            -webkit-backdrop-filter: blur(0.5rem);
            border: none;
        }

        @media (max-width: 1300px) and (min-width: 768px) {
            .tarjeta_registro {
                width: 90vw;
            }
            .hero-image {
            height: auto;
            
            width: 100%;
            /* Ancho automático */
            object-fit: contain;
            /* Mantiene la proporción y se asegura de que la imagen completa sea visible */
        }
        }

        @media(max-width: 767px) {
            .tarjeta_registro {
                width: 100vw;
            }

            .card {
                flex-direction: column;
            }

            .col-md-4 {
                order: -1;
                /* Pone la imagen arriba en pantallas pequeñas */
            }
        }
    </style>

    <div class="container d-flex justify-content-center">
        <div class="card mb-3 p-2 tarjeta_registro">
            <div class="row g-0">
                <div class="col-md-4">
                    <div class="image-container">
                        @if ($img_path)
                            <img class="hero-image" src="{{ $img_path }}" alt="previsualización de la imagen">
                        @else
                            <div class="hero-image d-flex justify-content-center align-items-center">
                                <i class="bi bi-person-square fs-1"></i>
                            </div>
                        @endif
                        @if ($rol)
                            <img class="role-icon"
                                src="@if ($rol == 'tank') https://images.blz-contentstack.com/v3/assets/blt9c12f249ac15c7ec/bltcb94e9203be4088a/dark_circle_tank.svg @elseif ($rol == 'dps') https://images.blz-contentstack.com/v3/assets/blt9c12f249ac15c7ec/blt052e8b02aef879b0/dark_circle_damage.svg @elseif ($rol == 'supp') https://images.blz-contentstack.com/v3/assets/blt9c12f249ac15c7ec/blt8cf279e9b3126ef8/dark_circle_support.svg @endif"
                                alt="Icono de rol">
                        @endif
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Registrar Héroe</h5>
                        <form wire:submit='registrarHeroe'>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Nombre"
                                    wire:model='nombre'>
                                <label for="floatingInput">Nombre del Héroe</label>
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Rol</label>
                                <select class="form-select" id="inputGroupSelect01" wire:model.live='rol'>
                                    <option selected value="">Seleccione el rol</option>
                                    <option value="tank">Tank</option>
                                    <option value="dps">Dps</option>
                                    <option value="supp">Support</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-link-45deg"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="src_img" placeholder="imagen"
                                        wire:model.live='img_path'>
                                    <label for="src_img">Enlace de la imagen</label>
                                </div>
                            </div>
                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary">Registrar</button>
                                <button type="reset" class="btn btn-secondary">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</div>
