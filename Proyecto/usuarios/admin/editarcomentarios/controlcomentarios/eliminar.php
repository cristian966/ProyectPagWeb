<?php
include_once("../../../../php/conexion.php");
 
$cod = $_GET['id_comentario'];
 
mysqli_query($conn, "DELETE FROM comentarios WHERE id_comentario=$cod");
 
header("Location: ../panelcomentarios.php");

?>