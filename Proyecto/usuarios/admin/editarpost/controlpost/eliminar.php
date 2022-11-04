<?php
include_once("../../../../php/conexion.php");
 
$cod = $_GET['id_post'];
 
mysqli_query($conn, "DELETE FROM post WHERE id_post=$cod");
 
header("Location: ../panelpost.php");

?>