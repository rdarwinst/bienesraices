<label for="titulo">Titulo</label>
<input type="text" name="entrada[titulo]" id="titulo" class="titulo" value="<?php echo sanitizarHTML($entrada->titulo); ?>">
<label for="contenido">Contenido</label>
<textarea name="entrada[contenido]" id="contenido"><?php echo sanitizarHTML($entrada->contenido); ?></textarea>
<label for="categoria">Categorías</label>
<input list="categorias" id="categoria" name="entrada[categoria]" value="<?php echo  sanitizarHTML($entrada->categoria); ?>">
<datalist id="categorias">
    <option value="Noticias del Mercado">
    <option value="Consejos para Compradores">
    <option value="Consejos para Vendedores">
    <option value="Tendencias en Diseño de Interiores">
    <option value="Reformas y Renovaciones">
</datalist>
<label for="imagen">Imagen</label>
<input type="file" name="entrada[imagen]" id="imagen" accept="image/jpeg, image/png">
<?php if ($entrada->imagen) : ?>
    <img src="/imagenes/<?php echo sanitizarHTML($entrada->imagen); ?>" class="imagen-sm" alt="Imagen Actual" title="Imagen Actual">
<?php endif; ?>
<label for="etiquetas">Etiquetas</label>
<input type="text" name="entrada[etiquetas]" id="etiquetas" value="<?php echo sanitizarHTML($entrada->etiquetas); ?>">