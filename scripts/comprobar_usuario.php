<?php session_start();

// Se comprueba si se ha enviado el formulario

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Recogemos variables

    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $password = isset($_REQUEST['password']) ? $_REQUEST['password'] : null;

    // Se prepara el SELECT

    include_once '../includes/conexion_bd.php';

    $sql = "SELECT email, contraseña FROM usuarios WHERE email = :email";

    $select = $pdo->prepare($sql);

    // Se ejecuta el SELECT

    $select->execute(
        array(
            'email' => $email
        )
    );

    // Se comprueba el número de filas devueltas   

    if ($select->rowCount() == 0) {
        
         // Si el email no está registrado, se redirige a login.php con el error=1
        header('Location: ../pages/login.php?error=1');
        exit;
    }else{
        $usuario = $select->fetch();
        $contraseña_encriptada = $usuario['contraseña'];

        // Se comprueba si la contraseña es correcta

        if(password_verify($password, $contraseña_encriptada)){

            // Si la contraseña es correcta: 1. se comprueba si le ha dado a "recuerdame se inicia sesión y se redirige a index.php

            // 1. Si le ha dado a "recuerdame" se establece una cookie con el email y se inicia sesión

            if (isset($_POST['recuerda'])) {
                $año = time() + 31536000;
                setcookie('email', $email, $año, '/');
            }
   
            $_SESSION['email'] = $email;
           header('Location: ../index.php');

        }else{
            // Si la contraseña no es correcta, se redirige a login.php con el error=2
            header('Location: ../pages/login.php?error=2');
        }
    }

} else {

    // Si no se ha enviado el formulario, se redirige a login.php con el error=3

    header('Location: ../pages/login.php?error=3');
}
