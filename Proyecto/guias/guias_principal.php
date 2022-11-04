<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos_menu.css">
    <link rel="stylesheet" href="../css/estilos_inicio.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src=""></script>
    <title>Guías</title>
</head>

<body class="fondo">
    <div class="menu_centrado">
        <div>
            <ul>
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="../juegos/juegos_principal.php">Juegos</a></li>
                <li><a href="../noticias/noticias_principal.php">Noticias</a></li>
                <li><a href="../reviews/reviews_principal.php">Reviews</a></li>
                <li><a class="active" href="guias_principal.php">Guías</a></li>
                <?php 
                session_start();
                    if (isset($_SESSION['nombredelusuario'])) {
                        $nombreusuario=$_SESSION['nombredelusuario'];
                        echo '<li><a href="../foro/foro_principal.php">Foro</a></li>';
                    }else {
                        
                    }
                ?>
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
            echo " <a href='../usuarios/registrado/registrado.php' class=''><img class='fotoperfil' src='../img/loggin.png' alt='Icono perfil'><br> <h3 class='enlaceperfil'>$nombreusuario</h3></a> <br>";
        }else {
            echo "<a href='../login/login.php' class=''><img class='fotoperfil' src='../img/loggin.png' alt='Icono perfil'><br> <h3 class='enlaceperfil'> Iniciar/Registrar </h3></a>";
        }
    ?>
        
    </div>
    <div id="barrabuscar" class="barrabuscarcl">
		<form method="POST">
		<input type="submit" value="Buscar" name="btnbuscar"><input type="text" class="buscar" name="txtbuscar" id="cajabuscar" placeholder="&#128270;Buscar Guía">
		</form>
    </div>
    <br><br>
    <div class="divPadre">

        <div class="contenedor1">
            <div class="titulo">
                <h1 class="titulo1">Guías y consejos</h1>
            </div>
            <!-- Agregar guias -->
            <?php
           

           if(isset($_POST['btnbuscar']))
           {
               $buscar = $_POST['txtbuscar'];
               $queryusuarios = mysqli_query($conn, "SELECT titulo, id_guia, img FROM guia where titulo like '".$buscar."%'");
           }
           else
           {
               $queryusuarios = mysqli_query($conn, "SELECT titulo, id_guia, img FROM guia ORDER BY id_guia DESC");
           }
           
               while($mostrar = mysqli_fetch_array($queryusuarios)) {

                echo "<div class='divzoom'>";
               echo  "<div class='contenedor2'>";
                   echo "<img src='../img/".$mostrar['img']."' alt='imagen guia' class='imagen'>";
                       echo "<div class='divcentrado'>";
                           echo " <a href='../plantilla/plantilla.php?id_objeto=".$mostrar['id_guia']."&tipo=guia' class='enlaces'><h1>".$mostrar['titulo']."</h1></a>";
                       echo "</div>";
               echo "</div>";
               echo "</div>";
               echo "<br>";
   }
?>
            
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
                    <a class='enlaceperfil' href="guias_principal.php">Guías</a><br>
                    <?php 
                
                if (isset($_SESSION['nombredelusuario'])) {
                    echo '<a class="enlaceperfil" href="../foro/foro_principal.php">Foro</a>';
                }else {
                    
                }
            ?>
                </span>
        </div>
        <div class="ancho">
            <h3>Contacta con nosotros</h3>
            Para contactar con nosotros envianos un email a admin@gamingcomunities.es  (Indica en el asunto tu sugerencia o problema).
        </div>

    </div>

</body>

</html>