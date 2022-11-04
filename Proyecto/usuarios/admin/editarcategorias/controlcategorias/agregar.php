<?php include_once("../../../../php/conexion.php"); 
    
    $nombre = $_POST['txtnombre'];
    
	mysqli_query($conn, "INSERT INTO categorias(nombre_categoria) VALUES('$nombre')");
    
header("Location: ../panelcategoria.php");
	

?>