<style>
/*Table*/
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #17c;
  color: white;
}
/* a */
.btna:link, .btna:visited {
  background-color: #28d;
  color: white;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  border-radius: 4px
}

.btna:hover, .btna:active {
  background-color: #17c;
}
/*h1*/
h1{
  text-align: center;
}
</style>



<h1> Usuarios GTD </h1>
<br>


<?php
      //require_once('../../modelo/class.usuario.php');
      //require_once('../../modelo/class.query.php');
      $sql = "SELECT * FROM usuario";
      $obj_query = new Query($sql);
      $respuesta = $obj_query->select();
      ?> 
      <a class="btna" href="?modulo=4">Modificar Usuario</a>
      <a class="btna" href="?modulo=5">Crear Usuario</a>
      <table style="width:100%">
      <tr>
        <th>Rut</th>
        <th>Nombre</th>
        <th>Rol</th>
        <th>Email</th>
        <th>Estado</th>               
      </tr> 
      <?php foreach ($respuesta as $key => $value) { ?>
      <tr>
        <?php 
        if($value["rol"] == 1){
           $lor = "Administrador";
        }else {
           $lor = "Usuario";
        } 

        if($value["estado"] == 1){
          $std = "Activo";
       }else {
          $std = "Inactivo";
       } 
        ?>
        
        <td><?php echo $value["rut"]?></td>
        <td><?php echo $value["nombre"]?></td>
        <td><?php echo $lor?></td>
        <td><?php echo $value["email"]?></td>
        <td><?php echo $std?></td> 
      <?php  }//<---- cierre ?>
      </tr>
      </table>       
      