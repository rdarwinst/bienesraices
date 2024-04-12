<main class="entrada contenedor contenido-centrado">
    <h1><?php echo sanitizarHTML($entrada->titulo); ?></h1>

    <img src="/imagenes/<?php echo sanitizarHTML($entrada->imagen); ?>" alt="Imagen Entrada">
    <div class="informacion-meta">
        <p>Publicado el: <span><?php echo sanitizarHTML($entrada->fecha_publicacion); ?></span></p>
        <p>Escrito por: <span><?php echo sanitizarHTML($entrada->autor); ?></span></p>
        <p>Última modificación: <span><?php echo sanitizarHTML($entrada->ultima_modificacion); ?></span></p>
    </div>

    <div class="resumen-entrada">
        <p class="justificar-texto no-margin">
            <?php echo nl2br(sanitizarHTML($entrada->contenido)); ?>
        </p>
</main>