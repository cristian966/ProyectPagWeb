<?php include_once("../php/conexion.php"); 
    
    $id_usuario = $_POST['iduser'];
    $id_post = $_POST['idpost'];
    $texto = $_POST['txtnombre'];
	mysqli_query($conn, "INSERT INTO comentarios(id_usuario,id_post,txtcomentario) VALUES('$id_usuario','$id_post','$texto')");
    
//header("Location: plantillapost.php");
echo "<script>alert('comentario registrado con exito'); window.location = 'foro_principal.php'</script>";
	

?>