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
    <title>Gestion de Posts</title>
</head>
<body>
<table>
			<div id="barrabuscar">
		<form method="POST">
		<input type="submit" value="Buscar" name="btnbuscar"><input type="text" name="txtbuscar" id="cajabuscar" placeholder="&#128270;Ingresar titulo del post">
		</form>
		</div>
			<tr><th colspan="5"><h1>Lista de Posts</h1><th><a style="font-weight: normal; font-size: 14px;" onclick="abrirform()">Agregar</a></th><th></th></tr>
			<tr>
		    <th>Numero</th>
			<th>ID</th>
            <th>Título</th>
            <th>Texto Post</th>
            <th>Id usuario</th>
            <th>Id categoría</th>
            <th>Accion</th>
			</tr>
        <?php 

if(isset($_POST['btnbuscar']))
{
$buscar = $_POST['txtbuscar'];
$queryusuarios = mysqli_query($conn, "SELECT id_post,titulo,texto_post, id_usuario, id_categoria FROM post where titulo like '".$buscar."%'");
}
else
{
$queryusuarios = mysqli_query($conn, "SELECT * FROM post ORDER BY id_post asc");
}
		$numerofila = 0;
        while($mostrar = mysqli_fetch_array($queryusuarios)) 
		{    $numerofila++;    
            echo "<tr>";
			echo "<td>".$numerofila."</td>";
            echo "<td>".$mostrar['id_post']."</td>";
            echo "<td>".$mostrar['titulo']."</td>";
            echo "<td>".$mostrar['texto_post']."</td>";      
            echo "<td>".$mostrar['id_usuario']."</td>";  
            echo "<td>".$mostrar['id_categoria']."</td>";  
            echo "<td style='width:26%'><a href=\"./controlpost/editar.php?id_post=$mostrar[id_post]\">Modificar</a> | <a href=\"./controlpost/eliminar.php?id_post=$mostrar[id_post]\" onClick=\"return confirm('¿Estás seguro de eliminar a $mostrar[titulo]?')\">Eliminar</a></td>";           
}
        ?>
    </table>
	 <script>
function abrirform() {
  document.getElementById("formregistrar").style.display = "block";
  
}

function cancelarform() {
  document.getElementById("formregistrar").style.display = "none";
}

</script>
<div class="caja_popup" id="formregistrar">
  <form action="./controlpost/agregar.php" class="contenedor_popup" method="POST">
        <table>
		<tr><th colspan="2">Nueva Review</th></tr>
            <tr> 
                <td>Titulo</td>
                <td><input type="text" name="txtnombre" required></td>
            </tr>
            <tr> 
                <td>Texto post</td>
                <td>
                    <textarea name="txtcontrasena" id="" cols="40" rows="20" required></textarea>
                    <!--<input type="textarea" name="txtcontrasena" required>-->
                </td>
            </tr>
            <tr> 
                <td>id usuario</td>
                <td><input type="text" name="img" required></td>
            </tr>
            <tr> 
                <td>id categoría</td>
                <td><input type="text" name="idcat" required></td>
            </tr>
            <tr> 	
               <td colspan="2">
				   <button type="button" onclick="cancelarform()">Cancelar</button>
				   <input type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('¿Deseas registrar este post?');">
			</td>
            </tr>
        </table>
    </form>
</div>
<h3><a href="../../../index.php">Volver a la Página de Inicio</a></h3>
<h3><a href="../../admin/administrador.php">Volver a Perfil de Usuario</a></h3>

</body>
</html>