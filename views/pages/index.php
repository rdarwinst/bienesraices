<main class="contenedor">
    <h2>Más Sobre Nosotros</h2>
    <?php include __DIR__ . '/iconos.php'; ?>
</main>
<section class="seccion contenedor">
    <h2>Casas y Apartamentos en Venta</h2>

    <?php include __DIR__ . '/listado.php'; ?>

    <div class="alinear-derecha">
        <a class="boton boton-verde" href="/propiedades">Ver Todas</a>
    </div>
</section>

<section class="imagen-contacto">
    <h2>Encuentra la casa de tus sueños</h2>
    <p>Llena el formulario de contacto y un asesor te contactara en el menor tiempo posible</p>
    <a href="/contacto" class="boton boton-amarillo">Contactar</a>
</section>

<div class="contenedor seccion seccion-inferior">
    <section class="blog">
        <h3>Nuestro Blog</h3>
        <?php include __DIR__ . '/entradas.php'; ?>
    </section>
    <section class="testimoniales">
        <h3>Testimoniales</h3>
        <div class="testimonial">
            <blockquote>
                El personal se comporto de una excelente forma, muy buena atención y la casa que me ofrecieron
                cumple con todas mis espectativas.
            </blockquote>
            <p>- Darwin Ramirez</p>
        </div>
    </section>
</div>