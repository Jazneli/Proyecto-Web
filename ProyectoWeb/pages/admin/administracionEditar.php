<?php
    session_start();
    if(isset($_SESSION["admin"])){
        include("./../fix/conexion.php");
        $boleta = $_GET["boleta"];
        $sqlInfAlmn = "SELECT * FROM alumno WHERE boleta = '$boleta'";
        $resInfAlmn = mysqli_query($conexion, $sqlInfAlmn);
        $infAlmn = mysqli_fetch_row($resInfAlmn);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Administracion - Editar</title>
<meta name='viewport' content='width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no'/>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="./../../js/plugins/validetta/validetta.min.css" rel="stylesheet">
<link href="./../../js/plugins/confirm/jquery-confirm.min.css" rel="stylesheet">
<link href="./../../css/general.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="./../../js/plugins/validetta/validetta.min.js"></script>
<script src="./../../js/plugins/validetta/validettaLang-es-ES.js"></script>
<script src="./../../js/plugins/confirm/jquery-confirm.min.js"></script>
<script src="./../../js/administracionEditar.js"></script>
</head>
<body>
    <header>
        <nav class="nav-wrapper blue darken-4">
            <div class="container">
                <a href="#" class="left sidenav-trigger" data-target="mobile-links"><i class="material-icons">menu</i></a>
                <a class="brand-logo center-on-med-and-down">Editar alumno</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="" class="href">Reporte General<i class="material-icons right">insert_chart</i></a></li>
                    <li><a href="./../fix/cerrarSesion.php?nombreSesion=admin" class="#">Cerrar Sesion<i class="material-icons right">power_settings_new</i></a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main class="valign-wrapper center-align">
        <div class="container">
            <div class="row">
                <form id="formEditar" autocomplete="off">
                    <div class="col s12 m6 input-field">
                        <label class="blue-text text-darken-4" for="boleta">Boleta</label>
                        <input type="text" id="boleta" name="boleta" maxLength="10" value="<?php echo $infAlmn[0];  ?>" readonly data-validetta="required,number,minLength[8],maxLength[10]">
                    </div>
                    <div class="col s12 m6 input-field">
                        <label class="blue-text text-darken-4" for="curp">CURP</label>
                        <input type="text" id="curp" name="curp" value="<?php echo $infAlmn[1]; ?>" data-validetta="required,minLength[18],maxLength[18]">
                    </div>
                    <div class="col s12 m4 input-field">
                        <label class="blue-text text-darken-4" for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" value="<?php echo $infAlmn[2]; ?>" data-validetta="required">
                    </div>
                    <div class="col s12 m4 input-field">
                        <label class="blue-text text-darken-4" for="primerApe">Primer apellido</label>
                        <input type="text" id="primerApe" name="primerApe" value="<?php echo $infAlmn[3]; ?>" data-validetta="required">
                    </div>
                    <div class="col s12 m4 input-field">
                        <label class="blue-text text-darken-4" for="seundoApe">Segundo apellido</label>
                        <input type="text" id="segundoApe" name="segundoApe" value="<?php echo $infAlmn[4]; ?>" data-validetta="required">
                    </div>
                    <div class="col s12 m6 input-field">
                        <label class="blue-text text-darken-4" for="correo">Correo</label>
                        <input type="text" id="correo" name="correo" value="<?php echo $infAlmn[5]; ?>" data-validetta="required,email">
                    </div>
                    <div class="col s12 m6 input-field">
                        <label class="blue-text text-darken-4" for="telefono">Teléfono</label>
                        <input type="text" id="telefono" name="telefono" value="<?php echo $infAlmn[7]; ?>" data-validetta="required,minLength[10]">
                    </div>
                    <div class="col s12 m6 input-field">
                        <a href="./inicio.php" class="btn orange" style="width:100%;">Cancelar</a>
                    </div>
                    <div class="col s12 m6 input-field">
                        <input type="submit" class="btn blue" style="width:100%;" value="Actualizar">
                    </div>
                </form>
            </div>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
<?php
    }else{
        header("location:./administracion.php");
    }
?>