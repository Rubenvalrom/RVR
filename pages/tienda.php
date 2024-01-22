<?php session_start(); 

// Si no existe un carrito, se crea
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> 
    <link rel="stylesheet" href="../css/styles.css">

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

        <?php include_once '../includes/cabecera.php'; ?>
    </header>
    <main>
        <?php
        // Agrego las funciones para mostrar los productos
        include_once '../includes/funciones_sql.php';        

        if (isset($_GET['categoria'])) {

            $categoria = $_GET['categoria'];
            $productos = mostrarCategoria($pdo, $categoria);
            $encabezado = "Categoría: ".$categoria;
            
            if($categoria == "dispositivo-movil") $encabezado = "Categoría: Smartphones";

        } else if (isset($_GET['buscar']) && $_GET['buscar'] != "") {

            $busqueda = $_GET['buscar'];
            $productos = buscarProductos($pdo, $busqueda);
            $encabezado = "Resultados de la búsqueda: ".$busqueda;
            if (count($productos) == 0) {
                $encabezado = "No se han encontrado resultados para la búsqueda: ".$busqueda;
            }

        } else {
            $productos = mostrarProductos($pdo);
            $encabezado = "Todos nuestros productos";
        }


        ?>

       

        <div class="container contenedorTienda">
            <div class="encabezadoTienda">
                <h1 class="display-4"><?php echo $encabezado; ?></h1>
            </div>
            <div class="row filaTienda">
                <?php foreach ($productos as $producto) { ?>
                   
                        <div class="col-md-3 col-sm-6 contenedorProducto">
                            <div class="card">
                                <a href="producto.php?id_producto=<?php echo $producto['id_producto']; ?>"><img src="../img/productos/<?php echo $producto['id_producto']; ?>.webp" class="card-img-top" alt="<?php echo $producto['producto']; ?>"></a>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $producto['producto']; ?></h5>
                                </div>
                            </div>
                        </div>
                    
                <?php } ?>
            </div>
        </div>
    </main>
    <?php include_once '../includes/footer.html'; ?>
</body>
</html>
    