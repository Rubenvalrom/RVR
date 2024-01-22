<?php session_start(); 

if (!isset($_SESSION['email'])){
    header('Location: ../pages/login.php');
}

if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])){
    header('Location: ../pages/tienda.php');

}else{
    $carrito = $_SESSION['carrito'];
}
include_once '../includes/funciones_sql.php';

// Meto en variables los datos necesarios para realizar el pedido en la base de datos (email, id_usuario, id_pedido, id_producto, cantidad)

$email = $_SESSION['email'];

$sql_id_usuario = buscarIdUsuario($pdo, $email);
$id_usuario = $sql_id_usuario['id_usuario'];
$id_pedido = insertPedido($pdo, $id_usuario);

foreach ($carrito as $nombre => $cantidad) {

    // Busco el id_producto y el precio del producto en la base de datos
    $sql_id_producto = buscarIdProducto($pdo, $nombre);
    $id_producto = $sql_id_producto['id_producto'];

    $sql_precio = buscarPrecio($pdo, $id_producto);
    $precio = $sql_precio['precio'];

    insertLineaPedido($pdo, $id_pedido, $id_producto, $cantidad, $precio);
    quitarStock($pdo, $id_producto, $cantidad);
}
unset($_SESSION['carrito']);
header('Location: ../pages/usuario.php');
?>
