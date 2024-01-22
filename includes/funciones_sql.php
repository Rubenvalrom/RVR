<?php

include_once 'conexion_bd.php';

// Función para buscar productos

function buscarProductos($pdo, $busqueda) {
    
    // Le doy formato a la búsqueda con LIKE

    $busqueda = "%".$busqueda."%";

    // Se prepara el SELECT

    $sql = "SELECT id_producto, CONCAT(UPPER(marca),' ',nombre) as 'producto' FROM productos WHERE CONCAT(marca,nombre,descripcion,categoria,subcategoria) LIKE LOWER(:busqueda)";

    $select = $pdo->prepare($sql);

    // Se ejecuta el SELECT

    $select->execute(
        array(
            'busqueda' => $busqueda
        )
    );
    // Cambio el fetch mode para que me devuelva un array asociativo
    
    $select-> setFetchMode(PDO::FETCH_ASSOC);

    // Se devuelve el resultado del SELECT

    return $select->fetchAll();
} 

// Función para mostrar productos pertenecientes a una categoría

function mostrarCategoria($pdo, $categoria){

    // Se prepara el SELECT

    $sql = "SELECT id_producto, CONCAT(UPPER(marca),' ',nombre) as 'producto' FROM productos WHERE categoria = :categoria";

    $select = $pdo->prepare($sql);

    // Se ejecuta el SELECT

    $select->execute(
        array(
            'categoria' => $categoria
        )
    );
    // Cambio el fetch mode para que me devuelva un array asociativo

    $select-> setFetchMode(PDO::FETCH_ASSOC);

    // Se devuelve el resultado del SELECT

    return $select->fetchAll();
}   

// Función para mostrar todos los productos

function mostrarProductos($pdo){

    // Se prepara el SELECT

    $sql = "SELECT id_producto, CONCAT(UPPER(marca),' ',nombre) as 'producto' FROM productos";

    $select = $pdo->prepare($sql);

    // Se ejecuta el SELECT

    $select->execute();

    // Cambio el fetch mode para que me devuelva un array asociativo

    $select-> setFetchMode(PDO::FETCH_ASSOC);

    // Se devuelve el resultado del SELECT

    return $select->fetchAll();
}

function buscarUsuario($pdo, $email) {

    // Se prepara el SELECT

    $sql = "SELECT nombre, apellidos FROM usuarios WHERE email = :email";

    $select = $pdo->prepare($sql);

    // Se ejecuta el SELECT

    $select->execute(
        array(
            'email' => $email
        )
    );

    // Cambio el fetch mode para que me devuelva un array asociativo

    $select-> setFetchMode(PDO::FETCH_ASSOC);

    // Se devuelve el resultado del SELECT

    return $select->fetch();
}

function buscarPedidos($pdo, $email) {

    // Se prepara el SELECT

    $sql = "SELECT p.id_pedido as 'id', p.fecha as 'fecha', p.estado as 'estado' FROM pedidos p 
        join usuarios u on p.id_usuario = u.id_usuario
        WHERE u.email = :email";

    $select = $pdo->prepare($sql);

    // Se ejecuta el SELECT

    $select->execute(
        array(
            'email' => $email
        )
    );

    // Cambio el fetch mode para que me devuelva un array asociativo

    $select-> setFetchMode(PDO::FETCH_ASSOC);

    // Se devuelve el resultado del SELECT

    return $select->fetchAll();
}

function buscarProductosPedido($pdo, $id_pedido) {

    // Se prepara el SELECT

    $sql = "SELECT p.id_producto as 'id', p.cantidad as 'cantidad', p.precio as 'precio', CONCAT(UPPER(pr.marca),' ',pr.nombre) as 'nombre' FROM productos_pedido p 
        join productos pr on p.id_producto = pr.id_producto
        WHERE p.id_pedido = :id_pedido";

    $select = $pdo->prepare($sql);

    // Se ejecuta el SELECT

    $select->execute(
        array(
            'id_pedido' => $id_pedido
        )
    );

    // Cambio el fetch mode para que me devuelva un array asociativo

    $select-> setFetchMode(PDO::FETCH_ASSOC);

    // Se devuelve el resultado del SELECT

    return $select->fetchAll();
}

function buscarPrecioTotal($pdo, $id_pedido){
    
    // Se prepara el SELECT

    $sql = "SELECT SUM(precio * cantidad) as 'precio_total' FROM productos_pedido 
    GROUP BY id_pedido HAVING id_pedido = :id_pedido";

    $select = $pdo->prepare($sql);

    // Se ejecuta el SELECT

    $select->execute(
        array(
            'id_pedido' => $id_pedido
        )
    );

    // Cambio el fetch mode para que me devuelva un array asociativo

    $select-> setFetchMode(PDO::FETCH_ASSOC);

    // Se devuelve el resultado del SELECT

    return $select->fetch();
}

