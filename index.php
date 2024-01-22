<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <title>Rubén Valverde Romero</title>
</head>
<body>

    <!-- Cabecera -->

    <header>
        <!-- Oferta de navidad -->
        <?php
            if(!isset($_SESSION['email'])){?>
         
                <div class="oferta">
                    <a href="login.php">Ofertas de Navidad, hasta un 30% en artículos destacados. Únete/Inicia sesión.</a>
                </div>
        <?php } ?>

        <!-- Barra de navegación -->

        <div class="navbarCabecera">
            <div id="idioma">
                <img src="img/Logos/bandera.png" alt="bandera de españa">
                <p>Español</p>
            </div>
            <div class="subNavbarCabecera">
                <a href="pages/realizar_pedido.php">Carrito</a>

                <!-- Si el usuario está logueado, se muestra "Mi cuenta", si no, se muestra "Iniciar sesión" -->

                <?php
                    if(isset($_SESSION['email'])){
                        echo '<a href="pages/usuario.php">Mi cuenta</a>';
                    }else{
                        echo '<a href="pages/login.php">Bienvenido/a, Iniciar sesión</a>';
                    }
                ?>
                <a href="#">Ayuda</a>                
            </div>

        </div>
        <div class="menuCabecera">

            <!-- Script para desplegar el menu en pantallas medianas y pequeñas -->

            <script src="scripts/mostrar-menu.js"></script>

            <div id="menuComp">
                <img src="img/Fondos/menu_comp.png" alt="menu comprimido" onclick="mostrarMenu()">
            </div>

           <!-- Logo -->

            <img src="img/Logos/rvr.webp" alt="logo de Footloker">

            <!-- Categorias -->

            <div id="menuCategorias">
                <a href="#">INICIO</a>
                <a href="pages/tienda.php">TIENDA</a>
                <a href="pages/tienda.php?categoria=sobremesa">SOBREMESAS</a>
                <a href="pages/tienda.php?categoria=monitor">MONITORES</a>
                <a href="pages/tienda.php?categoria=componente">COMPONENTES</a>
                <a href="pages/tienda.php?categoria=periferico">PERIFERICOS</a>
                <a href="pages/tienda.php?categoria=dispositivo-movil">SMARTPHONES</a>
                <a href="pages/tienda.php?categoria=portatil">PORTÁTILES</a>
            </div>

            <!-- Buscador -->

            <div id="botonBuscar">
                <form action="pages/tienda.php" method="GET">
                    <input type="text" name="buscar" placeholder="Buscar...">
                    <button type="submit"><img src="img/Fondos/lupa.png"></button>
                </form>
            </div>
        </div>
         <!-- Menu vertical que se despliega con el script-->

         <nav id="menuCategoriasVertical">
                <a href="index.php">INICIO</a>
                <a href="pages/tienda.php">TIENDA</a>
                <a href="pages/tienda.php?categoria=sobremesa">SOBREMESAS</a>
                <a href="pages/tienda.php?categoria=monitor">MONITORES</a>
                <a href="pages/tienda.php?categoria=componente">COMPONENTES</a>
                <a href="pages/tienda.php?categoria=periferico">PERIFERICOS</a>
                <a href="pages/tienda.php?categoria=dispositivo-movil">SMARTPHONES</a>
                <a href="pages/tienda.php?categoria=portatil" id = "menuUltimo">PORTÁTILES</a>
            </nav>
        <!-- Envios -->

        <div class="envios">
            <p>Envio Gratis a partir de 50€</p>
            <p>Primer envio gratis</p>
            <p>Envios entre 2 y 5 días</p>  
        </div>

        <!-- Imagen de oferta -->
        
        <div>
            <img src="img/Fondos/oferta_temporada.webp" alt="oferta 50%" id="imagenOfertaGrande">
            <img src="img/Fondos/oferta_temporada_media.png" alt="oferta 50%" id="imagenOfertaPequeña">
        </div>
        
        <div class="comprarAhora" id="horaDeJugar">
            <div class="textoComprarAhora" id="centrarJugar">
                <h1>ES HORA DE GANAR</h1>
                <p>¡Es hora de mejor tu equipo!. Aprovecha las ofertas de navidad<br> Compra todo lo que puedas con un descuento de hasta el 30%</p>
                <a href="#">COMPRAR AHORA</a>
            </div>
        </div>
    </header>

     <!-- Parte Principal de la web-->

    <main>

        <!-- Categorías de producto -->

        <section class="productos">
            <article>
                <img src="img/Fondos/nvidia_grafica.jpg" alt="Tarjeta gráfica">
                <h2>Tarjetas Gráficas</h2>
                <a href="pages/tienda.php?buscar=tarjeta grafica">COMPRAR AHORA</a>
            </article>
            <article>
                <img src="img/Fondos/nvidia_portatil.jpg" alt="Portatil">
                <h2>Portátiles</h2>
                <a href="pages/tienda.php?categoria=portatil">COMPRAR AHORA</a>
            </article>
            <article>
                <img src="img/Fondos/nvidia_pc.jpg" alt="PC">
                <h2>Sobremesas</h2>
                <a href="pages/tienda.php?categoria=sobremesa">COMPRAR AHORA</a>
            </article>
        </section>

        <!-- Video de Corsair -->

        <div class="comprarAhora" id="corsair">
            <img src="img/Logos/corsair_blanco.png" alt="Logo de corsair">
            <div class="textoComprarAhora" id="corsairTexto">
                <a href="pages/tienda.php?buscar=corsair">COMPRAR AHORA</a>
            </div>
        </div>  
    </main>

    <!-- Pie de la web-->

    <footer>
        <div class="footerFila1">
            <div class="footerCol1">
                <h3>Mis pedidos</h3>
                <p>Inicia sesión para ver tus pedidos.</p>
                <a href="pages/usuario.php">VER PEDIDOS</a>
            </div>
            <div class="footerCol1">
                <h3>Nuestras Tiendas</h3>
                <p>Encuentra tu tienda RVR más cercana.</p>
                <a href="https://www.google.com/maps?ll=40.474806,-3.676546&z=15&t=m&hl=es&gl=ES&mapclient=embed&q=C.+Consuegra,+3+Chamart%C3%ADn+28036+Madrid">BUSCAR UNA TIENDA</a>
            </div>
        </div>
        <div class="footerFila2">
            <div class="footerCol2">
                <div class="tituloFCol2">
                    <h3>ATENCIÓN AL CLIENTE</h3>
                </div>
                <ul>
                    <li><a href="">Click & Collect</a></li>
                    <li><a href="">Envíos</a></li>
                    <li><a href="">Devoluciones & Reembolsos</a></li>
                </ul>
            </div>
            <div class="footerCol2">
                <div class="tituloFCol2">
                    <h3>INFORMACIÓN LEGAL</h3>
                </div>
                <ul>
                    <li><a href="">Tus derechos de privacidad </a></li>
                    <li><a href="">Términos y condiciones</a></li>
                    <li><a href="">Declaración de cookies</a></li>
                    <li><a href="">Configuración de cookies</a></li>
                </ul>
            </div>
            <div class="footerCol2">
                <div class="tituloFCol2">
                    <h3>DONDE ESTAMOS</h3>
                </div>
                
                <div>
                    <p style="margin-top: 2em;">Calle Consuegra 3, Madrid, España</p>
                    <p>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3035.020564965332!2d-3.67912062444734!3d40.4748100521031!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4229475fc7e749%3A0x71a6fb4707b13a23!2sC.%20Consuegra%2C%203%2C%2028036%20Madrid!5e0!3m2!1ses!2ses!4v1695728536836!5m2!1ses!2ses" 
                            class = "mapa" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </p>
                </div>
            </div>
        </div>
        <div class="footerFila3">
                <a href="index.php"><img src="img/Logos/rvr.webp" alt="logo de footer"></a>
                <p>2023 Rubén Valverde Romero, estudiante MSMK</p>
        </div>
        <div class="footerFila4">
            <p>Los precios están sujetos a cambios sin previo aviso. Los productos mostrados pueden no estar disponibles en nuestras tiendas.</p>
        </div>
    </footer>
</body>
</html>
</body>
</html>