<?php
    session_start();
    include("./../fix/getPosts.php");

    $contrasena = md5($contrasena);
    $respAX = [];
    if($usuario == "admin" && $contrasena == "5f4dcc3b5aa765d61d8327deb882cf99"){ //'password'
        $_SESSION["admin"] = "bepti";
        $respAX["cod"] = 1;
        $respAX["msj"] = "<h5 class='center-align'>Bienvenido Administrador</h5>";
    }else{
        $respAX["cod"] = 0;
        $respAX["msj"] = "<h5 class='center-align'>No coinciden los datos. Favor de intentarlo nuevamente</h5>";
    }

    echo json_encode($respAX);
?>