<div>
    <style>
        .center-card {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>

    <div class="container center-card">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="..." class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Acceder al control</h5>
                        <p class="card-text">Está accediendo a propiedad privada, vuelva o llamaré a la policía</p>
                        <form wire:submit.prevent='login'>
                            <div class="mb-3">
                                <label for="Usuario" class="form-label" wire:model.change='user'>Usuario</label>
                                <input type="text" class="form-control" id="Usuario" placeholder="Admin">
                            </div>
                            <div class="mb-3">
                                <label for="Password" class="form-label" wire:model.change='pass'>Contraseña</label>
                                <input type="password" class="form-control" id="Password" placeholder="Admin">
                            </div>
                            <div class="row">
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-outline-primary mb-3">Acceder</button>
                                </div>
                                <div class="col-auto">
                                    <button type="reset" class="btn btn-outline-warning mb-3">Limpiar</button>
                                </div>
                                <div class="col-auto">
                                    <button type="button" class="btn btn-outline-danger mb-3" wire:click='volver'>Volver</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
