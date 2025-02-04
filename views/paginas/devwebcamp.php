<main class="devwebcamp">
    <h2 class="devwebcamp__heading"><?php echo $titulo; ?></h2>
    <p class="devwebcamp__descripcion">Conoce la conferencias más importante de España</p>

    <div class="devwebcamp__grid">
        <div <?php aos_animacion();?> class="devwebcamp__imagen">
            <picture>
                <source srcset="build/img/sobre_devwebcamp.avif" type="image/avif">
                <source srcset="build/img/sobre_devwebcamp.avif" type="image/webp">
                <img loading="lazy" width="200" height="300" src="build/img/sobre_devwebcamp.jpg" alt="Imagen Devwebcamp">
            </picture>
        </div>

        <div class="devwebcamp__contenido">
            <p <?php aos_animacion();?> class="devwebcamp__texto">Al contrario del pensamiento popular, el texto de Lorem Ipsum no es simplemente texto aleatorio.
                Tiene sus raices en una pieza clásica de la literatura del Latin
            </p>
            <p <?php aos_animacion();?> class="devwebcamp__texto">Que data del año 45 antes de Cristo,
                haciendo que este adquiera mas de 2000 años de antiguedad. Richard McClintock, un profesor de Latin de la Universidad de Hampden-Sydney en Virginia
            </p>
        </div>
    </div>
</main>