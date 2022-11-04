<?php 
include_once("../../../../php/conexion.php");
include_once("../paneljuegos.php");

$codigo = $_GET['id_juego'];
 
$querybuscar = mysqli_query($conn, "SELECT * FROM juego WHERE id_juego=$codigo");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
    $codigo = $mostrar['id_juego'];
    $nombre = $mostrar['nombre'];
    $descripcion = $mostrar['descripcion'];
	$foto = $mostrar['foto'];
	$tag = $mostrar['tag'];
}
?>
<html>
<head>    
		<title>Editar juego</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../../../../css/estilospanelusuario.css">
</head>
<body>
<div class="caja_popup2" id="formmodificar">
  <form method="POST" class="contenedor_popup" >
        <table>
		<tr><th colspan="2">Modificar juego</th></tr>
		     <tr> 
                <td>ID juego</td>
                <td><input type="text" name="txtcodigo" value="<?php echo $codigo;?>" required ></td>
            </tr>
            <tr> 
                <td>Nombre</td>
                <td><input type="text" name="txtnombre" value="<?php echo $nombre;?>" required></td>
            </tr>
            <tr> 
                <td>descripcion</td>
                <td><textarea name="txtcorreo" id="" cols="40" rows="20" required><?php echo $descripcion;?></textarea>
                    
                <!--<input type="textarea" name="txtcorreo" value="<?php echo $descripcion;?>" required>--></td>
            </tr>
            <tr> 
                <td>Foto</td>
                <td><input type="text" name="txtcontrasena" value="<?php echo $foto;?>"required></td>
            </tr>
            <tr> 
                <td>Tag</td>
                <td><input type="text" name="txtrol" value="<?php echo $tag;?>"required></td>
            </tr>
            <tr>
				
                <td colspan="2">
				<a href="../paneljuegos.php">Cancelar</a>
				<input type="submit" name="btnmodificar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar a este juego?');">
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
    $descripcion1 	= $_POST['txtcorreo'];
    $foto1 	= $_POST['txtcontrasena']; 
    $tag1 	= $_POST['txtrol']; 
      
    $querymodificar = mysqli_query($conn, "UPDATE juego SET nombre='$nombre1',descripcion='$descripcion1',foto='$foto1', tag='$tag1' WHERE id_juego=$codigo1");

  	echo "<script>window.location= '../paneljuegos.php' </script>";
    
}
?>