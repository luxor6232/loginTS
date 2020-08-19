<?php
/*
primero cargamos la clase usuario y luego iniciamos sesion, de lo contrario
la sesion no podra leer el objeto usuario dentro de ella
*/
require_once('../modelo/class.query.php');
require_once('../modelo/class.usuario.php');
session_start();


/* Verificamos si se cerrara la sesion antes de cargar el sitio*/
if(isset($_GET['modulo']) && $_GET['modulo']==666)
{
  session_destroy();
  header("location:index.php");
}

if(isset($_SESSION['admin']))
{//extraemos el valor que nos envia la base de datos y lo remplazamos, si es 1 es administrador y si es 2 es usuario.
  if($_SESSION['admin']->id_rol = 1){
    $rol = "Administrador";
  }else{
    $rol = "Usuario";
  }
//extraemos el valor que nos envia la base de datos y lo remplazamos, si es 1 esta Activo y si es 2 esta inactivo.
  if($_SESSION['admin']->estado = 1){
    $esta = "Activo";
  }else{
    $esta = "Inactivo";
  }

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
      <div style="margin-left:4%;">
      <?php
          echo "<h4>Bienvenido Administrador ".$_SESSION['admin']->nombre_usuario."</h4>
          Rut: ".$_SESSION['admin']->rut."
          <br>Correo: ".$_SESSION['admin']->correo_usuario."
          <br>Rol: ".$rol."
          <br>Estado: ".$esta;
                 
      ?>      
      </div><!-- menu-->
        <br>      
        <li><a class="active" href="#home">Home</a></li>
        <li><a href="?modulo=0">Proyectos</a></li>
        <li><a href="?modulo=1">Usuarios</a></li>
        <li><a href="?modulo=2">About</a></li>
        <li><a href="../modelo/class.logout.php">Salir</a></li>
      </ul>

      <div style="margin-left:25%;padding:1px 16px;height:1000px;">
        <?php

          //modulo donde llamamos los archivos a solicitar
          $menu = 0;
          if (isset($_GET["modulo"])) {
            $menu = $_GET["modulo"];
          }
          switch ($menu)
          {
            case 0:
              //require_once('#');
              break;
            case 1:
              require_once('Modulos/view.user.php');
              break;
            case 4:
              require_once('Modulos/modify.user.php');
              break;              
            case 5:
              require_once('Modulos/maker.user.php');
              break;
            default:
              require_once('index.backend.php');
              break;
          }
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
