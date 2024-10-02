<div>
    <style>
        .bg {
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            position: fixed;
            z-index: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login_container {
            background-color: rgba(255, 255, 255, 0.8);
            width: 100%;
            height: 100%;
            max-width: 900px;
            max-height: 400px;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            padding: 5px;
            overflow: hidden;
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
        .formulario{
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
        }
        .formulario form{
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items:flex-start;
            gap: 10px;
        }
        .formulario footer{
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
        }
        .label{
            font-size: 20px;
        }
        .input-field{
            box-sizing: border-box;
            width: 100%;
            height: 50px;
            font-size: 1rem;
            padding: 10px;
            border-radius: 5px;
            border: none;
            outline: none;
            margin-bottom: 10px;
        }
        .btn-login,
        .btn-volver{
            width: fit-content;
            height:fit-content;
            padding: 10px 20px;
            background-color:transparent;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
        }

        .btn-login{
            color: black;
            border: 2px solid black;
        }

        .btn-volver{
            color: tomato;
            border: 2px solid tomato;
        }

        .btn-login:hover,
        .btn-volver:hover{
            cursor: pointer;
            color: white;
        }
        .btn-login:hover{
            background-color: black;
        }
        .btn-volver:hover{
            background-color: tomato;
        }

    </style>

    <main class='bg'>
        <article class="login_container">
            <section class="image-container">
                <img class="loginIMG" src="https://cdn.7tv.app/emote/65a2c39f4ccf31a33fce9bf5/4x.webp"
                    class="img-fluid rounded-start" alt="xdd">
                <img class="overlayIMG" src="https://cdn.7tv.app/emote/6216d2f73808dfe5c465bc4a/4x.webp"
                    alt="sobreposición">
            </section>
            <section class="formulario">
                <form wire:submit.prevent="login">
                    <label class="label" for="correo">Correo:</label>
                    <input type="text" wire:model="correo" placeholder="Correo" class="input-field">
                    <label class="label" for="pass">Contraseña:</label>
                    <input type="password" wire:model="pass" placeholder="Contraseña" class="input-field">
                    <footer>
                        <button type="submit" class="btn-login">Iniciar Sesión</button>
                        <a href="/">
                            <button type="button" class="btn-volver">Volver</button>
                        </a>
                    </footer>
                </form>
            </section>
        </article>
    </main>

</div>
