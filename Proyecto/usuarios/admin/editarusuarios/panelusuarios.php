<?php
include_once("../../../php/conexion.php"); 
session_start();

if(isset($_SESSION['nombredelusuario']))
{
	$usuarioingresado = $_SESSION['nombredelusuario'];
}
else
{
	header('location: ../../../index.php');
}

?>
<!--Busca por VaidrollTeam para más proyectos. -->
<html>
<head>    
		<title>Gestion de usuarios</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../../../css/estilospanelusuario.css">
</head>
<body>
    <table>
			<div id="barrabuscar">
		<form method="POST">
		<input type="submit" value="Buscar" name="btnbuscar"><input type="text" name="txtbuscar" id="cajabuscar" placeholder="&#128270;Ingresar nombre de usuario">
		</form>
		</div>
			<tr><th colspan="6"><h1>LISTAR USUARIOS</h1></th><th><a style="font-weight: normal; font-size: 14px;" onclick="abrirform()">Agregar</a></th></tr>
			<tr>
		    <th>Numero</th>
			<th>ID</th>
            <th>Nombre</th>
            <th>Contraseña</th>
            <th>Correo</th>
            <th>ID ROL</th>
            <th>Acción</th>
			</tr>
        <?php 

if(isset($_POST['btnbuscar']))
{
$buscar = $_POST['txtbuscar'];
$queryusuarios = mysqli_query($conn, "SELECT id_usuario,nombre_usuario,contraseña,email,id_rol FROM usuario where nombre_usuario like '".$buscar."%'");
}
else
{
$queryusuarios = mysqli_query($conn, "SELECT * FROM usuario ORDER BY id_usuario asc");
}
		$numerofila = 0;
        while($mostrar = mysqli_fetch_array($queryusuarios)) 
		{    $numerofila++;    
            echo "<tr>";
			echo "<td>".$numerofila."</td>";
            echo "<td>".$mostrar['id_usuario']."</td>";
            echo "<td>".$mostrar['nombre_usuario']."</td>";
            echo "<td>".$mostrar['contraseña']."</td>";    
			echo "<td>".$mostrar['email']."</td>";  
			echo "<td>".$mostrar['id_rol']."</td>";  
            echo "<td style='width:26%'><a href=\"./controlusuarios/editar.php?id_usuario=$mostrar[id_usuario]\">Modificar</a> | <a href=\"./controlusuarios/eliminar.php?id_usuario=$mostrar[id_usuario]\" onClick=\"return confirm('¿Estás seguro de eliminar a $mostrar[nombre_usuario]?')\">Eliminar</a></td>";           
}
        ?>
    </table>
	 <script>
function abrirform() {
  document.getElementById("formregistrar").style.display = "block";
  
}

function cancelarform() {
  document.getElementById("formregistrar").style.display = "none";
}

</script>
<div class="caja_popup" id="formregistrar">
  <form action="./controlusuarios/agregar.php" class="contenedor_popup" method="POST">
        <table>
		<tr><th colspan="2">Nuevo usuario</th></tr>
            <tr> 
                <td>Nombre</td>
                <td><input type="text" name="txtnombre" required></td>
            </tr>
            <tr> 
                <td>contraseña</td>
                <td><input type="password" name="txtcontrasena" required></td>
            </tr>
            <tr> 
                <td>email</td>
                <td><input type="email" name="txtemail" required></td>
            </tr>
            <tr> 
                <td>id_rol</td>
                <td><input type="number" name="txtrol" required></td>
            </tr>
            <tr> 	
               <td colspan="2">
				   <button type="button" onclick="cancelarform()">Cancelar</button>
				   <input type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('¿Deseas registrar a este usuario?');">
			</td>
            </tr>
        </table>
    </form>
</div>
<h3><a href="../../../index.php">Volver a la Página de Inicio</a></h3>
<h3><a href="../../admin/administrador.php">Volver a Perfil de Usuario</a></h3>

</body>
</html>