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
    <title>Gestion de categorías</title>
</head>
<body>
<table>
			<div id="barrabuscar">
		<form method="POST">
		<input type="submit" value="Buscar" name="btnbuscar"><input type="text" name="txtbuscar" id="cajabuscar" placeholder="&#128270;Ingresar categoría">
		</form>
		</div>
			<tr><th colspan="5"><h1>Lista de categorías</h1> <a style="font-weight: normal; font-size: 14px;" onclick="abrirform()">Agregar</a></tr>
			<tr>
		    <th>Numero</th>
			<th>ID</th>
            <th>Nombre</th>
            <th>Acción</th>
			</tr>
        <?php 

if(isset($_POST['btnbuscar']))
{
$buscar = $_POST['txtbuscar'];
$queryusuarios = mysqli_query($conn, "SELECT id_categoria,nombre_categoria FROM categorias where nombre_categoria like '".$buscar."%'");
}
else
{
$queryusuarios = mysqli_query($conn, "SELECT * FROM categorias ORDER BY id_categoria asc");
}
		$numerofila = 0;
        while($mostrar = mysqli_fetch_array($queryusuarios)) 
		{    $numerofila++;    
            echo "<tr>";
			echo "<td>".$numerofila."</td>";
            echo "<td>".$mostrar['id_categoria']."</td>";
            echo "<td>".$mostrar['nombre_categoria']."</td>"; 
            echo "<td style='width:26%'><a href=\"./controlcategorias/editar.php?id_categoria=$mostrar[id_categoria]\">Modificar</a> | <a href=\"./controlcategorias/eliminar.php?id_categoria=$mostrar[id_categoria]\" onClick=\"return confirm('¿Estás seguro de eliminar a $mostrar[nombre_categoria]?')\">Eliminar</a></td>";  
            echo "</tr>";         
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
  <form action="./controlcategorias/agregar.php" class="contenedor_popup" method="POST">
        <table>
		<tr><th colspan="2">Nueva Review</th></tr>
            <tr> 
                <td>Nombre</td>
                <td><input type="text" name="txtnombre" required></td>
            </tr>
            <tr> 	
               <td colspan="2">
				   <button type="button" onclick="cancelarform()">Cancelar</button>
				   <input type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('¿Deseas registrar esta categoría?');">
			</td>
            </tr>
        </table>
    </form>
</div>
<h3><a href="../../../index.php">Volver a la Página de Inicio</a></h3>
<h3><a href="../../admin/administrador.php">Volver a Perfil de Usuario</a></h3>

</body>
</html>