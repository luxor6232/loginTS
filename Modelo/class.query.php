<?php
/**
* Clase encargada de ejecutar las Query
*
* Cada vez que tengas que ejecutar una consulta sql, deberas
* crear una instancia de la clase Query y pasarle la consulta,
* esta clase se encargará de ejecutarla, para ello esta relacionada
* con la clase Conexion, ya que esta última contiene el enlace a MySQLi.
* La clase Query esta relacionada con la clase Conexion, es por eso que
* se incluye el archivo class.conexion.php.
*/
require_once('class.conexion.php');
class Query
{
  public $sql;
  public $conexion;
  /**
  * Constructor de la clase Query
  *
  * Crea una instancia de la clase Query con la consulta sql y el rol del usuario
  * como parámetros. Asigna la query al atributo $sql de la clase Query,
  * también crea una instancia de la clase Conexion con el rol del usuario como parámetro y
  * guarda la instancia creada en el atributo $conexion de la clase Query.
  */
  public function __construct($sql=null)
  {
    $this->sql = $sql;
    $this->conexion = new conexion();

  }
  /**
  * Método que permite ejecutar las query para insertar, modificar y eliminar.
  *
  * Siempre que quieras insertar, modificar o eliminar en la base de datos, debes
  * llamar al método ime(). El método ime() no sirve para leer datos.
  * Una vez ejecutado la query, el método ime() cierra la conexion a la mysqli.
  * @access public
  * @return string|bool si realizó la query con exito retorna verdadero, en caso contrario
  * retorna un mensaje de error.
  */
  public function ime(){
    mysqli_query($this->conexion->enlace,'SET NAMES utf8') or die(mysqli_error($this->conexion->enlace));
    mysqli_query($this->conexion->enlace,'SET CHARACTER SET utf8') or die(mysqli_error($this->conexion->enlace));
    mysqli_query($this->conexion->enlace,'SET COLLATION_CONNECTION="utf8_general_ci"') or die(mysqli_error($this->conexion->enlace));

    mysqli_query($this->conexion->enlace,$this->sql);
    if(mysqli_error($this->conexion->enlace)){

      return mysqli_error($this->conexion->enlace);// o 0

    }else{

      $resp = true;// o 1
    }
    return $resp;
  }
  /**
  * Método encargado de leer datos de MySQLi
  *
  * El método select() ejecuta las query que lean informacion de la base de datos, esta
  * información la almacena en un arreglo que retorna si realizo correctamente la query, en caso contrario
  * retorna una respuesta booleana false.
  * Antes de retornar, cierra la conexion a mysqli.
  *  Si realizo correctamente la query retorna un arreglo, caso contrario retorna false.
  */
  public function select(){
    mysqli_query($this->conexion->enlace,'SET NAMES utf8') or die(mysqli_error($this->conexion->enlace));
    mysqli_query($this->conexion->enlace,'SET CHARACTER SET utf8') or die(mysqli_error($this->conexion->enlace));
    mysqli_query($this->conexion->enlace,'SET COLLATION_CONNECTION="utf8_general_ci"') or die(mysqli_error($this->conexion->enlace));

    $respuesta = mysqli_query($this->conexion->enlace,$this->sql);

    if(!mysqli_error($this->conexion->enlace)){
      $arreglo = array();
      while($row = mysqli_fetch_array($respuesta)){
        $arreglo[] = $row;
      }
      $resp = $arreglo;
    }else{
      $resp = false;
    }
    return $resp;
  }
}
?>
