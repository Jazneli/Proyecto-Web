<?php
    session_start();
    include("./../fix/conexion.php");
    include("./../fix/getPosts.php");

    $boleta = $_SESSION["boleta"];
    $sqlUpdAlumno = "UPDATE alumno SET nombre='$nombre', primerApe='$primerApe', segundoApe='$segundoApe',curp='$curp', correo='$correo', telefono='$tel' WHERE boleta='$boleta'";
    $resUpdAlumno = mysqli_query($conexion,$sqlUpdAlumno);
    $infUpdAlumno = mysqli_affected_rows($conexion);

    $respAX = [];
    if($infUpdAlumno == 1){
        $respAX["val"] = 1;
        $respAX["msj"] = "<h5>Los datos se actualizaron correctamente.</h5>";
    }else{
        $respAX["val"] = 0;
        $respAX["msj"] = "<h5>No se pudo realizar la actualizaci&oacute;n de los datos. Favor de intentarlo nuevamente.</h5>";
    }

    echo json_encode($respAX);
?>