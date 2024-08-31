<div>
    <style>
        .registrar_heroe {
            border-radius: calc(var(--bs-border-radius) - 2px);
            padding: 2rem;
            background: rgba(233, 245, 255, 0.5);
            /* Desenfoca el fondo */
            backdrop-filter: blur(0.5rem);
            /* Desenfoque para navegadores WebKit */
            -webkit-backdrop-filter: blur(0.5rem);
        }

        .contendor_imagen {
            background: #00000011;
            position: relative; /* Para posicionar el icono relativo al contenedor */
        }

        .img_placeholder {
            width: 99%;
            height: auto;
        }

        .icono_rol {
            position: absolute;
            top: 10px; /* Ajusta la distancia desde arriba */
            right: 10px; /* Ajusta la distancia desde la derecha */
            z-index: 1; /* Asegura que el icono esté por encima de la imagen */
        }

        @media(max-width: 767px) {
            .registrar_heroe {
                max-width: 99%;
            }
        }
    </style>

    <div class="container registrar_heroe ">
        <div class="row">
            <div class="col-3 contendor_imagen">
                @if ($rol == 'tank')
                    <img class="m-0 icono_rol"
                        src="https://images.blz-contentstack.com/v3/assets/blt9c12f249ac15c7ec/bltcb94e9203be4088a/dark_circle_tank.svg">
                @elseif ($rol == 'dps')
                    <img class="m-0 icono_rol"
                        src="https://images.blz-contentstack.com/v3/assets/blt9c12f249ac15c7ec/blt052e8b02aef879b0/dark_circle_damage.svg" />
                @elseif ($rol == 'supp')
                    <img class="m-0 icono_rol"
                        src="https://images.blz-contentstack.com/v3/assets/blt9c12f249ac15c7ec/blt8cf279e9b3126ef8/dark_circle_support.svg" />
                @endif

                @if ($img_path)
                    <img class="img-fluid" src="{{ $img_path }}" alt="previsualización de la imagen">
                @else
                    <div class="img_placeholder">
                        <i class="bi bi-person-square"></i>
                        <span class="mt-1">Ingrese un link de imagen</span>
                    </div>
                @endif
            </div>
            <div class="col">
                <form>
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
                            <label for="src_img">Enlace de la imagen a guardar</label>
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="reset" class="btn btn-primary">Registrar</button>
                        <button type="submit" class="btn btn-secondary" >Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>