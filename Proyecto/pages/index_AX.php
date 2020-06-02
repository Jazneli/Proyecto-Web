<?php

session_start();

//Acceso a la base de datos
include("./fix/conexion.php");

//Recupera la información que llega de un formulario
include("./fix/getPosts.php");

//Respuesta en formato JSON para petición AJAX
$respAX = [];

//Contraseña codificada en MD5
$contrasena = md5($contrasena);
$sql = "SELECT *FROM alumno WHERE boleta = '$boleta' AND contrasena = '$contrasena'";
$res = mysqli_quer($conexion,$sql);

//Cuenta el número de registros
$inf = mysqli_num_rows($res);
if($inf == 1){
    $_SESSION["boleta"] = $boleta;
    $respAX["val"] = 1;
    $respAX["msj"] = "<h5>Bienvenido!/h5>";
}else{
    //Cualquier otro caso no nos interesa, no son datos válidos
    $respAX["val"] = 0;
    $respAX["msj"] = "<h5>Datos incorrectos. Favor de intentarlo nuevamente.</h5>";
}

//Convertir arreglo asociativo a formato JSON
echo json_encode($respAX);
?>