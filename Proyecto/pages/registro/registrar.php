<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Registro</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <link href="css/general.css" rel="stylesheet">
        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>
    <?php
        readfile("./../fix/header.html");
    ?>
    <main class="valign-wrapper">
        <div class="container">
            <div class="row">
                <div class="row center-align">
                    <div class="col s12 m12">
                        <div class="flow-text">
                            <p class="blue-text text-darken-4"> La información no se encuentra registrada. <br>Ingresa los siguientes datos para poder registrar tu cuenta. </p>
                        </div>
                    </div>
                </div>
                <form id="formActivar" autocomplete="off" action="registro.php" method="POST">
                <div class="col s12 m4 input-field">
                    <label for="boleta">Boleta</label>
                    <input type="text" id="boleta" name="boleta" maxLength="10">
                </div>
                <div class="col s12 m4 input-field">
                    <label for="curp">CURP</label>
                    <input type="text" id="curp" name="curp" minLength="18" maxLength="18">
                </div>
                <div class="col s12 m4 input-field">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" >
                </div>
                <div class="col s12 m4 input-field">
                    <label for="primerApe">Primer apellido</label>
                    <input type="text" id="primerApe" name="primerApe">
                </div>
                <div class="col s12 m4 input-field">
                    <label for="seundoApe">Segundo apellido</label>
                    <input type="text" id="segundoApe" name="segundoApe">
                </div>
                <div class="col s12 m4 input-field">
                    <label for="correo">Correo</label>
                    <input type="text" id="correo" name="correo" >
                </div>
                <div class="col s12 m4 input-field">
                    <label for="tel">N&uacute;mero Telef&oacute;nico</label>
                    <input type="text" id="tel" name="tel" minLength="10">
                </div>
                <div class="col s12 m4 input-field">
                    <label for="contrasena">Contrase&ntilde;a</label>
                    <input type="password" id="contrasena" name="contrasena" minLength="6">
                </div>
                <div class="col s12 m4 input-field">
                    <label for="contrasena2">Confirmar contrase&ntilde;a</label>
                    <input type="password" id="contrasena2" name="contrasena2" minLength="6">
                </div>

                <div class="row right-align">
                    <button class="btn blue accent-4" type="submit" name="action">Registrar</button>
                </div>
                <div class="section">
                    <div class="row left-align">
                        <a href=".\..\..\index.php" class="btn light-blue darken-1">Cancelar</a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </main>
    <?php
        readfile("./../fix/footer.html");
    ?>
</body>
</html>