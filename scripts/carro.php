<?php
session_start();


// Añade un producto al carrito y le suma una unidad
if (isset($_POST['sumar'])) {

    $nombre = $_POST['sumar'];

    echo $nombre;

    if (!isset($_SESSION['carrito'][$nombre])) {
        $_SESSION['carrito'][$nombre] = 1;
    } else {
        $_SESSION['carrito'][$nombre]++;
    }
}

// Resta una unidad al producto del carrito
if (isset($_POST['restar'])){

    $nombre = $_POST['restar'];
    echo $nombre;
    if (isset($_SESSION['carrito'][$nombre])) {
        $_SESSION['carrito'][$nombre]--;

        if ($_SESSION['carrito'][$nombre] == 0) {
            unset($_SESSION['carrito'][$nombre]);
        }
    }

}

// Quita por completo el producto del carrito
if (isset($_POST['vaciar'])) {

    $nombre = $_POST['vaciar'];
    echo $nombre;
    if (isset($_SESSION['carrito'][$nombre])) {

        unset($_SESSION['carrito'][$nombre]);
    }
}

// Si se ha mandado la intrucción desde la cesta se regresa a ella

if (isset($_POST['volver'])) {
    header("Location: ../pages/realizar_pedido.php");
}
?>