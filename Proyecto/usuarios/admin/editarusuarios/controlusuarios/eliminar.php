<?php
include_once("../../../../php/conexion.php");
 
$cod = $_GET['id_usuario'];
 
mysqli_query($conn, "DELETE FROM usuario WHERE id_usuario=$cod");
 
header("Location: ../panelusuarios.php");

?>