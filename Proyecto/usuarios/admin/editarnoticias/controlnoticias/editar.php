<?php 
include_once("../../../../php/conexion.php");
include_once("../panelnoticias.php");

$codigo = $_GET['id_noticias'];
 
$querybuscar = mysqli_query($conn, "SELECT * FROM noticia WHERE id_noticias=$codigo");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
    $codigo = $mostrar['id_noticias'];
    $titulo = $mostrar['titulo'];
    $texto_noticia = $mostrar['texto_noticia'];
	$img = $mostrar['img'];
}
?>
<html>
<head>    
		<title>Editar usuarios</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../../../../css/estilospanelusuario.css">
</head>
<body>
<div class="caja_popup2" id="formmodificar">
  <form method="POST" class="contenedor_popup" >
        <table>
		<tr><th colspan="2">Modificar usuario</th></tr>
		     <tr> 
                <td>ID noticia</td>
                <td><input type="text" name="txtcodigo" value="<?php echo $codigo;?>" required ></td>
            </tr>
            <tr> 
                <td>Titulo</td>
                <td><input type="text" name="txttitulo" value="<?php echo $titulo;?>" required></td>
            </tr>
            <tr> 
                <td>Texto noticia</td>
                <td>
                    <textarea name="txtnoticia" id="" cols="40" rows="20" required><?php echo $texto_noticia;?></textarea>
                    <!--<input type="textarea" name="txtnoticia" value="" >-->
                </td>
            </tr>
            <tr> 
                <td>Img</td>
                <td><input type="text" name="txtimg" value="<?php echo $img;?>"required></td>
            </tr>
            <tr>
				
                <td colspan="2">
				<a href="../panelnoticias.php">Cancelar</a>
				<input type="submit" name="btnmodificar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar a esta noticia?');">
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
	
	$titulo1 	= $_POST['txttitulo'];
    $texto_noticia1 	= $_POST['txtnoticia'];
    $img1 = $_POST['txtimg'];
      
    $querymodificar = mysqli_query($conn, "UPDATE noticia SET titulo='$titulo1',texto_noticia='$texto_noticia1',img='$img1' WHERE id_noticias=$codigo1");

  	echo "<script>window.location= '../panelnoticias.php' </script>";
    
}
?>