<main class="contenedor">
    <h1>Agregar una entrada de blog</h1>
    <?php foreach ($errores as $error) : ?>
        <div class="alerta error"><?php echo $error; ?></div>
    <?php endforeach; ?>
    <a href="/admin" class="boton boton-verde">Regresar</a>
    <form method="post" enctype="multipart/form-data" autocomplete="off" class="formulario">
        <?php include __DIR__ . '/formulario.php'; ?>
        <input type="submit" value="Publicar Entrada" class="boton boton-verde">
    </form>
</main>