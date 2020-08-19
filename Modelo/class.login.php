<?php

class Login{
  public $user;
  public $clave;
/**
*
* Constructor de la clase Login
*
* Es encargado de crear el objeto Login con el usuario y clave como parametros.
* inicializa los atributos de la clase Login.
*
* $usuario  Almacena el nombre de usuario en las credenciales de acceso
* $pass Almacena la clave del usuario en las credenciales de acceso.
*/
  public function __construct($usuario,$pass){
    $this->user = $usuario;
    $this->clave = $pass;
  }
  public function __destruct(){}

  public function verificar($rol_usuario){
    $sql = "SELECT * FROM login WHERE Rut='$this->user' AND password='$this->clave' /*AND tfsEstadoLog='1' */LIMIT 1";
    $query = new Query($sql,$rol_usuario);
    $arreglo = $query->select();
    $query->conexion->cerrar();
    return $arreglo;
  }
}
?>
