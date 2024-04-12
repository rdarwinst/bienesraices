<h1>Actualizar Datos de Vendedor</h1>

<main class="contenedor">
    <?php foreach ($errores as $error) { ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php } ?>
    
    <a href="/admin" class="boton boton-verde">Regresar</a>
    <form class="formulario" id="form-vendedor" method="post" autocomplete="off">

        <?php include __DIR__ . '/formulario.php'; ?>

        <input type="submit" value="Actualizar Vendedor" class="boton boton-verde">
    </form>

</main>