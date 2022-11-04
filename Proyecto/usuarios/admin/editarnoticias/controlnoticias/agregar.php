<?php include_once("../../../../php/conexion.php"); 
    
    $titulo = $_POST['txttitulo'];
    $texto = $_POST['txtnoticia'];
    $img = $_POST['img'];
      
	mysqli_query($conn, "INSERT INTO noticia(titulo,texto_noticia,img) VALUES('$titulo','$texto','$img')");
    
    header("Location: ../panelnoticias.php");
	

?>