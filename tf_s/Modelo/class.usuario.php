<?php
require_once('class.query.php');
/**
 *
 */
class Usuario
{
  public $nombre_usuario;
  public $rut;
  public $correo_usuario;
  public $id_rol;
  public $estado;
  function __construct($nombre_usuario=null,$rut=null,$correo_usuario=null,$id_rol=null,$estado=null)
  {
    $this->nombre_usuario = $nombre_usuario;
    $this->rut = $rut;
    $this->correo_usuario = $correo_usuario;
    $this->id_rol = $id_rol;
    $this->estado = $estado;
  }

  public function crear_usuario()
  {
    $sql = "SELECT * FROM tfsusuarios WHERE UserRut = '$this->rut' LIMIT 1";
  $query = new Query($sql,1);
    $datos = $query->select();
    foreach ($datos as  $value) {
      $this->nombre_usuario = $value['UserNombre'];
      $this->rut = $value['UserRut'];
      $this->correo_usuario = $value['UserEmail'];
      $this->id_rol = $value['UserRol'];
      $this->estado = $value['UserEstado'];
    }
  }
}

 ?>
