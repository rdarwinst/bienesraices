<?php foreach ($entradas as $entrada) { ?>
    <article class="entrada-blog">
        <div class="imagen">
            <img src="/imagenes/<?php echo sanitizarHTML($entrada->imagen); ?>" alt="Imagen entrada blog">
        </div>
        <div class="entrada-contenido">
            <a href="/entrada?id=<?php echo sanitizarHTML($entrada->id); ?>">
                <h4><?php echo sanitizarHTML($entrada->titulo); ?></h4>
                <p class="informacion-meta">Escrito el: <span><?php echo sanitizarHTML($entrada->fecha_publicacion); ?></span> Por: <span><?php echo sanitizarHTML($entrada->autor); ?></span></p>
                <p><?php echo sanitizarHTML(substr($entrada->contenido, 0, 100)); ?></p>
            </a>
        </div>
    </article>
<?php } ?>