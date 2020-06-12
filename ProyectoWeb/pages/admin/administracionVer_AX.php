<?php
    session_start();
    if(isset($_SESSION["admin"])){
        include("./../fix/conexion.php");
        $boleta = $_GET["boleta"];
        $sqlInfAlmn = "SELECT * FROM alumno WHERE boleta = '$boleta'";
        $resInfAlmn = mysqli_query($conexion, $sqlInfAlmn);
        $infAlmn = mysqli_fetch_row($resInfAlmn);
        $respAX = "
            <h5 class='center-align'>
            Boleta: $infAlmn[0] <br>
            CURP: $infAlmn[1] <br>
            Nombre: $infAlmn[2] $infAlmn[3] $infAlmn[4] <br>
            Correo: $infAlmn[5] <br>
            </h5>
        ";
        echo $respAX;
    }else{
        header("location:./administracion.php");
    }
?>