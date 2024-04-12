<main class="contenedor">
    <h1>Administrador de Biener Raices</h1>

    <?php
    if ($resultado) {
        $mensaje = mostrarNotificacion(intval($resultado));
        if ($mensaje) { ?>
            <p class="alerta exito"><?php echo sanitizarHTML($mensaje); ?></p>
    <?php }
    }
    ?>

    <a href="./propiedades/crear" class="boton boton-verde">Nueva Propiedad</a>
    <a href="./vendedores/crear" class="boton boton-amarillo">Nuevo Vendedor</a>
    <a href="./entradas/crear" class="boton boton-amarillo">Nueva Entrada</a>

    <h2>Propiedades</h2>

    <div class="tabla-responsive">
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody><!-- Mostrar resultados -->
                <?php foreach ($propiedades as $propiedad) : ?>
                    <tr>
                        <td> <?php echo sanitizarHTML($propiedad->id); ?> </td>
                        <td> <?php echo sanitizarHTML($propiedad->titulo); ?> </td>
                        <td><img src="/imagenes/<?php echo sanitizarHTML($propiedad->imagen); ?>" alt="Imagen de la propiedad" class="imagen-tabla"></td>
                        <td>$<?php echo sanitizarHTML($propiedad->precio); ?> </td>
                        <td>
                            <form action="/propiedades/eliminar" method="POST" class="w-100">
                                <input type="hidden" name="id" value="<?php echo sanitizarHTML($propiedad->id); ?>">
                                <input type="hidden" name="tipo" value="propiedad">
                                <input type="submit" class="boton-rojo-block" value="Eliminar">
                            </form>
                            <a href="/propiedades/actualizar?id=<?php echo sanitizarHTML($propiedad->id); ?>" class="boton-amarillo-block">Actualizar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="tabla-responsive">
        <h2>Vendedores</h2>
        <table class="vendedores">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vendedores as $vendedor) { ?>
                    <tr>
                        <td><?php echo sanitizarHTML($vendedor->id); ?></td>
                        <td><?php echo sanitizarHTML($vendedor->nombre) . " " . sanitizarHTML($vendedor->apellido); ?></td>
                        <td><a href="mailto:<?php echo sanitizarHTML($vendedor->email); ?>"><?php echo sanitizarHTML($vendedor->email); ?></a></td>
                        <td><a href="tel:<?php echo sanitizarHTML($vendedor->telefono); ?>"><?php echo sanitizarHTML($vendedor->telefono); ?></a></td>
                        <td>
                            <form method="post" action="/vendedores/eliminar" class="w-100">
                                <input type="hidden" name="id" value="<?php echo sanitizarHTML($vendedor->id); ?>">
                                <input type="hidden" name="tipo" value="vendedor">
                                <input type="submit" value="Eliminar" class="boton-rojo-block">
                            </form>
                            <a href="/vendedores/actualizar?id=<?php echo sanitizarHTML($vendedor->id); ?>" class="boton-amarillo-block">Actualizar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="tabla-responsive">
        <h2>Entradas del Blog</h2>
        <table class="entradas">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Contenido</th>
                    <th>Categoria</th>
                    <th>Imagen</th>
                    <th>Autor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($entradas as $entrada): ?>
                    <tr>
                        <td><?php echo sanitizarHTML($entrada -> titulo); ?></td>
                        <td><?php echo substr(sanitizarHTML($entrada -> contenido), 0, 120)."..."; ?></td>
                        <td><?php echo sanitizarHTML($entrada -> categoria); ?></td>
                        <td><img class="imagen-tabla" src="/imagenes/<?php echo sanitizarHTML($entrada -> imagen); ?>" alt=""></td>
                        <td><?php echo sanitizarHTML($entrada -> autor); ?></td>
                        <td>
                            <form action="/entradas/eliminar" method="post" class="w-100">
                                <input type="hidden" name="id" value="<?php echo sanitizarHTML($entrada -> id); ?>">
                                <input type="hidden" name="tipo" value="entrada">
                                <input type="submit" value="Eliminar" class="boton boton-rojo-block">
                            </form>
                            <a href="/entradas/actualizar?id=<?php echo sanitizarHTML($entrada -> id); ?>" class="boton boton-amarillo-block">Actualizar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>