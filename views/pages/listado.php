<div class="contenedor-anuncios">
    <?php foreach ($propiedades as $propiedad) : ?>
        <div class="anuncio">
            <img loading="lazy" src="/imagenes/<?php echo sanitizarHTML($propiedad->imagen); ?>" alt="">
            <div class="contenido-anuncio">
                <h3><?php echo sanitizarHTML($propiedad->titulo); ?></h3>
                <p><?php echo sanitizarHTML(substr($propiedad->descripcion, 0, 120) . "..."); ?></p>
                <p class="precio">$<?php echo sanitizarHTML($propiedad->precio); ?></p>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" src="build/img/icono_wc.svg" alt="Icono WC">
                        <p><?php echo sanitizarHTML($propiedad->wc); ?></p>
                    </li>
                    <li>
                        <img class="icono" src="build/img/icono_estacionamiento.svg" alt="Icono Estacionamiento">
                        <p><?php echo sanitizarHTML($propiedad->estacionamiento); ?></p>
                    </li>
                    <li>
                        <img class="icono" src="build/img/icono_dormitorio.svg" alt="Icono Dormitorio">
                        <p><?php echo sanitizarHTML($propiedad->habitaciones); ?></p>
                    </li>
                </ul>
                <a href="/propiedad?id=<?php echo sanitizarHTML($propiedad->id); ?>" class="boton-amarillo-block">Ver Propiedad</a>
            </div> <!-- .contenido-anuncio -->
        </div><!-- .anuncio -->
    <?php endforeach; ?>
</div><!-- .contenedor-anuncios -->