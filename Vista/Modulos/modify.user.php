<h1>
MODIFICAR USUARIO <a href="?modulo=1">Volver</a>
</h1>


<?php
//require_once('../../Modelo/class.conexion.php');
//require_once('../../Modelo/class.query.php');

$nom="";
$rut=""; 
$rol="";
$mail="";
$esta="";
if (isset($_POST["btn-buscar"])) {
  $busc = $_POST["busc-usuario"];
  $sql = "SELECT * FROM `usuario` WHERE `rut` = `$busc`";//SELECT `rut`, `nombre`, `rol`, `email`, `estado` FROM `usuario` WHERE `rut` = `$busc`
  $obj_query = new Query($sql);  
  $respuesta = $obj_query->select();
  echo $respuesta;
  /*
    $rut =  $value["rut"];
    $nom = $value["nombre"];
    $rol = $value["rol"];
    $mail = $value["email"];
    $esta = $value["estado"];
*/
}
if(isset($_POST["mod-usuario"])) {
    $n= $_POST["nom"];
    $r =  $_POST["rut"];
    $rl= $_POST["rol"];
    $e = $_POST["email"];
    $s = $value["estado"];
    $sql = "UPDATE `usuario` SET `rut`='$r',`nombre`='$n',`rol`='$rl',`email`='$e',`estado`='$s' WHERE `rut`='$r'";
    $obj_query = new Query($sql);
    $obj_query->ime();
   }
  ?>
 <div>
 <h2 >Modificar Usuario</h2>
   <form action="?modulo=4" method="post">
   <div>
     <div>
       <label>Buscar</label>
       <input type="text"name="busc-usuario" placeholder=" rut de quien desea buscar...">
       <br><br> 
       <button type="submit" name="btn-buscar">Buscar</button>
       <br>
       <br>
       <label>Nombre</label>
       <input type="text"name="nom" placeholder="" value="<?php echo $nom;?>">
       <label>Rut</label>
       <input type="text"name="rut" placeholder="" value="<?php echo  $rut;?>">
       <label>Correo Electronico</label>
       <input type="text"name="email" placeholder="" value="<?php echo  $mail;?>">
       <br>
       <label>Rol</label>
       <select id="rol" name="rol" value="<?php echo  $mail;?>">
            <option value="1">Administrador</option>
            <option value="2">Usuario</option>
       </select>
       <label>Estado</label value="<?php echo  $mail;?>">
       <select id="estado" name="estado">
            <option value="1">Activo</option>
            <option value="2">Inactivo</option>
       </select>
       <br>
       <br>
       <button type="submit" name="mod-usuario">Modificar</button>
     </div>
   </div>
   </form>
 </div>





