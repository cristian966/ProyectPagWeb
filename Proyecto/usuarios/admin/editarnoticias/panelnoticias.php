<?php
include_once("../../../php/conexion.php"); 
session_start();

if(isset($_SESSION['nombredelusuario']))
{
	$usuarioingresado = $_SESSION['nombredelusuario'];
}
else
{
	header('location: ../../../index.php');
}

?>

<html>
<head>    
<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Gestion de Noticias</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../../../css/estilospanelusuario.css">
</head>
<body>
    <table>
			<div id="barrabuscar">
		<form method="POST">
		<input type="submit" value="Buscar" name="btnbuscar"><input type="text" name="txtbuscar" id="cajabuscar" placeholder="&#128270;Ingresar nombre de Noticia">
		</form>
		</div>
			<tr><th colspan="5"><h1>Lista de Noticias</h1><th><a style="font-weight: normal; font-size: 14px;" onclick="abrirform()">Agregar</a></th></tr>
			<tr>
		    <th>Numero</th>
			<th>ID</th>
            <th>Titulo</th>
            <th>Texto Noticia</th>
            <th>Img</th>
            <th>Acción</th>
			</tr>
        <?php 

if(isset($_POST['btnbuscar']))
{
$buscar = $_POST['txtbuscar'];
$queryusuarios = mysqli_query($conn, "SELECT id_noticias,titulo,texto_noticia,img FROM noticia where titulo like '".$buscar."%'");
}
else
{
$queryusuarios = mysqli_query($conn, "SELECT * FROM noticia ORDER BY id_noticias asc");
}
		$numerofila = 0;
        while($mostrar = mysqli_fetch_array($queryusuarios)) 
		{    $numerofila++;    
            echo "<tr>";
			echo "<td>".$numerofila."</td>";
            echo "<td>".$mostrar['id_noticias']."</td>";
            echo "<td>".$mostrar['titulo']."</td>";
            echo "<td>".$mostrar['texto_noticia']."</td>";    
			echo "<td>".$mostrar['img']."</td>";   
            echo "<td style='width:26%'><a href=\"./controlnoticias/editar.php?id_noticias=$mostrar[id_noticias]\">Modificar</a> | <a href=\"./controlnoticias/eliminar.php?id_noticias=$mostrar[id_noticias]\" onClick=\"return confirm('¿Estás seguro de eliminar a $mostrar[titulo]?')\">Eliminar</a></td>";           
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
  <form action="./controlnoticias/agregar.php" class="contenedor_popup" method="POST">
        <table>
		<tr><th colspan="2">Nueva Noticia</th></tr>
            <tr> 
                <td>Titulo</td>
                <td><input type="text" name="txttitulo" required></td>
            </tr>
            <tr> 
                <td>texto noticia</td>
                <td><textarea name="txtnoticia" id="" cols="40" rows="20" required></textarea>
                    <!--<input type="textarea" name="txtnoticia" required>--></td>
            </tr>
            <tr> 
                <td>Img</td>
                <td><input type="text" name="img" required></td>
            </tr>
            <tr> 	
               <td colspan="2">
				   <button type="button" onclick="cancelarform()">Cancelar</button>
				   <input type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('¿Deseas registrar esta noticia?');">
			</td>
            </tr>
        </table>
    </form>
</div>
<h3><a href="../../../index.php">Volver a la Página de Inicio</a></h3>
<h3><a href="../../admin/administrador.php">Volver a Perfil de Usuario</a></h3>

</body>
</html>