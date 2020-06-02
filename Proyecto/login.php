<?php
    //Iniciar la sesión y la conexión a la bd
    require_once 'pages/fix/conexion.php';
    
    //Recuperar datos del formulraio
    if(isset($_POST)){
        if(isset($_SESSION['error_login'])){
           $_SESSION['error_login']= null;
        }

        //Recoger datos del formulario
        $boleta = trim($_POST['boleta']);
        $contrasena = $_POST['contrasena'];

        //Consulta para comprobar las credenciales del usuario
        $sql = "SELECT * FROM alumno WHERE boleta = '$boleta'";
        $login = mysqli_query($conexion, $sql);
        
        if($login && mysqli_num_rows($login) == 1){
            $usuario = mysqli_fetch_assoc($login);
            
            if($contrasena){
                //Utilizar una sesión para guardar los datos de usuario logueado
                $_SESSION['usuario'] = $usuario;
                if(isset($_SESSION['error_login'])){
                    session_unset($_SESSION['error_login']);
                }

            }else{
                  //Crear una sesión con el fallo en caso de que algo este mal
                  $_SESSION['error_login'] = "Login incorrecto.";
            }
       } else{
           //Mensaje de error
           $_SESSION['error_login'] = "Login incorrecto.";
       }
    }

    //Redirigir al index 
    header('Location: ./pages/alumno/alumno.php');
?>