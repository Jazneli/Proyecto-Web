<?php
    session_start();
    if(isset($_SESSION["admin"])){
        include("./../fix/conexion.php");
        $curp = $_GET["curp"];
        $sqlInfAlmn = "SELECT * FROM alumno WHERE curp = '$curp'";
        $resInfAlmn = mysqli_query($conexion, $sqlInfAlmn);
        $inf = mysqli_num_rows($resInfAlmn);
        if($inf == 1){
            $infAlmn = mysqli_fetch_row($resInfAlmn);
            $respAX = "
                <h5 class='center-align'>
                Boleta: $infAlmn[0] <br>
                CURP: $infAlmn[1] <br>
                Nombre: $infAlmn[2] $infAlmn[3] $infAlmn[4] <br>
                Correo: $infAlmn[5] <br>
                </h5>
            ";
        }
        else{
            $respAX = "<h5 class='center-align'>CURP: $curp. No encontrado.</h5>";
        }
        echo $respAX;
    }else{
        header("location:./inicio.php");
    }
?>