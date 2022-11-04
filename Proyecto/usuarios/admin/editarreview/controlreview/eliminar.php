<?php
include_once("../../../../php/conexion.php");
 
$cod = $_GET['id_review'];
 
mysqli_query($conn, "DELETE FROM review WHERE id_review=$cod");
 
header("Location: ../panelreview.php");

?>