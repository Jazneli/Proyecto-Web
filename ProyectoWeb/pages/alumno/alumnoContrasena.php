<?php
    session_start();
    if(isset($_SESSION["boleta"])){
        include("./alumno_BD.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Contraseña</title>
<meta name='viewport' content='width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no'/>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
<link href="./../../js/plugins/validetta/validetta.min.css" rel="stylesheet">
<link href="./../../js/plugins/confirm/jquery-confirm.min.css" rel="stylesheet">
<link href="./../../css/general.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="./../../js/plugins/validetta/validetta.min.js"></script>
<script src="./../../js/plugins/validetta/validettaLang-es-ES.js"></script>
<script src="./../../js/plugins/confirm/jquery-confirm.min.js"></script>

</head>
<body>
    <?php
        readfile("./../fix/header.html");
    ?>
    <main class="valign-wrapper">
        <div class="container">
            <div class="row">
            <?php echo $infBoleta; ?>
                <div class="col s12">
                    <ul class="tabs ">
                        <li class="tab col s3 blue-text text-darken-4"><a href="alumno.php" class="blue-text text-darken-4"><i class="fas fa-eye"></i> Info</a></li>
                        <li class="tab col s3"><a href="alumnoEditar.php" class="blue-text text-darken-4"><i class="fas fa-edit"></i> Editar</a></li>
                        <li class="tab col s3"><a href="alumnoContrasena.php" class="blue-text text-darken-4"><i class="fas fa-key"></i> Contrase&ntilde;a</a></li>
                        <li class="tab col s3"><a href="alumnoComprobante.php" class="blue-text text-darken-4"><i class="fas fa-folder"></i> Comprobante</a></li>
                    </ul>
                </div>
                <div id="contrasena" class="col s12">
                    <p>&nbsp;</p>
                    <div class="row">
                        <form id="formCambiarContrasena">
                        <div class="col s12 m4 input-field">
                            <label for="contrasenaAct">Contrase&ntilde;a actual</label>
                            <input type="password" id="contrasenaAct" name="contrasenaAct" data-validetta="required,minLength[6]">
                        </div>
                        <div class="col s12 m4 input-field">
                            <label for="contrasenaNva">Contrase&ntilde;a nueva</label>
                            <input type="password" id="contrasenaNva" name="contrasenaNva" data-validetta="required,minLength[6],equalTo[contrasenaNva2]">
                        </div>
                        <div class="col s12 m4 input-field">
                            <label for="contrasenaNva2">Confirmar contrase&ntilde;a</label>
                            <input type="password" id="contrasenaNva2" name="contrasenaNva2" data-validetta="required,minLength[6],equalTo[contrasenaNva]">
                        </div>
                         <div class="row right-align">
                            <input type="submit" class="btn blue accent-4" value="Cambiar Contraseña" >
                        </div>
                        </form>
                    </div>
                </div>
            </div>   
        </div>
        <div class="section">
                    <div class="row right-align">
                        <ul>
                            <li><a href="./../fix/cerrarSesion.php?nombreSesion=boleta" class="btn-floating red"><i class="fas fa-power-off"></i></a></li>
                        </ul>
                    </div>
        </div>
    </main>
    <?php
        readfile("./../fix/footer.html");
    ?>
</body>
</html>
<?php
    }else{
        header("location:./../../index.php");
    }
?>