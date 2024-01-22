<?php
if (!isset($_SESSION['email'])){
    header('Location: ../pages/login.php');
}

include_once '../includes/funciones_sql.php';

$email = $_SESSION['email'];

$sql_id_usuario = buscarIdUsuario($pdo, $email);
$id_usuario = $sql_id_usuario['id_usuario'];

// Comprobamos si el usuario se borra correctamente

if (borrarUsuario($pdo, $id_usuario)) {
    unset($_SESSION['email']);
    unset($_SESSION['carrito']);
    header('Location: ../pages/login.php');
} else {
    
    echo "Error al borrar el usuario";
}
