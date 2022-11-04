<?php include_once("../php/conexion.php"); 
    
    $id_usuario = $_POST['iduser'];
    $titulo = $_POST['txtnombre'];
    $texto = $_POST['texto'];
    $id_cat = $_POST['cat'];

	mysqli_query($conn, "INSERT INTO post(id_usuario,titulo,texto_post,id_categoria) VALUES('$id_usuario','$titulo','$texto','$id_cat')");
    
//header("Location: plantillacat.php");
echo "<script>alert('Post registrado con exito'); window.location = 'foro_principal.php'</script>";
	

?>