<?php
    //Conexion
    $servidor = 'localhost';
    $usuarioBD = 'root';
    $password = 'root';
    $basededatos = 'web';
    $conexion = mysqli_connect($servidor, $usuarioBD, $password, $basededatos);
    
    //Asegurar que acepte todos los caracteres especiales
    mysqli_query($conexion, "SET NAMES 'utf8' ");

   //Iniciar la sesión
   if(!isset($_SESSION)){
    session_start();
}
?>