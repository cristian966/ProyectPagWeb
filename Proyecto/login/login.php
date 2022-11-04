
<html lang="es">
<head>
<meta charset="utf-8">
<!-- <link rel="stylesheet" href="../css/login.css"> -->
<link rel="stylesheet" href="../css/registrar_usuario.css">
<title>Iniciar sesión</title>
</head>

<body>

<form action="" method="POST">
<h2>Iniciar sesión</h2>
<input type="text" placeholder="&#128273; Usuario" name="txtusuario" required>
<input type="password" placeholder="&#128274; Contraseña" name="txtpassword" required>
<input type="submit" value="Ingresar" name="btningresar">

<br>
<a href="../registrar-usuarios/registrar.php" style="float:right">Crear una cuenta</a>
<a href="../index.php" style="float:left">Página Inicio</a>

</form>

</body>

</html>




<?php

session_start();

//if para evitar que tenga que volver a iniciar sesion hasta que cierre la sesion
if (isset($_SESSION['nombredelusuario'])) {
	header('location: ../index.php');
}

if(isset($_POST['btningresar']))
{
	include_once "../php/conexion.php";

	$nombre=$_POST['txtusuario'];
	$pass=$_POST['txtpassword'];
	
	$query=mysqli_query($conn,"Select * from usuario where nombre_usuario = '".$nombre."' and contraseña = '".$pass."'");
	$nr=mysqli_num_rows($query);

	if (!isset($_SESSION['nombredelusuario'])) {
		
	}

	if($nr == 1)
	{
		$_SESSION['nombredelusuario']=$nombre; //Para coger el nombre sin tener que hacer consulta sql
		header("location: ../index.php");
	}
	else if ($nr == 0)
	{
		echo "<script>alert('Usuario no existe');window.location= 'login.php' </script>";
	}

}
?>