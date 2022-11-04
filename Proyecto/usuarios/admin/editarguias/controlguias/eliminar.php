<?php
include_once("../../../../php/conexion.php");
 
$cod = $_GET['id_guia'];
 
mysqli_query($conn, "DELETE FROM guia WHERE id_guia=$cod");
 
header("Location: ../panelguias.php");

?>