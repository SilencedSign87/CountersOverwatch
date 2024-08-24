<div class="mt-5" style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 20px;">

    <style>
        .card {
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: scale(1.1);
            /* Expande la tarjeta un 5% */
        }
    </style>

    @foreach ($heroes as $heroe)

        <div class="card shadow-lg" style="width: 100%;"> <!-- Ajusta el ancho de la tarjeta -->
            <img src="{{ $heroe->img_path }}" class="card-img-top" alt="Imagen de {{ $heroe->nombre }}">
            <div class="card-body">
                <h5 class="card-title">{{ $heroe->nombre }}</h5>
                <p class="card-text">{{ $heroe->rol }}</p>
            </div>
        </div>
        
    @endforeach
</div>
