<fieldset>
    <legend>Información General</legend>

    <label for="titulo">Titulo </label>
    <input type="text" name="propiedad[titulo]" id="titulo" placeholder="Titulo de la propiedad." value="<?php echo sanitizarHTML($propiedad->titulo); ?>">

    <label for="precio">Precio</label>
    <input type="number" name="propiedad[precio]" id="precio" placeholder="Precio de tu propiedad." value="<?php echo sanitizarHTML($propiedad->precio); ?>">

    <label for="imagen">Imagen</label>
    <input type="file" name="propiedad[imagen]" id="imagen" accept="image/jpeg, image/png">

    <?php if ($propiedad->imagen) : ?>
        <img title="Imagen Actual" class="imagen-sm" src="../../imagenes/<?php echo $propiedad->imagen; ?>" alt="Imagen de la propiedad">
    <?php endif; ?>

    <label for="descripcion">Descripción</label>
    <textarea name="propiedad[descripcion]" id="descripcion"><?php echo sanitizarHTML($propiedad->descripcion); ?></textarea>
</fieldset>
<fieldset>
    <legend>Información de la Propiedad</legend>

    <label for="habitaciones">Cantidad de Habitaciones</label>
    <input type="number" name="propiedad[habitaciones]" id="habitaciones" placeholder="Ej. 3" min="1" max="9" value="<?php echo sanitizarHTML($propiedad->habitaciones); ?>">

    <label for="wc">Cantidad de Baños</label>
    <input type="number" name="propiedad[wc]" id="wc" placeholder="Ej. 3" min="1" max="9" value="<?php echo sanitizarHTML($propiedad->wc); ?>">

    <label for="estacionamiento">Cantidad de Estacionamientos</label>
    <input type="number" name="propiedad[estacionamiento]" id="estacionamiento" placeholder="Ej. 3" min="1" max="9" value="<?php echo sanitizarHTML($propiedad->estacionamiento); ?>">
</fieldset>
<fieldset>
    <legend>Vendedor</legend>

    <select name="propiedad[vendedores_id]" id="vendedor">
        <option value="" disabled selected>-- Seleccionar Vendedor --</option>
        <?php foreach ($vendedores as $vendedor) : ?>
            <option <?php echo $propiedad -> vendedores_id === $vendedor -> id ? 'selected' : '' ?>
             value="<?php echo $vendedor->id; ?>"><?php echo sanitizarHTML($vendedor->nombre) . " " . sanitizarHTML($vendedor->apellido); ?></option>
        <?php endforeach; ?>
    </select>
</fieldset>