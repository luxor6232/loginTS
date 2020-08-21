<style>
/*form*/
* {
  box-sizing: border-box;
}
input[type=text], select{
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
select{
  width: 40%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
input[type=email]{
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #28d;
  color: white;
  padding: 9px 25px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #17c;
}

.contenedorMaker {
  margin-left: 8em;
  width: 75%;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  float: center;
}
/* a */
.btna1:link, .btna1:visited {
  background-color: #28d;
  color: white;
  padding: 8px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  border-radius: 4px
}

.btna1:hover, .btna1:active {
  background-color: #17c;
}
/*h2*/
h2{
  text-align: center;
}
</style>
<?php
//require_once('../../Modelo/class.usuario.php');
//require_once('../../Modelo/class.query.php');
if (isset($_POST["btn-Submit-usuario"])) {
  $nom= $_POST["nom"];
  $rut = $_POST["rut"];
  $pass = $_POST["pass"];
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
 <h2>Registrar Usuario</h2>
 <div class="contenedorMaker"> 
   <form action="?modulo=0" method="post">
   <div >
     <div>
       <label>Nombre</label>
       <input type="text"name="nom" placeholder="">
       <label>Rut</label>
       <input type="text"name="rut" placeholder="">
       <label>Password</label>
       <input type="text"name="pass" placeholder="">
       <label>Email</label>
       <input type="email"name="mail" placeholder=""><br><br>
       <label>Rol</label>
       <select id="rol" name="rol">
            <option value="1">Administrador</option>
            <option value="2">Usuario</option>
       </select >
       <label style="margin-left:4%;">Estado</label>
       <select id="estado" name="estado" >
            <option value="1">Activo</option>
            <option value="2">Inactivo</option>
       </select><br><br>
       <input type="submit" name="btn-Submit-usuario"value="Agregar"> <a class="btna1" href="?modulo=1">Volver</a><br>
       
     </div>
   </div>
   </form>
   
 </div>