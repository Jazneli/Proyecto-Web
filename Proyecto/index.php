<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Web</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link href="./js/plugins/validetta/validetta.min.css" rel="stylesheet">
    <link href="./js/plugins/confirm/jquery-confirm.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="./css/general.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="./js/plugins/validetta/validetta.min.js"></script>
    <script src="./js/plugins/validetta/validettaLang-es-ES.js"></script>
    <script src="./js/plugins/confirm/jquery-confirm.min.js"></script>
    <script src="./js/index.js"></script>
</head>
<body>
    <?php
        readfile("./pages/fix/header.html");
    ?>
    <main class="valign-wrapper">
        <div class="container">
            <div class="row center-align">
                <div class="col s12 m12">
                    <div class="card-panel flow-text">
                        <span class="blue-text text-darken-2">Bienvenido!<br> Primero Activa tu Cuenta para poder acceder al sistema.</span>
                    </div>
                </div>
            </div>
            <form id="formIndex" autocomplete="off">
            <div class="row center-align">
                <div class="col s12 m6 input-field">
                    <i class="fas fa-user prefix blue-text"></i>
                    <label for="boleta">Número de Boleta</label>
                    <input type="text" id="boleta" name="boleta" maxlength="10" data-validetta="required,number,minLength[10],maxLength[10]">
                </div>

                <div class="col s12 m6 input-field">
                    <i class="fas fa-key prefix blue-text"></i>
                    <label for="contrasena">Contrase&ntilde;a</label>
                    <input type="password" id="contrasena" name="contrasena" data-validetta="required,minLength[6]">
                </div>

                <div class="row center-align">
                    <button class="btn blue accent-3" type="submit" name="action">Entrar</button>
                </div>
                <div class="section">
                    <div class="row left-align">
                        <a href="#" class="btn blue">ACTIVAR CUENTA</a> 
                    </div>
                </div>
            </div>
            </form>
        </div>
    </main>
    <?php
        readfile("./pages/fix/footer.html");
    ?>
</body>
</html>