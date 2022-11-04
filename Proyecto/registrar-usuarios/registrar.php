<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/registrar_usuario.css">
    <title>Registrar</title>
</head>

<body>
<?php 
session_start();

//if para evitar que tenga que volver a iniciar sesion hasta que cierre la sesion
if (isset($_SESSION['nombredelusuario'])) {
	header('location: ../index.php');
}
?>
    <form action="../php/registrarUsuario.php" method="POST">
        <h2>Crear una cuenta</h2>
        <input type="text" placeholder="&#128273; Usuario" name="nombre" required>
        <input type="password" placeholder="&#128274; Contraseña" name="contrasena" required>
        <input type="email" placeholder="&#9993;&#65039; email" name="email" required>
        <!--<input type="number" placeholder="&#128279; Rol (elige entre 1 y 2)" name="rol" required>-->
        <input type="submit" value="Registrar" name="btnregistrar">

        <br>
        <a href="../index.php" style="float:left">Pagina Inicio</a>
        <a href="../login/login.php" style="float:right">Iniciar Sesión</a>

    </form>

</body>

</html>