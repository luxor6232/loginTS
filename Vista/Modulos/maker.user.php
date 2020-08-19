<?php
//require_once('../../Modelo/class.usuario.php');
//require_once('../../Modelo/class.query.php');
if (isset($_POST["btn-Submit-usuario"])) {
  $nom= $_POST["nom"];
  $rut = $_POST["rut"];
  $pass = sha1($_POST["pass"]);
  $mail = $_POST["mail"];
  $rol= $_POST["rol"];
  $estado= $_POST["estado"];

  $sql = "INSERT INTO `usuario`(`rut`, `nombre`, `rol`, `email`, `estado`) VALUES ('$rut','$nom','$rol','$mail','$estado')";
  $obj_query = new Query($sql);
  $obj_query->ime();

  $sql0 = "INSERT INTO `login`(`Rut`, `Password`) VALUES ('$rut','$pass')";
  $obj_query0 = new Query($sql0);
  $obj_query0->ime();
 }
 ?>
 <div>
 <h2>Registrar Usuario</h2>
   <form action="?modulo=0" method="post">
   <div >
     <div>
       <label>Nombre</label>
       <input type="text"name="nom" placeholder=""><br>
       <label>Rut</label>
       <input type="text"name="rut" placeholder=""><br>
       <label>Password</label>
       <input type="text"name="pass" placeholder=""><br>
       <label>Email</label>
       <input type="email"name="mail" placeholder=""><br>
       <label>Rol</label>
       <select id="rol" name="rol">
            <option value="1">Administrador</option>
            <option value="2">Usuario</option>
       </select>
       <label>Estado</label>
       <select id="estado" name="estado">
            <option value="1">Activo</option>
            <option value="2">Inactivo</option>
       </select><br><br>
       <input type="submit" name="btn-Submit-usuario"value="Agregar"> <a href="?modulo=1">Volver</a><br>
       
     </div>
   </div>
   </form>
   
 </div>