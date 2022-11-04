<?php 
include_once("../../../../php/conexion.php");
include_once("../panelusuarios.php");

$codigo = $_GET['id_usuario'];
 
$querybuscar = mysqli_query($conn, "SELECT * FROM usuario WHERE id_usuario=$codigo");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
    $codigo = $mostrar['id_usuario'];
    $nombre = $mostrar['nombre_usuario'];
    $correo = $mostrar['email'];
	$contrasena = $mostrar['contraseña'];
	$idrol = $mostrar['id_rol'];
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
                <td>ID Usuario</td>
                <td><input type="text" name="txtcodigo" value="<?php echo $codigo;?>" required ></td>
            </tr>
            <tr> 
                <td>Nombre</td>
                <td><input type="text" name="txtnombre" value="<?php echo $nombre;?>" required></td>
            </tr>
            <tr> 
                <td>Correo</td>
                <td><input type="text" name="txtcorreo" value="<?php echo $correo;?>" required></td>
            </tr>
            <tr> 
                <td>Contraseña</td>
                <td><input type="text" name="txtcontrasena" value="<?php echo $contrasena;?>"required></td>
            </tr>
            <tr> 
                <td>ID ROl</td>
                <td><input type="number" name="txtrol" value="<?php echo $idrol;?>"required></td>
            </tr>
            <tr>
				
                <td colspan="2">
				<a href="../panelusuarios.php">Cancelar</a>
				<input type="submit" name="btnmodificar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar a este usuario?');">
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
    $correo1 	= $_POST['txtcorreo'];
    $contrasena1 	= $_POST['txtcontrasena']; 
    $idrol1 	= $_POST['txtrol']; 
      
    $querymodificar = mysqli_query($conn, "UPDATE usuario SET nombre_usuario='$nombre1',contraseña='$contrasena1',email='$correo1', id_rol='$idrol1' WHERE id_usuario=$codigo1");

  	echo "<script>window.location= '../panelusuarios.php' </script>";
    
}
?>