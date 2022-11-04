<?php
include_once("../../../../php/conexion.php");
 
$cod = $_GET['id_noticias'];
 
mysqli_query($conn, "DELETE FROM noticia WHERE id_noticias=$cod");
 
header("Location: ../panelnoticias.php");

?>