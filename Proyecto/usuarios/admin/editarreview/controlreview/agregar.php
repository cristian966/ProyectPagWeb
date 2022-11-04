<?php include_once("../../../../php/conexion.php"); 
    
    $nombre = $_POST['txtnombre'];
    $descripcion = $_POST['txtcontrasena'];
    $img = $_POST['img'];
    
	mysqli_query($conn, "INSERT INTO review(titulo,texto_review,img) VALUES('$nombre','$descripcion','$img')");
    
header("Location: ../panelreview.php");
	

?>