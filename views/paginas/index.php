<?php
@include_once __DIR__ . '/conferencias.php';

?>
<section class="resumen">
    <div class="resumen__grid">
        <div class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $ponentes_total; ?></p>
            <p class="resumen__texto">Speakers</p>
        </div>
        <div class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $conferencias_total; ?></p>
            <p class="resumen__texto">Conferencias</p>
        </div>
        <div class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $workshops_total; ?></p>
            <p class="resumen__texto">Workshops</p>
        </div>
        <div class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero">500</p>
            <p class="resumen__texto">Asistentes</p>
        </div>
    </div>
</section>
<section class="speakers">
    <h2 class="speakers__heading">Speakers</h2>
    <p class="speakers__descripcion">Conoce a nuestros expertos de DevWebCamp</p>
    <?php foreach ($ponentes as $ponente) {; ?>
        <div class="speaker">
            <picture>
                <source src="img/speakers/<?php echo $ponente->imagen; ?>.webp" type="image/webp">
                <source src="img/speakers/<?php echo $ponente->imagen; ?>.png" type="image/png">
                <img class="speaker__imagen" loading="lazy" width="200" height="300" src="img/speakers/<?php echo $ponente->imagen; ?>.webp" alt="Imagen Ponente">
            </picture>
            <div class="speaker__informacion">
                <h4 class="speaker__nombre"><?php echo $ponente->nombre; ?></h4>
                <p class="speaker__ubicacion"><?php echo $ponente->ciudad . ', ' . $ponente->pais; ?></p>
                <div class="speaker__social">
                    <?php
                    $redes = json_decode($ponente->redes)
                    ?>

                    <?php if(!empty($redes->facebook)){;?>
                    <a class="speaker__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->facebook;?>">
                        <span class="speaker__ocultar">Facebook</span>
                    </a>
                    <?php };?>
                    <?php if(!empty($redes->twitter)){;?>
                    <a class="speaker__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->twitter;?>">
                        <span class="speaker__ocultar">Twitter</span>
                    </a>
                    <?php };?>
                    <?php if(!empty($redes->youtube)){;?>
                    <a class="speaker__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->youtube;?>">
                        <span class="speaker__ocultar">YouTube</span>
                    </a>
                    <?php };?>
                    <?php if(!empty($redes->instagram)){;?>
                    <a class="speaker__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->instagram;?>">
                        <span class="speaker__ocultar">Instagram</span>
                    </a>
                    <?php };?>
                    <?php if(!empty($redes->tiktok)){;?>
                    <a class="speaker__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->tiktok;?>">
                        <span class="speaker__ocultar">Tiktok</span>
                    </a>
                    <?php };?>
                    <?php if(!empty($redes->github)){;?>
                    <a class="speaker__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->github;?>">
                        <span class="speaker__ocultar">Github</span>
                    </a>
                    <?php };?>
                </div>
                <ul class="speaker__listado-skills">
                    <?php
                    $tags = explode(',', $ponente->tags);
                    foreach ($tags as $tag) {; ?>
                        <li class="speaker__skill"><?php echo $tag; ?></li>
                    <?php }; ?>
                </ul>
            </div>

        </div>
    <?php }; ?>
</section>