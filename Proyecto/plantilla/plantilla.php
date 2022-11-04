
<?php
//$titulo;
//$descripcion;
//$imagen;
include_once "../php/conexion.php";
    if (isset($_GET['id_objeto']) && isset($_GET['tipo'])) {
        $id = $_GET['id_objeto'];
        $tipo = $_GET['tipo'];
    }
    else{
        return;
    }

    switch ($tipo) {
        case 'review':
            $queryusuarios = mysqli_query($conn, "SELECT titulo, texto_review, img FROM review WHERE id_review = '".$id."'");
            //print_r($queryusuarios);
            //echo $queryusuarios;
            $review = mysqli_fetch_array($queryusuarios);
             $nombre = $review['titulo'];
             $descripcion = $review['texto_review'];
             $imagen = $review['img'];
            break;
        case 'noticia':
            $queryusuarios = mysqli_query($conn, "SELECT titulo, texto_noticia, img FROM noticia WHERE id_noticias = '".$id."'");
            $noticia = mysqli_fetch_array($queryusuarios);
            $nombre = $noticia['titulo'];
            $descripcion = $noticia['texto_noticia'];
            $imagen = $noticia['img'];
            break;
        case 'juego':
            $queryusuarios = mysqli_query($conn, "SELECT nombre, descripcion, foto FROM juego WHERE id_juego = '".$id."'");
            $juego = mysqli_fetch_array($queryusuarios);
            $nombre = $juego['nombre'];
            $descripcion = $juego['descripcion'];
            $imagen = $juego['foto'];
            break;
        case 'guia':
            $queryusuarios = mysqli_query($conn, "SELECT titulo, texto_guia, img FROM guia WHERE id_guia = '".$id."'");
            $guia = mysqli_fetch_array($queryusuarios);
            $nombre = $guia['titulo'];
            $descripcion = $guia['texto_guia'];
            $imagen = $guia['img'];
            break;           

        default:
            # code...
            break;
    }

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos_inicio.css">
    <link rel="stylesheet" href="../css/estilos_plantilla.css">
    <link rel="stylesheet" href="../css/estilos_menu.css">
    <title>Plantilla</title>
</head>
<body class="fondo">
<div class="menu_centrado">
        <div>
            <ul>
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="../juegos/juegos_principal.php">Juegos</a></li>
                <li><a href="../noticias/noticias_principal.php">Noticias</a></li>
                <li><a href="../reviews/reviews_principal.php">Reviews</a></li>
                <li><a href="../guias/guias_principal.php">Guías</a></li>
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

    <!-- Foto del juego centrada -->
<div class="divgeneral">

    <div class="divPadreP">
        <div class="imagenP">
            <img class="imagen1" src="<?php echo "../img/".$imagen; ?>" alt="Foto">
        </div>
      <div>
      <h1 class="nombre">
        <?php echo $nombre; ?>
        </h1>
      </div>
        <div>
            <!-- descripcion del juego -->
            <?php echo "<div class='parraf'>".$descripcion."</div>"; ?>
        </div>
            
        
        <span class="PiePag">
            <!-- pie de pagina enlaces para volver a juegos(principal)/index -->
            <h3>Para volver a la página principal pulse <a class="enlaces" href="../index.php">Aquí</a></h3>
        </span>
    </div>

</div>
    

</body>
</html>