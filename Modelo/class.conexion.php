<?php
/**
* Clase que se encarga de crear el enlace a MySQLi
*
* Esta clase al ser instanciada necesitas pasar al constructor
* el rol del usuario que se esta conectando a MySQLi.
* El rol es numerico de tipo entero y por defecto se crea el rol 1
* indexado al usuario MySQL que ingresaste al Crear tu proyecto.
* Es importante que el usuario MySQL que ingreses, tenga los permisos suficientes para
* realizar las operaciones CRUD.
*/
class Conexion{
  public $enlace;
  /**
  * Constructor de la clase Conexion
  *
  * Crea una instancia de la clase Conexion con el rol del usuario como parámetro.
  * y crea el enlace de conexion almacenandolo en el atributo enlace de la clase Conexion
  * El rol por defecto es 1 y se conectará a la base de datos con las credenciales
  * del usuario que este en ese rol.
  *
  * @access public
  * @param int $rol_usuario Rol del usuario que se conectará a la Base de Datos.
  * @version 1.0
  */
public function __construct(/*$rol_usuario*/){
    $servidor='localhost';
    $bd='bd_i';
    $usuario="root";
    $pass="";
    /*
    switch ($rol_usuario) {
      case 1://admin
          $usuario='root';
          $pass='';
          break;
      case 2: //usuario
          $usuario = 'clientes';
          $pass='clientes1234';
          break;
      default:
          $usuario="root";
          $pass="";
          break;
    }*/
    $this->enlace = mysqli_connect($servidor,$usuario,$pass,$bd) or die('Intente más tarde.');
  }
  /**
  * Método que permite ver el estado del identificador de conexion.
  *
  * Devuelve un mensaje informando que la conexion esta establecida, de no conectarse
  * retorna un mensaje informando del problema.
  * @access public
  * @return string un mensaje si se establecio la conexion o no lo hizo.
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
