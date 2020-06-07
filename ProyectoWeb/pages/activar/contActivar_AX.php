<?php
    //Inicia una sesión
    session_start();

    include("./../fix/conexion.php");
    include("./../fix/getPosts.php");

    //Respuesta en formato JSON
    $respAX = [];
    
    $sqlBoleta = "SELECT * FROM alumno WHERE boleta= '$boleta' AND activo='1'";
    $resBoleta = mysqli_query($conexion,$sqlBoleta);
    $infBoleta = mysqli_num_rows($resBoleta);

    if($infBoleta >= 1){
        $respAX["val"] = 2;
        $respAX["msj"] = "<h5> Cuenta ya activada </h5>";
    }else{
        $activar = 1; 
        $boleta = $_SESSION['boleta'];
        $contrasena = md5($contrasena);
        $sqlUpdBoleta = "UPDATE alumno SET correo='$correo', telefono='$tel', contrasena='$contrasena', activo='$activar' WHERE boleta='$boleta'";
        $respUpdBoleta = mysqli_query($conexion,$sqlUpdBoleta);
        $inf = mysqli_affected_rows($conexion);
    
        if($inf == 1){
            $respAX["val"] = 1;
            $respAX["msj"] = "<h5>Cuenta Activada. Ya puedes iniciar sesión</h5>";
        }else{
            $respAX["val"] = 0;
            $respAX["msj"] = "<h5>Ocurrio un error, por favor vuele a intentarlo</h5>";
        }
    }

    //Convierte a formato JSON
    echo json_encode($respAX);
?>