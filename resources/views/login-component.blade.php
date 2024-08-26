<div>
    <style>
        .center-card {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .image-container {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .loginIMG {
            width: 100%;
            height: 100%;
            object-fit: fill;
            /* Esto asegura que la imagen se deforme para llenar el contenedor */
        }

        .overlayIMG {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: fill;
            pointer-events: none;
            /* Para que la imagen superior no interfiera con la interacción del usuario */
        }
    </style>

    <div class="container center-card">

        <div class="card mb-3 p-2" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <div class="image-container">
                        <img class="loginIMG" src="https://cdn.7tv.app/emote/65a2c39f4ccf31a33fce9bf5/4x.webp"
                            class="img-fluid rounded-start" alt="xdd">
                        <img class="overlayIMG" src="https://cdn.7tv.app/emote/6216d2f73808dfe5c465bc4a/4x.webp"
                            alt="sobreposición">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Acceder al control</h5>
                        <p class="card-text">Ingrese sus credenciales</p>
                        @if (session()->has('message'))
                            <div class="alert alert-success " role="alert">
                                {{ session('message') }}
                            </div>
                        @elseif(session()->has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form wire:submit.prevent='login'>
                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo</label>
                                <input type="email" class="form-control" id="correo"
                                    placeholder="ejemplo@ejemplo.com" wire:model='correo'>
                            </div>
                            <div class="mb-3">
                                <label for="Password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="Password" wire:model='pass'>
                            </div>
                            <div class="row">
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-outline-primary mb-3">Acceder</button>
                                </div>
                                <div class="col-auto">
                                    <button type="reset" class="btn btn-outline-warning mb-3">Limpiar</button>
                                </div>
                                <div class="col-auto">
                                    <button type="button" class="btn btn-outline-danger mb-3"
                                        wire:click='volver'>Volver</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
