<?php
//!Clase que se encarga de crear el enlace a MySQLi
class Conexion{
  public $enlace;
  /**
  *?Constructor de la clase Conexion
  */
public function __construct(){
    $servidor='localhost';
    $bd='dbtds';
    $usuario="root";
    $pass="";
    $this->enlace = mysqli_connect($servidor,$usuario,$pass,$bd) or die('Intente más tarde.');
  }
  /**
  * Método que permite ver el estado del identificador de conexion.
  *
  * Devuelve un mensaje informando que la conexion esta establecida, de no conectarse
  * retorna un mensaje informando del problema.
  */
  public function get_enlace()
  {
    if($this->enlace)
    {
      return 'Conexion establecida...'. mysqli_get_host_info($this->enlace);
    }else{
      return 'No se pudo conectar...';
    }
  }
  /**
  * Método que cierra la conexion a MySQLi
  *
  * Cierra la conexion establecida con el motor mysqli.
  * @access public
  */
  public function cerrar(){
    mysqli_close($this->enlace);
  }
}

 ?>
