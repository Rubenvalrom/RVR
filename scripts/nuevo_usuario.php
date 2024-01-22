<?php

// Se comprueba si se ha enviado el formulario

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Recogemos variables

    $nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : null;
    $apellidos = isset($_REQUEST['apellidos']) ? $_REQUEST['apellidos'] : null;
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $password_or = isset($_REQUEST['password']) ? $_REQUEST['password'] : null;

    // Se comprueba el email no esté registrado

    include_once '../includes/conexion_bd.php';

    $sql = "SELECT count(email) FROM usuarios WHERE email = :email";

    $select = $pdo->prepare($sql);

    // Se ejecuta el SELECT

    $select->execute(
        array(
            'email' => $email
        )
    );

    // Se comprueba si el email está registrado

    $count = $select->fetchColumn();

    // Si el email está registrado, se redirige a registro.php con el error=1

    if ($count > 0) {
        header('Location: ../pages/registro.php?error=1');
        exit;
    }

    // Si el email no está registrado, se inserta el usuario en la base de datos

    // Cifrado de contraseña

    $cost = ['cost' => 10];
    $password = password_hash($password_or, PASSWORD_BCRYPT, $cost);


    // Se prepara el INSERT

    $sql = "INSERT INTO usuarios (nombre, apellidos, email, contraseña) VALUES (:nombre, :apellidos, :email, :password)";

    $insert = $pdo->prepare($sql);

    // Se ejecuta el INSERT

    $insert->execute(
        array(
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'email' => $email,
            'password' => $password
        )
    );

    // Se comprueba si se ha insertado el usuario correctamente

    $select->execute(
        array(
            'email' => $email
        )
    );

    $count = $select->fetchColumn();

    // Si se ha insertado correctamente, se redirige a login.php

    if ($count > 0) {
        header('Location: ../pages/login.php');
        exit;
    } else {

        // Si no se ha insertado correctamente, se redirige a registro.php con el error=2

        header('Location: ../pages/registro.php?error=2');
        exit;
    }

    
} else {

    // Si no se ha enviado el formulario, se redirige a registro.php con el error=3

    header('Location: ../pages/registro.php?error=3');
}