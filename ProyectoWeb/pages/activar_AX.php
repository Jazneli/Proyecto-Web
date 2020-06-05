<?php
    //Inicia una sesión
    SESSION_START();

    include("./fix/conexion.php");
    include("./fix/getPosts.php");

    //Respuesta en formato JSON
    $respAX = [];

    //Consulta
    $sql = "SELECT * FROM alumno WHERE boleta = '$boleta' AND curp = '$curp'";
    $res = mysqli_query($conexion,$sql);
    
    //Cuenta las filas que se regresan con esos datos
    $inf = mysqli_num_rows($res);
    if($inf == 1){
        $_SESSION["boleta"] = $boleta;
        $respAX["val"] = 1;
        $respAX["msj"] = "<h5>Continua la Activación de tu Cuenta</h5>";
    }else{
        $respAX["val"] = 0;
        $respAX["msj"] = "<h5>Datos no encontrados en la BD. Favor de Registrar tu cuenta.</h5>";
    }

    //Convierte a formato JSON
    echo json_encode($respAX);
?>