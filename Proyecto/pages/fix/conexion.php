<?php
    //Conexion
    $servidor = 'localhost';
    $usuarioBD = 'root';
    $password = 'root';
    $basededatos = 'web';
    $conexion = mysqli_connect($servidor, $usuario, $password, $basededatos);
    
    //Asegurar que acepte todos los caracteres especiales
    mysqli_query($conexion, "SET NAMES 'utf8' ");

    if(mysqli_connect_errno($conexion)){
		die("Problemas con la conexi&oacute;n al servidor MySQL: ".mysqli_connect_error());
	}else{
		mysqli_query($conexion, "SET NAMES 'utf8'"); //Esta instrucción permite guardar eñes y acentos en la BD ;)
	}
?>