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
    <title>Gestion de juegos</title>
</head>
<body>
<table>
			<div id="barrabuscar">
		<form method="POST">
		<input type="submit" value="Buscar" name="btnbuscar"><input type="text" name="txtbuscar" id="cajabuscar" placeholder="&#128270;Ingresar nombre de juego">
		</form>
		</div>
			<tr><th colspan="6"><h1>LISTAR Juegos</h1><th><a style="font-weight: normal; font-size: 14px;" onclick="abrirform()">Agregar</a></th></tr>
			<tr>
		    <th>Numero</th>
			<th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Foto</th>
            <th>Tag</th>
            <th>Acción</th>
			</tr>
        <?php 

if(isset($_POST['btnbuscar']))
{
$buscar = $_POST['txtbuscar'];
$queryusuarios = mysqli_query($conn, "SELECT id_juego,nombre,descripcion,foto,tag FROM juego where nombre like '".$buscar."%'");
}
else
{
$queryusuarios = mysqli_query($conn, "SELECT * FROM juego ORDER BY id_juego asc");
}
		$numerofila = 0;
        while($mostrar = mysqli_fetch_array($queryusuarios)) 
		{    $numerofila++;    
            echo "<tr>";
			echo "<td>".$numerofila."</td>";
            echo "<td>".$mostrar['id_juego']."</td>";
            echo "<td>".$mostrar['nombre']."</td>";
            echo "<td>".$mostrar['descripcion']."</td>";    
			echo "<td>".$mostrar['foto']."</td>";  
			echo "<td>".$mostrar['tag']."</td>";  
            echo "<td style='width:26%'><a href=\"./controljuegos/editar.php?id_juego=$mostrar[id_juego]\">Modificar</a> | <a href=\"./controljuegos/eliminar.php?id_juego=$mostrar[id_juego]\" onClick=\"return confirm('¿Estás seguro de eliminar a $mostrar[nombre]?')\">Eliminar</a></td>";           
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
  <form action="./controljuegos/agregar.php" class="contenedor_popup" method="POST">
        <table>
		<tr><th colspan="2">Nuevo Juego</th></tr>
            <tr> 
                <td>Nombre</td>
                <td><input type="text" name="txtnombre" required></td>
            </tr>
            <tr> 
                <td>Descripción</td>
                <td><textarea name="txtcontrasena" id="" cols="40" rows="20"></textarea>
                    
                <!--<input type="textarea" name="txtcontrasena" required>--></td>
            </tr>
            <tr> 
                <td>Foto</td>
                <td><input type="text" name="txtemail" required></td>
            </tr>
            <tr> 
                <td>Tag</td>
                <td><input type="text" name="txtrol" required></td>
            </tr>
            <tr> 	
               <td colspan="2">
				   <button type="button" onclick="cancelarform()">Cancelar</button>
				   <input type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('¿Deseas registrar a este juego?');">
			</td>
            </tr>
        </table>
    </form>
</div>
<h3><a href="../../../index.php">Volver a la Página de Inicio</a></h3>
<h3><a href="../../admin/administrador.php">Volver a Perfil de Usuario</a></h3>

</body>
</html>