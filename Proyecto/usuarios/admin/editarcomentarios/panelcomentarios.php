<?php
 include_once("../../../php/conexion.php");
 session_start();

 if (isset($_SESSION['nombredelusuario'])) {
     $usuarioingresado = $_SESSION['nombredelusuario'];
 }else{
     header('location: ../../../index.php');
 }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/estilospanelusuario.css">
    <title>Gestion de comentarios</title>
</head>
<body>
<table>
			<div id="barrabuscar">
		<form method="POST">
		<input type="submit" value="Buscar" name="btnbuscar"><input type="text" name="txtbuscar" id="cajabuscar" placeholder="&#128270;Ingresar nombre del comentario">
		</form>
		</div>
			<tr><th colspan="5"><h1>Lista de comentarios</h1><th></th></tr>
			<tr>
		    <th>Numero</th>
			<th>ID</th>
            <th>Texto comentario</th>
            <th>Id post</th>
            <th>Id usuario</th>
            <th>Acción</th>
			</tr>
        <?php 

if(isset($_POST['btnbuscar']))
{
$buscar = $_POST['txtbuscar'];
$queryusuarios = mysqli_query($conn, "SELECT id_comentario,txtcomentario,id_post,id_usuario FROM comentarios where txtcomentario like '".$buscar."%'");
}
else
{
$queryusuarios = mysqli_query($conn, "SELECT * FROM comentarios ORDER BY id_comentario asc");
}
		$numerofila = 0;
        while($mostrar = mysqli_fetch_array($queryusuarios)) 
		{    $numerofila++;    
            echo "<tr>";
			echo "<td>".$numerofila."</td>";
            echo "<td>".$mostrar['id_comentario']."</td>";
            echo "<td>".$mostrar['txtcomentario']."</td>";
            echo "<td>".$mostrar['id_post']."</td>";    
			echo "<td>".$mostrar['id_usuario']."</td>";  
            echo "<td style='width:26%'><a href=\"./controlcomentarios/eliminar.php?id_comentario=$mostrar[id_comentario]\" onClick=\"return confirm('¿Estás seguro de eliminar el comentario con ID  $mostrar[id_comentario]?')\">Eliminar</a></td>";           
}
        ?>
    </table>
</div>
<h3><a href="../../../index.php">Volver a la Página de Inicio</a></h3>
<h3><a href="../../admin/administrador.php">Volver a Perfil de Usuario</a></h3>

</body>
</html>