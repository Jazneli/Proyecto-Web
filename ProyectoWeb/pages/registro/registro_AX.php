<?php
    include("./../fix/conexion.php");
    include("./../fix/getPosts.php");

    $respAX = [];

    $sqlBoleta = "SELECT * FROM alumno WHERE boleta= '$boleta'";
    $resBoleta = mysqli_query($conexion,$sqlBoleta);
    $infBoleta = mysqli_num_rows($resBoleta);

    if($infBoleta >= 1){
        $respAX["cod"] = 2;
        $respAX["msj"] = "<h5> Boleta ya registrada </h5>";
    }else{
        $contrasena = md5($contrasena);
        $sqlInsBoleta = "INSERT INTO alumno VALUES('$boleta','$curp','$nombre','$primerApe','$segundoApe','$correo','$contrasena','$tel')";
        $resInsBoleta = mysqli_query($conexion,$sqlInsBoleta);
        $infInsBoleta = mysqli_affected_rows($conexion);
        if($infInsBoleta == 1){
            $respAX["cod"] = 1;
            $respAX["msj"] = "<h5> Registro Exitoso </h5>";
        }else{
            $respAX["cod"] = 0;
            $respAX["msj"] = "<h5> Error al realizar el Registro </h5>";
        }
    }
    echo json_encode($respAX);
?>