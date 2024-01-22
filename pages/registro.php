<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Registro</title>
</head>
<body>

    <!----------------------- Main Container -------------------------->

     <div class="container d-flex justify-content-center align-items-center min-vh-100">
    
     <!----------------------- Back Button -------------------------->
    
        <button class="btn btn-primary position-absolute top-0 start-0 mt-3 ms-3 boton-verde" onclick="window.location.href='../index.php'">Volver</button>

    <!----------------------- Login Container -------------------------->

       <div class="row border rounded-5 p-3 bg-white shadow box-area" style=" margin-top: 1em;">

    <!--------------------------- Left Box ----------------------------->

    <div class="col-md-6 registro-left-box">

          <div class="row align-items-center">

                <div class="header-text mb-4">
                     <h2>Registrate</h2>
                     <p>Aprovecha nuestras ofertas</p>
                </div>

                <form action="../scripts/nuevo_usuario.php" method="post">
                    <div class="input-group mb-3">
                        <input type="text" id="nombre" name="nombre" class="form-control form-control-lg bg-light fs-6" placeholder="Nombre" required>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" id="apellidos" name="apellidos" class="form-control form-control-lg bg-light fs-6" placeholder="Apellidos" required>
                    </div>

                    <div class="input-group mb-3">
                        <input type="email" id="email" name="email" class="form-control form-control-lg bg-light fs-6" placeholder="Correo Electrónico" required>
                    </div>

                    <div class="input-group mb-1">
                        <input type="password" id="password" name="password" class="form-control form-control-lg bg-light fs-6" placeholder="Contraseña" required style="border-right:0">

                        <div class="input-group-append form-control-lg bg-light fs-6 mostrar-contraseña">
                            <button type="button" class="btn btn-light icon-button" style="padding: 0;" id="ver-contraseña">
                                <img src="../img/fondos/ojo.png" alt="Mostrar contraseña" style="width: 20px;">
                            </button> 
                            <!-- script para mostrar la contraseña al pulsar el icono -->               
                            <script src="../scripts/mostrar-contraseña.js"></script>          
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <button type="submit" class="btn btn-lg btn-primary w-100 fs-6 boton-verde" style="margin-top: 1rem;">Registrarse</button>
                    </div>
                </form>
                <div class="row">
                    <small>¿Ya tienes cuenta? <a href="login.php">Iniciar Sesión</a></small>
                </div>
                <?php

                if (isset($_GET['error'])) {
                    $error = $_GET['error'];
                    if ($error == 1) {
                        echo '<div class="alert alert-danger mt-3" role="alert">
                        El email ya está registrado
                        </div>';
                    } else if ($error == 2) {
                        echo '<div class="alert alert-danger mt-3" role="alert">
                        Se ha producido un error al registrar el usuario, intentelo más tarde
                        </div>';
                    } else if ($error == 3) {
                        echo '<div class="alert alert-danger mt-3" role="alert">
                        Se ha producido un error al registrar el usuario, intentelo de nuevo
                        </div>';
                    }
                }

                 ?>
          </div>
       </div> 

    <!--------------------------- Right Box ---------------------------->
        
       <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column registro-right-box" style="background: #C2E3DC;">
           <div class="featured-image mb-3" style="margin-top: 0; padding-top:0">
            <img src="../img/fondos/login.png" class="img-fluid" style="width: 450px;">
           </div>
            <h2>Nuevos artículos a diario</h2>
            <p>¡Personaliza tu lista de deseos!</p>
       </div> 

      </div>
    </div>

</body>
</html>
