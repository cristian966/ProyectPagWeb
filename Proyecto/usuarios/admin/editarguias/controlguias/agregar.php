<?php include_once("../../../../php/conexion.php"); 
    
    $nombre = $_POST['txtnombre'];
    $descripcion = $_POST['txtguia'];
    $img = $_POST['img'];
    
	mysqli_query($conn, "INSERT INTO guia(titulo,texto_guia,img) VALUES('$nombre','$descripcion','$img')");
    
header("Location: ../panelguias.php");
	

?>