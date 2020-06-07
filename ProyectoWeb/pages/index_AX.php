<?php
    //Inicia una sesión
    SESSION_START();

    //Configuración de la base de datos
    include("./fix/conexion.php");

    //Recibe la información de un formulario
    include("./fix/getPosts.php");

    //Respuesta en formato JSON
    $respAX = [];
    $contrasena = md5($contrasena);
    //Consulta
    $sql = "SELECT * FROM alumno WHERE boleta = '$boleta' AND contrasena = '$contrasena'";
    $res = mysqli_query($conexion,$sql);
    
    //Cuenta las filas que se regresan con esos datos
    $inf = mysqli_num_rows($res);
    if($inf == 1){
        $_SESSION["boleta"] = $boleta;
        $respAX["val"] = 1;
        $respAX["msj"] = "<h5>Bienvenido!</h5>";
    }else{
        $respAX["val"] = 0;
        $respAX["msj"] = "<h5>Datos incorrectos. Favor de intentarlo nuevamente.</h5>";
    }

    //Convierte a formato JSON
    echo json_encode($respAX);
?>