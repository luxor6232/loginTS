<?php
/*
primero cargamos la clase usuario y luego iniciamos sesion, de lo contrario
la sesion no podra leer el objeto usuario dentro de ella
*/
require_once('../modelo/class.query.php');
require_once('../modelo/class.usuario.php');
//require_once('../modelo/class.plantilla.php');
//require_once('../../controlador/plantilla.controlador.php');
session_start();


/* Verificamos si se cerrara la sesion antes de cargar el sitio*/
if(isset($_GET['modulo']) && $_GET['modulo']==666)
{
  session_destroy();
  header("location:index.php");
}

if(isset($_SESSION['user']))
{

 ?>
<!DOCTYPE html>
<html>

 <head>

     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <link rel="stylesheet" href="assets/css/Loby2.styles.css">
     <title>Web Usuario</title>


 </head>
 <body>
      <h2>Menu</h2>

      <ul>
        <li><a class="active" href="#home">Home</a></li>
        <li><a href="#contact">Realizar Solicitud</a></li>
        <li><a href="../modelo/class.logout.php">Salir</a></li>
      </ul>
        <?php
          echo "<h1>Bienvenido Usuario ".$_SESSION['user']->nombre_usuario."</h1>
          <br>Password: ".$_SESSION['user']->rut."
          <br>Correo: ".$_SESSION['user']->correo_usuario."
          <br>Rol: ".$_SESSION['user']->id_rol."
          <br>Estado: ".$_SESSION['user']->estado;
        ?>
      </div>
 </body>
</html>
<?php
}
else {
  header("location:index.php");
}
 ?>
