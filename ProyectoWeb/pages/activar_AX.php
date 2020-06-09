<?php
    //Inicia una sesión
    SESSION_START();

    include("./fix/conexion.php");
    include("./fix/getPosts.php");

    //Respuesta en formato JSON
    $respAX = [];
    $activo = 0;
    //Consulta
    $sql = "SELECT * FROM alumno WHERE boleta = '$boleta' AND curp = '$curp' AND activo = '$activo'";
    $res = mysqli_query($conexion,$sql);
    
    //Cuenta las filas que se regresan con esos datos
    $inf = mysqli_num_rows($res);
    if($inf == 1){
        $_SESSION["boleta"] = $boleta;
        $respAX["val"] = 1;
        $respAX["msj"] = "<h5>Continua la Activación de tu Cuenta</h5>";
    }else{
        $activado = 1;
        //Consulta
        $sqlAct = "SELECT * FROM alumno WHERE boleta = '$boleta' AND curp = '$curp' AND activo = '$activado'";
        $resACt = mysqli_query($conexion,$sqlAct);
        $infAct = mysqli_num_rows($resACt);
        if($infAct == 1){
            $respAX["val"] = 2;
            $respAX["msj"] = "<h5>Tu Cuenta  ya fue Activada</h5>";
        }else{
        $respAX["val"] = 0;
        $respAX["msj"] = "<h5>Datos no encontrados en la BD. Favor de Registrar tu cuenta.</h5>";
        }
    }

    //Convierte a formato JSON
    echo json_encode($respAX);
?>