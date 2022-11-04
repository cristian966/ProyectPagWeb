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
        case 'post':
            //para saber que usuario publico el post
            $nombreusuario = mysqli_query($conn, "SELECT nombre_usuario FROM post a INNER JOIN usuario b ON b.id_usuario = a.id_usuario");

            $nombreuser = mysqli_fetch_array($nombreusuario);
            $usuario = $nombreuser['nombre_usuario'];

            //coger datos del post
            $queryusuarios = mysqli_query($conn, "SELECT titulo, texto_post, comentario FROM post WHERE id_post = '".$id."'");
            //print_r($queryusuarios);
            //echo $queryusuarios;
            $review = mysqli_fetch_array($queryusuarios);
             $nombre = $review['titulo'];
             $descripcion = $review['texto_post'];

    
             //Coger nombre del usuario que escribio el comentario
            $cogerusuariocomentario = mysqli_query($conn, "SELECT nombre_usuario FROM comentarios a INNER JOIN usuario b ON b.id_usuario = a.id_usuario");
            $cogerusu = mysqli_fetch_array($cogerusuariocomentario);
            $cogerusuario = $cogerusu['nombre_usuario'];

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
    <link rel="stylesheet" href="../css/post.css">
    <link rel="stylesheet" href="../css/estilos_menu.css">
    <title>Plantilla</title>
</head>
<body class="fondo">
    <a name="arriba"></a>
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
        session_start();
        if (isset($_SESSION['nombredelusuario'])) {
            $usuarioingresado = $_SESSION['nombredelusuario'];
            echo " <a href='../usuarios/registrado/registrado.php' class=''><img class='fotoperfil' src='../img/loggin.png' alt='Icono perfil'><br> <h3 class='enlaceperfil'>$usuarioingresado</h3></a> <br>";
        }else {
            echo "<a href='../login/login.php' class=''><img class='fotoperfil' src='../img/loggin.png' alt='Icono perfil'><br> <h3 class='enlaceperfil'> Iniciar/Registrar </h3></a>";
        }
    ?>
        
    </div>

    <div class="">
      
        <div class="titulo2">
            <h1 class="titulo3">
                <?php echo $nombre; ?>
            </h1>
        </div>
        <div class="titulo2">
            <h2 class="titulo3">
                Publicado por <?php echo $usuario; ?>
            </h2>
        </div>
        
        <div class="textopostdiv">
        <p class="textopost">
        <!-- carga del texto -->
        <?php echo $descripcion; ?>
        </p>
        </div>
        
        <div class="divtabla">
           <?php 
           
           //Coger comentarios

           $querycomentarios = mysqli_query($conn, "SELECT txtcomentario FROM comentarios WHERE id_post = $id");
           //$comentarios = mysqli_fetch_array($querycomentarios);
           //$comentario = $comentarios['txtcomentario'];
            echo "<table class='tablavisucomentario'>";
            echo "<tr>";
            echo "<th>Nombre del usuario</th>";
            echo "<th>Comentario</th>";
            echo "</tr>";    
                while ($comentarios = mysqli_fetch_array($querycomentarios)) {
                    echo "<tr>";
                    echo "<td class='tdcomentarios1'>".$cogerusuario."</td>";
                    echo "<td class='tdcomentarios'>".$comentarios['txtcomentario']."</td>";
                    echo "</tr>";
                }
                
            
           echo "</table>";
           
           
           ?>
        </div>
    </div>


    <?php
        //Coger el id del ususario logeado.
        $idusuario = mysqli_query($conn, "SELECT id_usuario FROM usuario WHERE nombre_usuario = '".$usuarioingresado."'");
        $iduser = mysqli_fetch_array($idusuario);
        $idusuariologeado = $iduser['id_usuario'];            
                     
    ?>


<br><br>

    <!--<a class="enlaces2" style="font-weight: normal; font-size: 14px;" onclick="abrirform()">Agregar post</a>-->
    <script>/*
function abrirform() {
  document.getElementById("formregistrar").style.display = "block";
  
}

function cancelarform() {
  document.getElementById("formregistrar").style.display = "none";
}*/


</script>
<div class="registrarcomentario" id="formregistrar">
  <form action="agregarcomentario.php" class="contenedor_popup" method="POST">
        <table class="">
		<!--<tr><th colspan="2">Nuevo comentario</th></tr>-->
            
            
                <!--<td>id usuario</td>-->
                <input type="text" name="iduser" value="<?php echo $idusuariologeado; ?>" hidden readonly>
            
            
               <!-- <td>id post</td>-->
                <input  type="text" name="idpost" value="<?php echo $id; ?>" hidden readonly>
            
            <tr> 
                <td><textarea type="text" name="txtnombre" id="" cols="60" rows="10" required placeholder="Escribe tu comentario..."></textarea></td>
               <!-- <td><input type="text" name="txtnombre" required class="caja texto"></td>-->
            </tr>
            <tr> 	
               <td colspan="2">
				   <!--<button type="button" onclick="cancelarform()">Cancelar</button>-->
				  <span><input class="enlaces2" type="submit" name="btnregistrar" value="Enviar" onClick="javascript: return confirm('¿Deseas registrar a este comentario?');"></span> 
			</td>
            </tr>
            
        </table>
    </form>
</div>

    <span>
        <h3><a href="foro_principal.php" class="enlaces2">Volver a Categorías</a> <a href="#arriba" class="enlaces2">Volver arriba</a></h3>
    </span>
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