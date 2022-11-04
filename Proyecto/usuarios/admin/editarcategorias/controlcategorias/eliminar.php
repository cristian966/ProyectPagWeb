<?php
include_once("../../../../php/conexion.php");
 
$cod = $_GET['id_categoria'];
 
mysqli_query($conn, "DELETE FROM categorias WHERE id_categoria=$cod");
 
header("Location: ../panelcategoria.php");

?>