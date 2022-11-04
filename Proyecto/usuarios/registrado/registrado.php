<?php

session_start();

if(isset($_SESSION['nombredelusuario']))
{
	$usuarioingresado = $_SESSION['nombredelusuario'];
}
else
{
	header('location: ../../login/login.php');
}

if(isset($_POST['btncerrar']))
{
	session_destroy();
	header('location: ../../index.php');
}
    include_once "../../php/conexion.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/user_ya_registrado.css">
    <title>Cuenta</title>
</head>
<body>
<h1>Datos del Usuario</h1>

<table class="tabla">
    <tr>  
        <th>Nombre</th>   
        <th>Contraseña</th>   
        <th>Email</th>     
    </tr>

    <?php

        $queryusuarios = mysqli_query($conn, "SELECT * FROM usuario where nombre_usuario like '".$usuarioingresado."'");
        while($mostrar = mysqli_fetch_array($queryusuarios)){
                
    ?>
    <tr>
        <td><?php echo $mostrar['nombre_usuario'] ?></td>
        <td><?php echo $mostrar['contraseña'] ?></td>
        <td><?php echo $mostrar['email'] ?></td>
    </tr>
    <?php
                }
    ?>
</table>

<h2><a href="../../index.php">Volver a la página principal</a></h2>
<form method="POST">
<input type="submit" value="Cerrar sesión" name="btncerrar" />
</form>
</body>
</html>
