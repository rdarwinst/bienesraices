<main class="contenedor contenido-centrado">
    <h1>Iniciar Sesión</h1>

    <?php foreach($errores as $error):?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <form class="formulario" action="/login" method="post">
        <fieldset>
            <legend>Email y Contraseña</legend>            
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" placeholder="Escribe tu email.">            
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" placeholder="Escribe tu contraseña.">            
        </fieldset>
        <input type="submit" value="Iniciar Sesión" class="boton-verde">
    </form>
</main>