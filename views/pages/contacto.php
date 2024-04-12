<main class="contenedor contacto">
    <h1>Contacto</h1>

    <picture>
        <source srcset="build/img/destacada3.avif" type="image/avif">
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" width="200" height="300" src="build/img/destacada3.jpg" alt="Imagen de contacto">
    </picture>

    <h2>Llena el formulario de contacto</h2>

    <?php if ($mensaje) : ?>
        <p class="alerta exito"><?php echo sanitizarHTML($mensaje); ?></p>
    <?php endif; ?>

    <form action="/contacto" class="formulario contacto" method="POST" autocomplete="off">
        <fieldset>
            <legend>Información Personal</legend>

            <div class="campo">
                <label for="nombre">Nombre</label>
                <input type="text" name="contacto[nombre]" id="nombre" placeholder="Escribe tu nombre." aria-label="Nombre" required>
            </div>

            <div class="campo">
                <label for="mensaje">Mensaje</label>
                <textarea name="contacto[mensaje]" id="mensaje" aria-label="Mensaje" required></textarea>
            </div>

        </fieldset>

        <fieldset>
            <legend>Información de la propiedad</legend>

            <div class="campo">
                <label for="opciones">Vende o Compra</label>
                <select name="contacto[tipo]" id="opciones" aria-label="Vender o Comprar" required>
                    <option value="" selected disabled>-- Seleccione --</option>
                    <option value="Comprar">Comprar</option>
                    <option value="Vender">Vender</option>
                </select>
            </div>

            <div class="campo">
                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" name="contacto[presupuesto]" id="presupuesto" placeholder="Ingresa tu presupuesto." aria-label="Precio o Presupuesto" required>
            </div>
        </fieldset>

        <fieldset>
            <legend>Información de Contacto</legend>

            <p class="no-margin">¿Cómo deseas ser contactado?</p>

            <div class="campo forma-contacto">
                <label for="contactar-telefono">Telefono</label>
                <input type="radio" value="telefono" name="contacto[contacto]" id="contactar-telefono" required>
                <label for="contactar-email">E-mail</label>
                <input type="radio" value="email" name="contacto[contacto]" id="contactar-email" required>
            </div>

            <div id="contacto"></div>

        </fieldset>

        <input type="submit" value="Enviar" aria-label="Enviar" class="boton boton-verde opacidad-50" disabled>
    </form>
    <div class="hidden spinner"></div>
</main>