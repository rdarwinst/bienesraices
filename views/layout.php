<?php

if (!isset($_SESSION)) {
    session_start();
}

$auth = $_SESSION['login'] ?? false;

if(!isset($inicio)) {
    $inicio = false;
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="preload" href="../build/css/app.css" as="style">
    <link rel="stylesheet" href="../build/css/app.css">
</head>

<body>

    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/" class="logo">
                    <img src="../build/img/logo.svg" alt="Logo de la Empresa">
                </a>

                <div class="menu-responsive">
                    <img src="../build/img/barras.svg" alt="Icono Menu Responsive">
                </div>

                <div class="derecha">
                    <img src="../build/img/dark-mode.svg" alt="Boton Drak Mode" class="dark-mode-boton">
                    <nav class="navegacion">
                        <a href="/nosotros">Nosotros</a>
                        <a href="/propiedades">Anuncios</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contacto</a>
                        <?php if ($auth) : ?>
                            <a href="/admin">Administrar</a>
                            <a href="/logout">Cerrar Sesión</a>
                        <?php endif; ?>

                    </nav>
                </div>


            </div><!-- .barra -->
            <?php echo $inicio ? "<h1>Venta de Casas Y Departamentos Exclusivos de Lujo</h1>" : '' ?>
        </div>
    </header>

    <?php echo $contenido; ?>

    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="/nosotros">Nosotros</a>
                <a href="/propiedades">Anuncios</a>
                <a href="/blog">Blog</a>
                <a href="/contacto">Contacto</a>
            </nav>
        </div>
        <p class="copyright">Todos los derechos reservados - <?php echo date('Y'); ?> &copy;</p>
    </footer>

    <script src="../build/js/bundle.min.js"></script>
</body>

</html>