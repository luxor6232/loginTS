<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
}
</style>

<?php
      //require_once('../../modelo/class.usuario.php');
      //require_once('../../modelo/class.query.php');
      $sql = "SELECT * FROM usuario";
      $obj_query = new Query($sql);
      $respuesta = $obj_query->select();
      ?> 
      <table style="width:100%">
      <tr>
        <th>Rut</th>
        <th>Nombre</th>
        <th>Rol</th>
        <th>Email</th>
        <th>Estado</th>
        <th><a href="?modulo=5">Crear Usuario</a></th>        
      </tr> 
      <?php foreach ($respuesta as $key => $value) { ?>
      <tr>
        <td><?php echo $value["rut"]?></td>
        <td><?php echo $value["nombre"]?></td>
        <td><?php echo $value["rol"]?></td>
        <td><?php echo $value["email"]?></td>
        <td><?php echo $value["estado"]?></td> 
        <td><a href="?modulo=4">Modificar Usuario</a></td>
      <?php  }//<---- cierre ?>
      </tr>
      </table>       
      