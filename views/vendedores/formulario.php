<fieldset>
    <legend>Información General</legend>
    <div class="campo">
        <label for="nombre">Nombre</label>
        <input type="text" name="vendedor[nombre]" id="nombre" placeholder="Ingrese el nombre del vendedor." value="<?php echo sanitizarHTML($vendedor->nombre); ?>">
    </div>

    <div class="campo">
        <label for="apellido">Apellido</label>
        <input type="text" name="vendedor[apellido]" id="apellido" placeholder="Ingrese el apellido del vendedor." value="<?php echo sanitizarHTML($vendedor->apellido); ?>">
    </div>

</fieldset>
<fieldset>
    <legend>Información de Contacto</legend>

    <label for="telefono">telefono</label>
    <div class="campo">
        <input type="tel" name="vendedor[telefono]" id="telefono" placeholder="Ingrese el teléfono del vendedor." value="<?php echo sanitizarHTML($vendedor->telefono); ?>">
    </div>

    <div class="campo">
        <input type="email" name="vendedor[email]" id="email" placeholder="Ingrese el email del vendedor" value="<?php echo sanitizarHTML($vendedor->email); ?>">
    </div>
</fieldset>