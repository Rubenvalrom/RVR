<?php session_start();

if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])){
    $vacio = "No hay productos en la cesta";
}else{
    $carrito = $_SESSION['carrito'];
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Carrito de la compra</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> 
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <!-- Oferta de navidad -->
<?php
    if(!isset($_SESSION['email'])){?>
    
        <div class="oferta">
            <a href="login.php">Ofertas de Navidad, hasta un 30% en artículos destacados. Únete/Inicia sesión.</a>
        </div>
<?php } ?>

<?php include_once '../includes/cabecera.php'; 
      include_once '../includes/funciones_sql.php';  ?>
<main>
    <div class="container" style="min-height:50vh;">
        <h1>Cesta</h1>
        <?php 
        if(isset($vacio)){
                    
            echo "<h4 style='margin-top: 2em;'>".$vacio."</h4>";

        }else{ ?>

        <table class="table">
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Coste (€)</th>
                    <th></th>
                    <th></th>
                </tr>
                
                <?php 

                    // Recorre el array de la cesta y muestra los productos y la cantidad de cada uno
                    $precioTotal = 0;
                    foreach ($carrito as $producto => $cantidad) { 
                        
                        $id = buscarIdProducto($pdo, $producto);
                        $precio = buscarPrecio($pdo, $id['id_producto']);
                        $stock = buscarStock($pdo, $id['id_producto']);

                        if ($cantidad > $stock['stock']){
                            $cantidad = $stock['stock'];
                        }
                        $precioTotal += $precio['precio'] * $cantidad;

                        ?>
                        <tr>
                            <td><?php echo $producto; ?></td>
                            <td><?php echo $cantidad; ?></td>
                            <td><?php echo $precio['precio'] * $cantidad; ?></td>
                            <td>
                                <form action="../scripts/carro.php" method="post">
                                    <input type="hidden" name="volver" value="1">
                                    <input type="hidden" name="restar" value="<?php echo $producto; ?>">
                                    <input type="submit" value="Restar" class = "btn btn-secondary cesta">
                                </form>
                            </td>
                            <td>
                                <form action="../scripts/carro.php" method="post">
                                    <input type="hidden" name="volver" value="1">
                                    <input type="hidden" name="vaciar" value="<?php echo $producto; ?>">
                                    <input type="submit" value="Vaciar" class = "btn btn-secondary cesta">
                                </form>
                        </tr>
                        
                    <?php } ?>
                    <td></td>
                        <td><b>Coste Total:</b></td>
                        <td><?php echo $precioTotal ?></td>   
                        
        </table>
        <!-- Botón para realizar el pedido -->
        <?php
        if(isset($_SESSION['email'])){ ?>
            <!-- Si el usuario está logueado, se lleva a cabo el pedido -->  
        <button type="button" class="btn btn-primary boton-verde" onclick="window.location.href='../scripts/añadir_pedido.php'">Realizar pedido</button>
<?php   }else{ ?>        
        <!-- Si el usuario no está logueado, se le redirige a la página de login -->  
        <button type="button" class="btn btn-primary boton-verde" onclick="window.location.href='./login.php'">Realizar pedido</button>

<?php   } 
    }?>
            
    </div>
</main>




</main>
<?php include_once '../includes/footer.html'; ?>
</body>
</html>