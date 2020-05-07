<?php
require_once('config/global.config.php');
require_once('../modelo/class.query.php');
require_once('../modelo/class.login.php');
require_once('../modelo/class.usuario.php');
/**
*
* Importo el archivo filtro.php para limpiar los datos que llegan al servidor desde el cliente.
*/
require_once("filtro.php");
session_start();
if(isset($_POST['user']) && isset($_POST['pass']))
{
    /* variable string $usuario contiene el usuario filtrado */
    $usuario = limpiar($_POST['user']);
    /* variable string $usuario_original contiene el usuario original, es decir sin filtrar convertido a minuscula. */
    $usuario_original = strtolower($_POST['user']);
    /* if que compara si la variable que entrega el filtro, es igual a la sin filtrar
    si da verdadero significa que no hay ataque por inyeccion */
    if($usuario == $usuario_original)
    {
      $pass = $_POST['pass'];
      /* bloque que encripta la clave */
      //$pass = sha1(PREFIJO_CRIP.$_POST['pass']);
      /* fin bloque*/

      /*Creamos el objeto Login que verificara las credenciales en la base de datos*/
      $obj_login = new Login($usuario,$pass);
      $arreglo = $obj_login->verificar(1);
      /* fin bloque*/

      /* bloque: condicion if que compara el largo del array $arreglo con el valor 0 */
      if(count($arreglo) == 0)
      {
        $resp_ajax = 'false';
      }
      else
      {


        //Creamos el usuario con su infomacion personal
        $logeado = new Usuario(null,$usuario);
        $logeado->crear_usuario();
        /* Creamos la session */

        //$resp_ajax = "index2.php";

        if ($logeado->id_rol == 1) {
          $_SESSION['admin'] = $logeado;
          header('LOCATION: ../Vista/index.backend.php');
        } else {
          $_SESSION['user'] = $logeado;
          header('LOCATION: ../Vista/index.frontend.php');
        }



      }
      /* fin bloque */

    }//fin if($usuario == $usuario_original)
    else
    {
      //Intento de hackeo
        $resp_ajax = "";
    }
   echo $resp_ajax;
}

?>
