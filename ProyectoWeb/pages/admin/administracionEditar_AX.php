<?php
    session_start();
    if(isset($_SESSION["admin"])){
        include("./../fix/conexion.php");
        include("./../fix/getPosts.php");

        $respAX = [];
        $sqlUpdAlmn = "UPDATE alumno SET curp = '$curp', nombre = '$nombre', primerApe = '$primerApe', segundoApe = '$segundoApe', correo = '$correo', telefono = '$telefono' WHERE boleta = '$boleta'";
        $resUpdAlmn = mysqli_query($conexion, $sqlUpdAlmn);
        $infUpdAlmn = mysqli_affected_rows($conexion);
        if($infUpdAlmn == 1){
            $respAX["cod"] = 1;
            $respAX["msj"] = "<h5 class='center-align'>Los datos del alumno se actualizar&oacute;n correctamente.</h5>";
        }else{
            $respAX["cod"] = 0;
            $respAX["msj"] = "<h5 class='center-align'>No se pudo actualizar los datos. Favor de intentarlo nuevamente.</h5>";
        }
        echo json_encode($respAX);
    }else{
        header("location:./administracion.php");
    }
?>