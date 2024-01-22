<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Inicio de sesión</title>
</head>
<body>

    <!----------------------- Main Container -------------------------->

     <div class="container d-flex justify-content-center align-items-center min-vh-100">
    
     <!----------------------- Back Button -------------------------->
    
     <button class="btn btn-primary position-absolute top-0 start-0 mt-3 ms-3 boton-verde" onclick="window.location.href='../index.php'">Volver</button>

    <!----------------------- Login Container -------------------------->

       <div class="row border rounded-5 p-3 bg-white shadow box-area" style=" margin-top: 3.5em;">

    <!--------------------------- Left Box ----------------------------->

       <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column login-left-box" style="background: #C2E3DC;">
           <div class="featured-image mb-3" style="margin-top: 0; padding-top:0">
            <img src="../img/fondos/login.png" class="img-fluid" style="width: 450px;">
           </div>
            <h2>¡Bienvenido!</h2>
            <p>¡Nos alegra tenerte de vuelta!</p>
       </div> 
    <!--------------------------- Right Box ---------------------------->
        
       <div class="col-md-6 login-right-box">

          <div class="row align-items-center">

                <div class="header-text mb-4">
                     <h2>Iniciar Sesión</h2>
                     <p>Descubre nuestros productos</p>
                </div>

                <form action="../scripts/comprobar_usuario.php" method="post">

                    <div class="input-group mb-3">
                        <input type="email" id="email" name="email" class="form-control form-control-lg bg-light fs-6" placeholder="Correo Electrónico" required <?php
                       
                       //si la cookie email existe, se muestra en el campo email

                        if (isset($_COOKIE['email'])) {
                            $email =urldecode($_COOKIE['email']);
                        } else {
                            $email = '';
                        }
                        ?>
                        value="<?php echo $email; ?>">
                                                    
                           
                    </div>

                    </div>
                    <div class="input-group mb-1">
                        <input type="password" id="password" name="password" class="form-control form-control-lg bg-light fs-6" placeholder="Contraseña" required style="border-right:0">


                        <div class="input-group-append form-control-lg bg-light fs-6 " style="border: 1px #CED4DA solid; border-top-right-radius: .5rem; border-bottom-right-radius: .5rem;">
                            <button type="button" class="btn btn-light icon-button" style="padding: 0;" id= "ver-contraseña">
                                <img src="../img/fondos/ojo.png" alt="Mostrar contraseña" style="width: 20px;">
                            </button>   
                            <!-- script para mostrar la contraseña al pulsar el icono -->               
                            <script src="../scripts/mostrar-contraseña.js"></script>  
                        </div>  


                    <div class="input-group mb-5 d-flex justify-content-between">

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id ="recuerda" name="recuerda" value="1">
                            <label for="recuerda" class="form-check-label text-secondary"><small>Recordarme</small></label>
                        </div>

                    </div>

                    <div class="input-group mb-3">
                        <button type= "submit" class="btn btn-lg btn-primary w-100 fs-6 boton-verde">Entrar</button>
                    </div>

                </form>

                <div class="row">
                    <small>¿No tienes cuenta? <a href="registro.php">Registrarse</a></small>
                </div>
                <?php

                if (isset($_GET['error'])) {
                    $error = $_GET['error'];
                    if ($error == 1) {
                        echo '<div class="alert alert-danger mt-3" role="alert">
                        El email no está registrado
                        </div>';
                    } else if ($error == 2) {
                        echo '<div class="alert alert-danger mt-3" role="alert">
                        La contraseña no es correcta
                        </div>';
                    } else if ($error == 3) {
                        echo '<div class="alert alert-danger mt-3" role="alert">
                        Se ha producido un error al iniciar sesión, intentelo de nuevo
                        </div>';
                    }
                }

                 ?>
          </div>
       </div> 

      </div>
    </div>

</body>
</html>