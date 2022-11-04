<?php
include_once("../../../../php/conexion.php");
 
$cod = $_GET['id_juego'];
 
mysqli_query($conn, "DELETE FROM juego WHERE id_juego=$cod");
 
header("Location: ../paneljuegos.php");

?>