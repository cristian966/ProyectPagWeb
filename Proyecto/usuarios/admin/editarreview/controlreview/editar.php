<?php 
include_once('../../../../php/conexion.php');
include_once("../panelreview.php");


$codigo = $_GET['id_review'];
 
$querybuscar = mysqli_query($conn, "SELECT * FROM review WHERE id_review=$codigo");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
    $codigo = $mostrar['id_review'];
    $nombre = $mostrar['titulo'];
    $descripcion = $mostrar['texto_review'];
    $img = $mostrar['img'];
}
?>
<html>
<head>    
		<title>Editar review</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../../../../css/estilospanelusuario.css">
</head>
<body>
<div class="caja_popup2" id="formmodificar">
  <form method="POST" class="contenedor_popup" >
        <table>
		<tr><th colspan="2">Modificar usuario</th></tr>
		     <tr> 
                <td>ID review</td>
                <td><input type="text" name="txtcodigo" value="<?php echo $codigo;?>" required ></td>
            </tr>
            <tr> 
                <td>Título</td>
                <td><input type="text" name="txtnombre" value="<?php echo $nombre;?>" required></td>
            </tr>
            <tr> 
                <td>Texto review</td>
                <td>
                    <textarea name="txtcorreo" id="" cols="40" rows="20" required><?php echo $descripcion;?></textarea>
                    <!--<input type="textarea" name="txtcorreo" value="" >-->
                </td>
            </tr>
            <tr> 
                <td>Img</td>
                <td><input type="text" name="txtimg" value="<?php echo $img;?>"required></td>
            </tr>
            <tr>
				
                <td colspan="2">
				<a href="../panelreview.php">Cancelar</a>
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
    $descripcion1 	= $_POST['txtcorreo'];
    $img1 = $_POST['txtimg'];
      
    $querymodificar = mysqli_query($conn, "UPDATE review SET titulo='$nombre1',texto_review='$descripcion1', img='$img1' WHERE id_review=$codigo1");

  	echo "<script>window.location= '../panelreview.php' </script>";
    
    
}
?>