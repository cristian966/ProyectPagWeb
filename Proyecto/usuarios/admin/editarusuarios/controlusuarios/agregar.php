<?php include_once("../../../../php/conexion.php"); 
    
    $nombre = $_POST['txtnombre'];
    $contrasena = $_POST['txtcontrasena'];
    $email = $_POST['txtemail'];
    $idrol = $_POST['txtrol'];
    
	mysqli_query($conn, "INSERT INTO usuario(nombre_usuario,contraseña,email,id_rol) VALUES('$nombre','$contrasena','$email','$idrol')");
    
header("Location: ../panelusuarios.php");
	

?>