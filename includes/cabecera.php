       

        <!-- Barra de navegación -->

        <div class="navbarCabecera">
            <div id="idioma">
                <img src="../img/Logos/bandera.png" alt="bandera de españa">
                <p>Español</p>
            </div>
            <div class="subNavbarCabecera">

                <!-- Carrito de la compra -->
                <a href="realizar_pedido.php">Carrito</a>
                
                  <!-- Si el usuario está logueado, se muestra "Mi cuenta", si no, se muestra "Iniciar sesión" -->

                  <?php
                    if(isset($_SESSION['email'])){
                        echo '<a href="usuario.php">Mi cuenta</a>';
                    }else{
                        echo '<a href="login.php">Bienvenido/a, Iniciar sesión</a>';
                    }
                ?>
                <!-- Manual de usuario para Base de Datos -->
                <a href="#">Ayuda</a>                
            </div>

        </div>
        <div class="menuCabecera">

            <!-- Script para desplegar el menu en pantallas medianas y pequeñas -->
            <script src="../scripts/mostrar-menu.js"></script>

            <div id="menuComp">
                <img src="../img/Fondos/menu_comp.png" alt="menu comprimido" onclick="mostrarMenu()">
            </div>
           <!-- Logo -->

            <img src="../img/Logos/rvr.webp" alt="logo de Footloker">

            <!-- Categorias -->
            
            <nav id="menuCategorias">
                <a href="../index.php">INICIO</a>
                <a href="tienda.php">TIENDA</a>
                <a href="tienda.php?categoria=sobremesa">SOBREMESAS</a>
                <a href="tienda.php?categoria=monitor">MONITORES</a>
                <a href="tienda.php?categoria=componente">COMPONENTES</a>
                <a href="tienda.php?categoria=periferico">PERIFERICOS</a>
                <a href="tienda.php?categoria=dispositivo-movil">SMARTPHONES</a>
                <a href="tienda.php?categoria=portatil">PORTÁTILES</a>
            </nav>



            <!-- Buscador -->

            <div id="botonBuscar">
                <form action="tienda.php" method="GET">
                    <input type="text" name="buscar" placeholder="Buscar...">
                    <button type="submit"><img src="../img/Fondos/lupa.png"></button>
                </form>
            </div>
        </div>

        <!-- Menu vertical que se despliega con el script-->

        <nav id="menuCategoriasVertical">
                <a href="../index.php">INICIO</a>
                <a href="tienda.php">TIENDA</a>
                <a href="tienda.php?categoria=sobremesa">SOBREMESAS</a>
                <a href="tienda.php?categoria=monitor">MONITORES</a>
                <a href="tienda.php?categoria=componente">COMPONENTES</a>
                <a href="tienda.php?categoria=periferico">PERIFERICOS</a>
                <a href="tienda.php?categoria=dispositivo-movil">SMARTPHONES</a>
                <a href="tienda.php?categoria=portatil" id = "menuUltimo">PORTÁTILES</a>
        </nav> 
    