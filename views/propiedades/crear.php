<main class="contenedor">
    <h1>Crear Propiedad</h1>
    <?php foreach ($errores as $error) { ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php } ?>
    <a href="/admin" class="boton boton-verde">Regresar</a>
    <form method="post" action="/propiedades/crear" class="formulario" autocomplete="off" enctype="multipart/form-data">
        <?php include __DIR__ . "/formulario.php"; ?>
        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>
</main>