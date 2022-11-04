<?php

/*Hacer que aparezcan los post debajo de cada Categoria y sus titulos como enlaces que lleven a una plantilla general*/
/*Dar estilos a foro principal y crear en la gestion de usuarios los comentarios, los posts y la categoria, tambien cambiar un poco el estilo de los perfiles de usuario*/

 include_once("../php/conexion.php");
 session_start();

 if (isset($_SESSION['nombredelusuario'])) {
     $usuarioingresado = $_SESSION['nombredelusuario'];
 }else{
     header('location: ../index.php');
 }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos_menu.css">
    <link rel="stylesheet" href="../css/estilos_inicio.css">
    <link rel="stylesheet" href="../css/foro.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src=""></script>
    <title>Foro</title>
</head>

<body class="Fondoforo">
    <div class="menu_centrado">
        <div>
            <ul>
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="../juegos/juegos_principal.php">Juegos</a></li>
                <li><a href="../noticias/noticias_principal.php">Noticias</a></li>
                <li><a href="../reviews/reviews_principal.php">Reviews</a></li>
                <li><a href="../guias/guias_principal.php">Guías</a></li>
                <li><a class="active" href="foro_principal.php">Foro</a></li>
            </ul>
        </div>
    </div>

    <div class="contenedorlogo">
        <span><img class="logo" src="../img/logo.png" alt="logo" srcset=""></span>
    </div>

    <div class="login">

    <?php
    include_once "../php/conexion.php";
        // session_start();
        if (isset($_SESSION['nombredelusuario'])) {
            echo " <a href='../usuarios/registrado/registrado.php' class=''><img class='fotoperfil' src='../img/loggin.png' alt='Icono perfil'><br> <h3 class='enlaceperfil'>$usuarioingresado</h3></a> <br>";
        }else {
            echo "<a href='../login/login.php' class=''><img class='fotoperfil' src='../img/loggin.png' alt='Icono perfil'><br> <h3 class='enlaceperfil'> Iniciar/Registrar </h3></a>";
        }
    ?>
    
    <!--<div>-->
    
    </div>
    <div id="barrabuscar" class="barrabuscarcl">
		<form method="POST">
		<input type="submit" value="Buscar" name="btnbuscar"><input type="text" class="buscar" name="txtbuscar" id="cajabuscar" placeholder="&#128270;Buscar Foro">
		</form>
    </div>
<div class="h1titulo">
<h1 class="h1titulo1">Foro</h1>

</div>
    
        <div class="divtabla">

        <table>
        <tr>
            <th colspan="5"><h1>Categorías</h1></th>
        </tr>
			
        <?php 

if(isset($_POST['btnbuscar']))
{
$buscar = $_POST['txtbuscar'];
$queryusuarios = mysqli_query($conn, "SELECT nombre_categoria, id_categoria FROM categorias where nombre_categoria like '".$buscar."%'");
}
else
{
$queryusuarios = mysqli_query($conn, "SELECT nombre_categoria, id_categoria FROM categorias ORDER BY id_categoria asc");
}
		$numerofila = 0;
        echo "<tr>";
        while($mostrar = mysqli_fetch_array($queryusuarios)) 
		{    $numerofila++;    
            //echo "<th><h3>".$mostrar['nombre_categoria']."</h3></th>"; 
            echo " <td><a href='plantillacat.php?id_objeto=".$mostrar['id_categoria']."&tipo=categoria' class='enlaces'><h3>".$mostrar['nombre_categoria']."</h3></a></td>";
}
echo "</tr>";
        ?>

        </div>
   
    </table>
        </div>
    </div>

    <div class="PiePag">
        <div class="ancho">
        <img class="logo" src="../img/logo.png" alt="logo" srcset=""> <br>
        Enterate de las ultimas noticias sobre el mundo de los videojuegos, podras encontrar guias para conseguir logros complicados, <br>
        descubre nuevos juegos, habla con la comunidad por el foro y muchas más.
        </div>
        <div class="ancho">
            <h3>Páginas</h3>
                <span>
                    <a class='enlaceperfil' href="../index.php">Inicio</a><br>
                    <a class='enlaceperfil' href="../juegos/juegos_principal.php">Juegos</a> <br>
                    <a class='enlaceperfil' href="../noticias/noticias_principal.php">Noticias</a><br>
                    <a class='enlaceperfil' href="../reviews/reviews_principal.php">Reviews</a><br>
                    <a class='enlaceperfil' href="../guias/guias_principal.php">Guías</a><br>
                    <a class='enlaceperfil' href="foro_principal.php">Foro</a>
                </span>
        </div>
        <div class="ancho">
            <h3>Contacta con nosotros</h3>
            Para contactar con nosotros envianos un email a admin@gamingcomunities.es  (Indica en el asunto tu sugerencia o problema).
        </div>

    </div>

</body>

</html>


<?php
/*
$queyNom= mysqli_query($conn, "SELECT titulo, autor FROM foro a INNER JOIN categorias c ON c.id_categoria = a.id_categoria");
            $count = 0;
           while($ver = mysqli_fetch_array($queyNom)){
               $count++;
               echo "<td>".$ver['titulo']."</td>";
               echo "<td>".$ver['autor']."</td>";
           }
*/?>