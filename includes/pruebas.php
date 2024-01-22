<?php

include_once 'funciones_sql.php';

$buscar = "de";
$productos = buscarProductos($pdo, $buscar); // Assign the returned value to $productos

foreach ($productos as $producto) {
    echo $producto['producto'];
    echo $producto['id_producto'];
    echo "<br>";
}

