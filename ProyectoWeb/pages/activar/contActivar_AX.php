<?php
    //Inicia una sesión
    SESSION_START();

    include("./fix/conexion.php");
    include("./fix/getPosts.php");

    //Respuesta en formato JSON
    $boleta = $_SESSION['boleta'];
    $contrasena = md5($contrasena);
    $sqlUpdBoleta = "UPDATE alumno SET correo='$correo', tel='$tel', contrasena='$contrasena' WHERE boleta='$boleta'";
    $respUpdBoleta = mysqli_query($conexion,$sqlUpdBoleta);
    $inf = mysqli_affected_rows($conexion);

    $respAX = [];
    if($inf == 1){
        $respAX["val"] = 1;
        $respAX["msj"] = "<h5>Cuenta Activada</h5>";
    }else{
        $respAX["val"] = 0;
        $respAX["msj"] = "<h5>Ocurrio un error, por favor vuele a intentarlo</h5>";
    }

    //Convierte a formato JSON
    echo json_encode($respAX);
?>