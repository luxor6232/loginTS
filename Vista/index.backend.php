<?php
/*
primero cargamos la clase usuario y luego iniciamos sesion, de lo contrario
la sesion no podra leer el objeto usuario dentro de ella
*/
require_once('../modelo/class.query.php');
require_once('../modelo/class.usuario.php');
//?require_once('../modelo/class.plantilla.php');
//?require_once('../../controlador/plantilla.controlador.php');
session_start();


/* Verificamos si se cerrara la sesion antes de cargar el sitio*/
if(isset($_GET['modulo']) && $_GET['modulo']==666)
{
  session_destroy();
  header("location:index.php");
}

if(isset($_SESSION['admin']))
{

 ?>
<!DOCTYPE html>
<html>

 <head>

     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <link rel="stylesheet" href="assets/css/Loby.styles.css">
     <title>Web admin</title>


 </head>
 <body>
 
      <ul>
        <li><a class="active" href="#home">Home</a></li>
        <li><a href="#news">News</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="../modelo/class.logout.php">Salir</a></li>
      </ul>

      <div style="margin-left:25%;padding:1px 16px;height:1000px;">
        <?php
          echo "<h2>Bienvenido Administrador ".$_SESSION['admin']->nombre_usuario."</h2>
          <br>Password: ".$_SESSION['admin']->rut."
          <br>Correo: ".$_SESSION['admin']->correo_usuario."
          <br>Rol: ".$_SESSION['admin']->id_rol."
          <br>Estado: ".$_SESSION['admin']->estado;
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
