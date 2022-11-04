<?php 
include_once('../../../../php/conexion.php');
include_once("../panelcategoria.php");


$codigo = $_GET['id_categoria'];
 
$querybuscar = mysqli_query($conn, "SELECT * FROM categorias WHERE id_categoria=$codigo");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
    $codigo = $mostrar['id_categoria'];
    $nombre = $mostrar['nombre_categoria'];
}
?>
<html>
<head>    
		<title>Editar categoría</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../../../../css/estilospanelusuario.css">
</head>
<body>
<div class="caja_popup2" id="formmodificar">
  <form method="POST" class="contenedor_popup" >
        <table>
		<tr><th colspan="2">Modificar usuario</th></tr>
		     <tr> 
                <td>ID categoría</td>
                <td><input type="text" name="txtcodigo" value="<?php echo $codigo;?>" required ></td>
            </tr>
            <tr> 
                <td>Nombre</td>
                <td><input type="text" name="txtnombre" value="<?php echo $nombre;?>" required></td>
            </tr>
            <tr>
				
                <td colspan="2">
				<a href="../panelcategoria.php">Cancelar</a>
				<input type="submit" name="btnmodificar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar esta review?');">
				</td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>

<?php
	
	if(isset($_POST['btnmodificar']))
{    
    $codigo1 = $_POST['txtcodigo'];
	
	$nombre1 	= $_POST['txtnombre'];
      
    $querymodificar = mysqli_query($conn, "UPDATE categorias SET nombre_categoria='$nombre1' WHERE id_categoria=$codigo1");

  	echo "<script>window.location= '../panelcategoria.php' </script>";
    
    
}
?>