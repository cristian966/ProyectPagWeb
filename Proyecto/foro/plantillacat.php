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
        case 'categoria':
            $nombreusuario = mysqli_query($conn, "SELECT nombre_usuario FROM usuario a INNER JOIN post b ON b.id_usuario = a.id_usuario");

            $nombreuser = mysqli_fetch_array($nombreusuario);
            $usuario = $nombreuser['nombre_usuario'];

            /*$queryusuarios = mysqli_query($conn, "SELECT id_post,titulo,texto_post FROM post WHERE id_post = '".$id."'");
            //print_r($queryusuarios);
            //echo $queryusuarios;
           while( $post = mysqli_fetch_array($queryusuarios));{
             $nombre = $post['titulo'];
             $descripcion = $post['texto_post'];
             $idjuego = $post['id_post'];
           }*/
             
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
    <link rel="stylesheet" href="../css/crearpost.css">
    <link rel="stylesheet" href="../css/estilos_menu.css">
   <!-- <link rel="stylesheet" href="../css/estilospanelusuario.css"> crear estilos con las cajas pop up de esta pag -->
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
            echo " <a href='../usuarios/registrado/registrado.php' class=''><img class='fotoperfil' src='../img/loggin.png' alt='Icono perfil'></a> <br>";
        }else {
            echo "<a href='../login/login.php' class=''><img class='fotoperfil' src='../img/loggin.png' alt='Icono perfil'></a>";
        }
    ?>
        
    </div>

    <div>
    <div id="barrabuscar" class="barrabuscarcl">
		<form method="POST">
		<input type="submit" value="Buscar" name="btnbuscar"><input type="text" class="buscar" name="txtbuscar" id="cajabuscar" placeholder="&#128270;Buscar Foro">
		</form>
    </div>
    <br><br>
	<div class="centrarTabla">
    <div class="divtabla">
            <?php



                if(isset($_POST['btnbuscar']))
                {
                    $buscar = $_POST['txtbuscar'];
                    $queryusuarios = mysqli_query($conn, "SELECT titulo, texto_post, id_post FROM post where titulo like '".$buscar."%'");
                }
                else
                {
                    //Variable id añadida para cargar solo los posts de dicha categoria.
                    $queryusuarios = mysqli_query($conn, "SELECT titulo, texto_post, id_post FROM post WHERE id_categoria = $id ORDER BY id_post DESC");
                }
                echo "<table class='tablavisuPost'>";
                echo "<tr>";
                echo "<th class='t1'>Creado por</th>";
                echo "<th class='t1'>Titulo del Post</th>";
                
                echo "</tr>"; 
                
                    while($mostrar = mysqli_fetch_array($queryusuarios)) {
                    echo "<tr>";
                    echo "<td class='tdpost1'>".$usuario."</td>";
                    echo "<td class='tdpost'><a class='enlacecat' href='plantillapost.php?id_objeto=".$mostrar['id_post']."&tipo=post' class='enlaces'><h3>".$mostrar['titulo']."</h3></a></td>";
                    
                    echo "</tr>";
            }

                 echo "</table>";

            ?>
       </div>

    </div>
     

    </div>



    <?php $nombrelogeado = mysqli_query($conn, "SELECT nombre_usuario FROM usuario where nombre_usuario = '".$usuarioingresado."'"); 
        $nomblog = mysqli_fetch_array($nombrelogeado);
        $log = $nomblog['nombre_usuario'];


//Coger el id del usuario que a creado el post
        $idusuario = mysqli_query($conn, "SELECT id_usuario FROM usuario WHERE nombre_usuario = '".$usuarioingresado."'");
        $iduser = mysqli_fetch_array($idusuario);
        $idusuariologeado = $iduser['id_usuario'];


    ?>

<!--<a class="enlaces2" style="font-weight: normal; font-size: 14px;" onclick="abrirform()">Agregar post</a>-->
    <script>/*
function abrirform() {
  document.getElementById("formregistrar").style.display = "block";
  
}

function cancelarform() {
  document.getElementById("formregistrar").style.display = "none";
}*/

</script>
<div class="registrarpost" id="formregistrar">
  <form action="agregar.php" class="" method="POST">
        <table>
		<!--<tr><th colspan="2">Nuevo Post</th></tr>-->

            <!--<tr>
                <td>Nombre del usuario</td>
                <td><input type="text" namme="nombuser" placeholder="<?php //echo $log; ?>" readonly> </td> <-- Cogido el nombre del usuario logeado 
            </tr>-->
        
                    <input type="text" name="iduser" value="<?php echo $idusuariologeado; ?>" hidden><!-- Cogido para añadir el id del usuario -->
                
            
            <tr> 
                <td><input type="text" name="txtnombre" required placeholder="Escribe el titulo de tu Post"></td>
            </tr>
            <tr> 
                <td><textarea type="text" name="texto" id="" cols="60" rows="10" required placeholder="Escribe el tema de tu post"></textarea></td>
            </tr>
            <tr>
            
            
                    <input  type="text" name="cat" value="<?php echo $id; ?>" hidden> <!-- Cogido para añadir el id de la categoria -->
                
            
                
            <tr> 	
               <td colspan="2">
				   <!--<button type="button" onclick="cancelarform()">Cancelar</button>-->
				   <span>
                        <input class="enlaces2" type="submit" name="btnregistrar" value="Enviar" onClick="javascript: return confirm('¿Deseas registrar a este Post?');">
                   </span>
			</td>
            </tr>
            
        </table>
    </form>
</div>
    



    <span>
        <h3><a href="foro_principal.php" class="enlaces2">Volver a Categorías</a> <a href="#arriba" class="enlaces2">Volver arriba</a></h3>
    </span>>

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