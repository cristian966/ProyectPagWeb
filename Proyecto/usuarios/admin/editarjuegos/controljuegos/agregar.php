<?php include_once("../../../../php/conexion.php"); 
    
    $nombre = $_POST['txtnombre'];
    $descripcion = $_POST['txtcontrasena'];
    $foto = $_POST['txtemail'];
    $tag = $_POST['txtrol'];
    
	mysqli_query($conn, "INSERT INTO juego(nombre,descripcion,foto,tag) VALUES('$nombre','$descripcion','$foto','$tag')");
    
header("Location: ../paneljuegos.php");
	

?>