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
        if(!empty($boleta) && !is_string($boleta) && !preg_match("/[a-zA-Z]/", $boleta)){
            $boleta_validada = true;
        }else{
            $boleta_validada = false;
            $errores['boleta'] = "La boleta no es válido";
        }

        //Validar CURP
        if(!empty($curp)){
            $curp_validado = true;
        } else{
            $curp_validado = false;
            $errores['curp'] = "El CURP no es válido";
        }

        //Validar nombre
        if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
            $nombre_validado = true;
        } else {
            $nombre_validado = false;
            $errores['nombre'] = "El nombre no es válido";
        }

        //Validar primer Apellido
        if(!empty($primerApe) && !is_numeric($primerApe) && !preg_match("/[0-9]/", $primerApe)){
            $primerApe_validado = true;
        } else {
            $primerApe_validado = false;
            $errores['primerApe'] = "El apellido  no es válido";
        }

        //Validar segundo Apellido
        if(!empty($segundoApe) && !is_numeric($segundoApe) && !preg_match("/[0-9]/", $primerApe)){
            $segundoApe_validado = true;
        } else {
            $segundoApe_validado = false;
            $errores['segundoApe'] = "El apellido  no es válido";
        }

        //Validar el campo de correo
        if(!empty($correo) && filter_var($correo, FILTER_VALIDATE_EMAIL)){
            $correo_validado = true;
        } else {
            $correo_validado = false;
            $errores['correo'] = "El email no es válido";
        }

        //Validar tel
        if(!empty($tel) && !is_string($tel) && !preg_match("/[a-zA-Z]/", $tel)){
            $tel_validada = true;
        }else{
            $tel_validada = false;
            $errores['tel'] = "El telefóno no es válido";
        }

        //Validar la contraseña
         if(!empty($contrasena)){
            $contrasena_validado = true;
        } else {
            $contrasena_validado = false;
            $errores['contrasena'] = "La contraseña no es válida";
        }

         //Validar la contraseña
         if(!empty($contrasena2) && strcmp($contrasena, $contrasena2) == 0){
            $contrasena2_validado = true;
        } else {
            $contrasena2_validado = false;
            $errores['contrasena2'] = "La contraseña no es válida";
        }

        //Comprobar los errores para la base de datos
        $guardar_usuario = false;
        
        if(count($errores)==0){
           $guardar_usuario = true;
             
            //Cifrar la contraseña
           $password_segura = password_hash($contrasena, PASSWORD_BCRYPT,['cost'=>4]); //Número de veces que se va a cifrar
         
            //Insertar Usuarios en la tabla correspondiente de la base de datos
            $sql = "INSERT INTO alumno VALUES('$boleta','$curp','$nombre','$primerApe','$segundoApe','$correo','$password_segura','$tel')";

            $guardar = mysqli_query($db, $sql);

            if($guardar){
                $_SESSION['completado'] = "Registrado con exito";
                header("Location: ./../alumno/alumno.php");
            } else{
                $_SESSION['errores']['general'] = "Error al guardar el usuario";
            }
        }else {
            $_SESSION['errores'] = $errores;
            echo "ERRORES";
            header("Location: registrar.php");
        }
    }
?>