<?php 
include_once('../../../../php/conexion.php');
include_once("../panelpost.php");


$codigo = $_GET['id_post'];
 
$querybuscar = mysqli_query($conn, "SELECT * FROM post WHERE id_post=$codigo");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
    $codigo = $mostrar['id_post'];
    $nombre = $mostrar['titulo'];
    $descripcion = $mostrar['texto_post'];
    $idusu = $mostrar['id_usuario'];
    $idcat = $mostrar['id_categoria'];
}
?>
<html>
<head>    
		<title>Editar Post</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../../../../css/estilospanelusuario.css">
</head>
<body>
<div class="caja_popup2" id="formmodificar">
  <form method="POST" class="contenedor_popup" >
        <table>
		<tr><th colspan="2">Modificar usuario</th></tr>
		     <tr> 
                <td>ID post</td>
                <td><input type="text" name="txtcodigo" value="<?php echo $codigo;?>" required ></td>
            </tr>
            <tr> 
                <td>Título</td>
                <td><input type="text" name="txtnombre" value="<?php echo $nombre;?>" required></td>
            </tr>
            <tr> 
                <td>Texto post</td>
                <td>
                    <textarea name="txtcorreo" id="" cols="40" rows="20" required><?php echo $descripcion;?></textarea>
                    <!--<input type="textarea" name="txtcorreo" value="" >-->
                </td>
            </tr>
            <tr> 
                <td>id usuario</td>
                <td><input type="text" name="txtimg" value="<?php echo $idusu;?>"required></td>
            </tr>
            <tr> 
                <td>id categoría</td>
                <td><input type="text" name="cat" value="<?php echo $idcat;?>"required></td>
            </tr>
            <tr>
				
                <td colspan="2">
				<a href="../panelpost.php">Cancelar</a>
				<input type="submit" name="btnmodificar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar este post?');">
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
    $idusu = $_POST['txtimg'];
    $idcat = $_POST['cat'];
      
    $querymodificar = mysqli_query($conn, "UPDATE post SET titulo='$nombre1',texto_post='$descripcion1', id_usuario='$idusu', id_categoria='$idcat' WHERE id_post=$codigo1");

  	echo "<script>window.location= '../panelpost.php' </script>";
    
    
}
?>