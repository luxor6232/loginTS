<?php
session_start();
session_destroy();
header("LOCATION: ../vista/index.php");
 ?>
