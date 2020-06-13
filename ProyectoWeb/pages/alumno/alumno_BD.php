<?php
    include("./../fix/conexion.php");
    
    $boleta = $_SESSION["boleta"];
    $sqlInfBoleta = "SELECT * FROM alumno WHERE boleta = '$boleta'";
    $resInfBoleta = mysqli_query($conexion, $sqlInfBoleta);
    $infInfBoleta = mysqli_fetch_row($resInfBoleta);
    $infBoleta = "<h5>Bienvenido $infInfBoleta[2] $infInfBoleta[3] $infInfBoleta[4] ($infInfBoleta[0])</h5>";
    $inf = "<h5>$infInfBoleta[2] $infInfBoleta[3] $infInfBoleta[4] ($infInfBoleta[0])</h5>";
?>