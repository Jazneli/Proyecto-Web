<?php
    if(isset($_POST)){
        require_once './../fix/conexion.php';

        //Iniciar Sesión
        if(!isset($_SESSION)){
            session_start();
        }

        //Recoger los valores del formulario
        $boleta = isset($_POST['boleta']) ? mysqli_real_escape_string($conexion,$_POST['boleta']) : false;

        $curp = isset($_POST['curp']) ? mysqli_real_escape_string($conexion,$_POST['curp']) : false; 

        $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conexion,$_POST['nombre']) : false; 

        $primerApe = isset($_POST['primerApe']) ? mysqli_real_escape_string($conexion,$_POST['primerApe']) : false; 

        $segundoApe = isset($_POST['segundoApe']) ? mysqli_real_escape_string($conexion,$_POST['segundoApe']) : false; 

        $correo = isset($_POST['correo']) ? mysqli_real_escape_string($conexion,trim($_POST['correo'])): false;

        $tel= isset($_POST['tel']) ? mysqli_real_escape_string($conexion,trim($_POST['tel'])): false;

        $contrasena = isset($_POST['contrasena']) ? mysqli_real_escape_string($conexion,$_POST['contrasena']) : false;

        $contrasena2 = isset($_POST['contrasena2']) ? mysqli_real_escape_string($conexion,$_POST['contrasena2']) : false;

        //Array de errores
        $errores = array();

        //Validar los datos antes de guardar en la base de datos
        //Validar boleta
        if(!empty($boleta) && !is_string($boleta)){

        }
    }
?>