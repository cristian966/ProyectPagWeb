<?php include_once("../../../../php/conexion.php"); 
    
    $nombre = $_POST['txtnombre'];
    $descripcion = $_POST['txtcontrasena'];
    $idusu = $_POST['img'];
    $idcat = $_POST['idcat'];
    
    
	mysqli_query($conn, "INSERT INTO post(titulo,texto_post,id_usuario,id_categoria) VALUES('$nombre','$descripcion','$idusu','$idcat')");
    
header("Location: ../panelpost.php");
	
