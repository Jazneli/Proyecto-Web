<?php
    //Iniciar la sesión y la conexión a la bd
    require_once 'pages/fix/conexion.php';
    
    //Recuperar datos del formulraio
    if(isset($_POST)){

        //Recoger datos del formulario
        $boleta = $_POST['boleta'];
        $contrasena = $_POST['contrasena'];

        //Consulta para comprobar las credenciales del usuario
        $sql = "SELECT * FROM alumno WHERE boleta = '$boleta'";
        $login = mysqli_query($conexion, $sql);
        
        if($login && mysqli_num_rows($login) == 1){
            $usuario = mysqli_fetch_assoc($login);
            $verify = password_verify($contrasena, $usuario['contrasena']);
            if($verify){
                //Utilizar una sesión para guardar los datos de usuario logueado
                $_SESSION['usuario'] = $usuario;
                header('Location: pages/alumno/alumno.php');
            }else{
                  //Crear una sesión con el fallo en caso de que algo este mal
                  echo "<h1>Login incorrecto</h1>.";
                  header('Location: index.php');
            }
       } else{
           //Mensaje de error
           echo "<h1>Login incorrecto</h1>.";
       }
    } else{
        if (empty($_POST['boleta']) || empty($_POST['contrasena'])) { //verificamos que no esten vacios los campos 
            echo "<h1>ingrese sus datos </h1> <br>"; //cambiar por un alert
        }
    }
    
?>