function buscarProducto($pdo, $id_producto) {

    // Se prepara el SELECT

    $sql = "SELECT CONCAT(UPPER(p.marca),' ',p.nombre) as 'nombre', p.stock as 'stock', p.descripcion as 'descripcion', pr.precio as 'precio' 
            FROM productos p JOIN precios pr ON p.id_producto = pr.id_producto 
            WHERE p.id_producto = :id_producto
            ORDER BY pr.fecha DESC LIMIT 1";

    $select = $pdo->prepare($sql);

    // Se ejecuta el SELECT

    $select->execute(
        array(
            'id_producto' => $id_producto
        )
    );

    // Cambio el fetch mode para que me devuelva un array asociativo

    $select-> setFetchMode(PDO::FETCH_ASSOC);

    // Se devuelve el resultado del SELECT

    return $select->fetch();
}

function buscarIdProducto($pdo, $nombre) {

    // Se prepara el SELECT

    $sql = "SELECT id_producto FROM productos WHERE CONCAT(UPPER(marca),' ',nombre) = :nombre";

    $select = $pdo->prepare($sql);

    // Se ejecuta el SELECT

    $select->execute(
        array(
            'nombre' => $nombre
        )
    );

    // Cambio el fetch mode para que me devuelva un array asociativo

    $select-> setFetchMode(PDO::FETCH_ASSOC);

    // Se devuelve el resultado del SELECT

    return $select->fetch();
}
function buscarPrecio($pdo, $id_producto) {

    // Se prepara el SELECT

    $sql = "SELECT precio FROM precios WHERE id_producto = :id_producto ORDER BY fecha DESC LIMIT 1";

    $select = $pdo->prepare($sql);

    // Se ejecuta el SELECT

    $select->execute(
        array(
            'id_producto' => $id_producto
        )
    );

    // Cambio el fetch mode para que me devuelva un array asociativo

    $select-> setFetchMode(PDO::FETCH_ASSOC);
    
    // Se devuelve el resultado del SELECT

    return $select->fetch();
}

function buscarStock($pdo, $id_producto) {

    // Se prepara el SELECT

    $sql = "SELECT stock FROM productos WHERE id_producto = :id_producto";

    $select = $pdo->prepare($sql);

    // Se ejecuta el SELECT

    $select->execute(
        array(
            'id_producto' => $id_producto
        )
    );

    // Cambio el fetch mode para que me devuelva un array asociativo

    $select-> setFetchMode(PDO::FETCH_ASSOC);
    
    // Se devuelve el resultado del SELECT

    return $select->fetch();
}
function buscarIdUsuario ($pdo, $email) {

    // Se prepara el SELECT

    $sql = "SELECT id_usuario FROM usuarios WHERE email = :email";

    $select = $pdo->prepare($sql);

    // Se ejecuta el SELECT

    $select->execute(
        array(
            'email' => $email
        )
    );

    // Cambio el fetch mode para que me devuelva un array asociativo

    $select-> setFetchMode(PDO::FETCH_ASSOC);
    
    // Se devuelve el resultado del SELECT

    return $select->fetch();
}

function insertPedido($pdo, $id_usuario)
{
    // Se prepara el INSERT
    $sql = "INSERT INTO pedidos (id_usuario) VALUES (:id_usuario)";
    $insert = $pdo->prepare($sql);

    // Se ejecuta el INSERT
    $insert->execute(
        array(
            'id_usuario' => $id_usuario
        )
    );

    // Me devuelve el id_pedido generado por el INSERT

    return $pdo->lastInsertId();
}

function insertLineaPedido($pdo, $id_pedido, $id_producto, $cantidad, $precio)
{
    // Se prepara el INSERT
    $sql = "INSERT INTO productos_pedido (id_pedido, id_producto, cantidad, precio) VALUES (:id_pedido, :id_producto, :cantidad, :precio)";
    $insert = $pdo->prepare($sql);

    // Se ejecuta el INSERT
    $insert->execute(
        array(
            'id_pedido' => $id_pedido,
            'id_producto' => $id_producto,
            'cantidad' => $cantidad,
            'precio' => $precio
        )
    );
}
function quitarStock($pdo, $id_producto, $cantidad)
{
    // Se prepara el UPDATE
    $sql = "UPDATE productos SET stock = stock - :cantidad WHERE id_producto = :id_producto";
    $update = $pdo->prepare($sql);

    // Se ejecuta el UPDATE
    $update->execute(
        array(
            'id_producto' => $id_producto,
            'cantidad' => $cantidad
        )
    );
}

function borrarUsuario($pdo, $id_usuario)
{
    // Se prepara el DELETE
    $sql = "DELETE FROM usuarios WHERE id_usuario = :id_usuario";
    $delete = $pdo->prepare($sql);

    // Se ejecuta el DELETE
    $delete->execute(
        array(
            'id_usuario' => $id_usuario
        )
    );
}