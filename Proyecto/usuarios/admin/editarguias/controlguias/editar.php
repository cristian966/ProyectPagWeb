<?php 
include_once("../../../../php/conexion.php");
include_once("../panelguias.php");

$codigo = $_GET['id_guia'];
 
$querybuscar = mysqli_query($conn, "SELECT * FROM guia WHERE id_guia=$codigo");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
    $codigo = $mostrar['id_guia'];
    $nombre = $mostrar['titulo'];
    $descripcion = $mostrar['texto_guia'];
	$img = $mostrar['img'];
}
?>
<html>
<head>    
		<title>Editar Guia</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../../../../css/estilospanelusuario.css">
</head>
<body>
<div class="caja_popup2" id="formmodificar">
  <form method="POST" class="contenedor_popup" >
        <table>
		<tr><th colspan="2">Modificar juego</th></tr>
		     <tr> 
                <td>ID guia</td>
                <td><input type="text" name="txtcodigo" value="<?php echo $codigo;?>" required ></td>
            </tr>
            <tr> 
                <td>Titulo</td>
                <td><input type="text" name="txtnombre" value="<?php echo $nombre;?>" required></td>
            </tr>
            <tr> 
                <td>Texto guia</td>
                <td>
                    <textarea name="txtguia" id="" cols="40" rows="20" required><?php echo $descripcion;?></textarea>
                    <!--<input type="textarea" name="txtguia" value="" >-->
                </td>
            </tr>
            <tr> 
                <td>Img</td>
                <td><input type="text" name="txtimg" value="<?php echo $img;?>"required></td>
            </tr>
            <tr>
				
                <td colspan="2">
				<a href="../panelguias.php">Cancelar</a>
				<input type="submit" name="btnmodificar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar esta Guia?');">
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
    $descripcion1 	= $_POST['txtguia'];
    $img1 = $_POST['txtimg']; 
      
    $querymodificar = mysqli_query($conn, "UPDATE guia SET titulo='$nombre1',texto_guia='$descripcion1',img='$img1' WHERE id_guia=$codigo1");

  	echo "<script>window.location= '../panelguias.php' </script>";
    
}
?>