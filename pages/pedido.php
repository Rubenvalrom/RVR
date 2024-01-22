<?php session_start(); 
if (!isset($_SESSION['email']) || !isset($_POST['id_pedido'])) {
    header('Location: ../index.php');
}

$id_pedido = $_POST['id_pedido'];
include_once '../includes/funciones_sql.php';

$pedido = buscarProductosPedido($pdo, $id_pedido);
$precio_total = buscarPrecioTotal($pdo, $id_pedido);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pedido <?php echo $id_pedido ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> 
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<?php include_once '../includes/cabecera.php'; ?>
<main>
    
    <div class="container" id="noHr">

        <h1>Pedido <?php echo $id_pedido ?></h1>
        <table class="table">
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                </tr>
            
                <?php foreach ($pedido as $producto) { ?>
                    <tr>
                        <td><?php echo $producto['nombre']; ?></td>
                        <td><?php echo $producto['cantidad']; ?></td>
                        <td><?php echo $producto['precio']; ?></td>
                    </tr>
                    <hr>
                <?php } 
                foreach ($precio_total as $precio) { ?>
                    <tr>
                        <td></td>
                        <td><b>Total:</b></td>
                        <td><b><?php echo $precio_total['precio_total']; ?></b></td>
                    </tr>
                
               <?php } ?>
        </table>
    </div>
</main>
<?php include_once '../includes/footer.html'; ?>
</body>
</html>
    