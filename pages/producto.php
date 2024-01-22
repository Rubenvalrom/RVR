<?php session_start(); 

// Si no hay una id se redirige a la tienda
if (!isset($_GET['id_producto'])) {
    header('Location: tienda.php');
}

$id_producto = $_GET['id_producto'];
include_once '../includes/funciones_sql.php';


// Si no existe un carrito, se crea
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}
$producto = buscarProducto($pdo, $id_producto);
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $producto['nombre'] ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
        <!-- Oferta de navidad -->
        <?php
            if(!isset($_SESSION['email'])){?>
         
                <div class="oferta">
                    <a href="login.php">Ofertas de Navidad, hasta un 30% en artículos destacados. Únete/Inicia sesión.</a>
                </div>
        <?php } ?>

        <!-- Barra de navegación -->
        <?php include_once '../includes/cabecera.php'; ?>
    </header>
<main>
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <!-- Imagen del producto -->
                <img src="../img/productos/<?php echo $id_producto ?>.webp" alt="<?php echo $producto['nombre'] ?>" class="img-fluid" id = "maxHeight" onclick="mostrarImagen()">

                <!-- Imagen del producto en grande -->
                <div id="overlay" onclick="esconderImagen()">
                    <img src="../img/productos/<?php echo $id_producto ?>.webp" alt="<?php echo $producto['nombre'] ?>" class="img-overlay">
                </div>
            </div>
                <!-- Script para mostrar y esconder una imagen del producto con más resolución -->
                <!-- Nota: El cambio es más notorio con los Smartphones  -->
            <script src="../scripts/imagenMostrarEsconder.js"></script>

               

            <div class="col-md-8">
                 <!-- Información del producto -->
                <h2><?php echo $producto['nombre'] ?></h2>
                <p><?php echo $producto['descripcion']; ?></p>
                <p>Precio: <?php echo $producto['precio'] ?> €</p>
                <p>¡Solo quedan <?php echo $producto['stock'] ?> unidades!</p>
                <button id="añadirProducto" class="btn btn-primary boton-verde" onclick="agregarAlCarrito('<?php echo $producto['nombre'] ?>', <?php echo $producto['precio']?>)">Añadir al Carrito</button>
                <br>
                <!-- Unidades dentro del carrito -->
                <section id="carrito">

                    <h5 style="margin-bottom: 2em;">Unidades en el carrito</h5>

                    <div id="itemsCarrito"></div>

                    <button id = "restarProducto" class = "btn btn-secondary" onclick="quitarDelCarrito('<?php echo $producto['nombre'] ?>')">Quitar uno</button>
                    <button id= "vaciarProducto" class= "btn btn-secondary" onclick="vaciarCarrito()">Vaciar Carrito</button>
                    
                </section>

                <!-- Script para agregar al carrito -->

                <script src="../scripts/carritoTemporal.js"></script>              

                <script>
                     //Envio a carro.php el nombre del producto que se quiere añadir al carrito 

                    $(document).ready(function(){
                        $("#añadirProducto").click(function(){
                            $.ajax({
                                url: "../scripts/carro.php",
                                type: "post",
                                data: {sumar: "<?php echo $producto['nombre']; ?>"},

                                success: function(response){
                                    console.log(response + " sumar");  // Imprime la respuesta en la consola
                                    
                                }       
                               
                            });
                        });
                    });

                    // Envio a carro.php el nombre del producto para quitar 1 unidad del carrito 

                    
                    $(document).ready(function(){
                        $("#restarProducto").click(function(){
                            $.ajax({
                                url: "../scripts/carro.php",
                                type: "post",
                                data: {restar: "<?php echo $producto['nombre']; ?>"},
                                success: function(response){
                                    console.log(response + " restar");  // Imprime la respuesta en la consola
                                    
                                } 
                            });
                        });
                    });

                    $(document).ready(function(){
                        $("#vaciarProducto").click(function(){
                            $.ajax({
                                url: "../scripts/carro.php",
                                type: "post",
                                data: {vaciar: "<?php echo $producto['nombre']; ?>"},
                                success: function(response){
                                    console.log(response + " vaciar");  // Imprime la respuesta en la consola
                                    
                                } 
                            });
                        });
                    });
            
                </script>
            </div>
        </div>
    </div>
</main>
    <?php include_once '../includes/footer.html'; ?>
</body>
</html>