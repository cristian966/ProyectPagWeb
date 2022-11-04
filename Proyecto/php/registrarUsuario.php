<?php
    include "../php/conexion.php";
    $nombre = $_POST['nombre'];
    $contrasena = $_POST['contrasena'];
    $email = $_POST['email'];
    //$rol = $_POST['rol'];

    $comprobar = "SELECT * FROM usuario WHERE nombre_usuario = $nombre";

    if (isset($_POST['btnregistrar'])) {
        $sqlregistrar = "INSERT INTO usuario(nombre_usuario,contraseña,email,id_rol) values ('$nombre' , '$contrasena' , '$email' , '2')"; 

        if ($comprobar == $nombre) {
            echo "Error: Nombre de usuario ya existente";
        }elseif (mysqli_query($conn,$sqlregistrar)) {
            echo "<script>alert('Usuario registrado con exito: $nombre'); window.location = '../login/login.php'</script>";
        }     
        
    
    }

?>