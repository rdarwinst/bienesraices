<main class="contenedor">
    <h1>Actualizar Propiedad</h1>
    <a href="/admin" class="boton boton-verde">Regresar</a>
    <?php foreach ($errores as $error) { ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php } ?>
    <form method="post" class="formulario" autocomplete="off" enctype="multipart/form-data">
        <?php include __DIR__ . "/formulario.php"; ?>
        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
    </form>
</main>