<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activar Cuenta</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link href="js/plugins/validetta/validetta.min.css" rel="stylesheet">
    <link href="js/plugins/confirm/jquery-confirm.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/general.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="js/plugins/validetta/validetta.min.js"></script>
    <script src="js/plugins/validetta/validettaLang-es-ES.js"></script>
    <script src="js/plugins/confirm/jquery-confirm.min.js"></script>
    <script src="js/activar.js"></script>
</head>
<body>
<header>
        <div class="row center-align">
            <div class="col s12 m12"></div>
                <img src="imgs/header.jpeg" class="responsive-img center-align">
            </div>
        </div>
    </header>
  <!-- <?php
         readfile("./../fix/header.html");
    ?>-->
    <main class="valign-wrapper">
        <div class="container">
            <div class="row center-align">
                <div class="col s12 m12">
                    <div class="flow-text">
                        <p class="blue-text text-darken-4"> Activa tu Cuenta </p>
                    </div>
                </div>
            </div>
            <form id="formActivar" autocomplete="off">
            <div class="row center-align">
                <div class="col s12 m6 input-field">
                    <i class="fas fa-user-graduate prefix blue-text text-accent-4"></i>
                    <label for="boleta">Número de Boleta</label>
                    <input type="text" id="boleta" name="boleta" maxlength="10" data-validetta="required,number,minLength[10],maxLength[10]">
                </div>

                <div class="col s12 m6 input-field">
                    <i class="fas fa-user prefix blue-text text-accent-4"></i>
                    <label for="contrasena">CURP</label>
                    <input type="text" id="curp" name="curp" data-validetta="required,minLength[18],maxLength[18]">
                </div>
                
                <div class="row right-align">
                    <button class="btn blue accent-4" type="submit" name="action">Activar</button>
                </div>
                <div class="section">
                    <div class="row left-align">
                        <a href=".\..\..\index.php" class="btn light-blue darken-1">Volver</a>
                    </div>
                    <div class="row right-align">
                        <a href=".\..\registro\registrar.php" class="btn light-blue darken-1">Registrar</a>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </main>
    <footer>
    <div class="row center-align">
        <div class="col s12 m12"></div>
             <img src="imgs/footer3.jpeg" class="responsive-img center-align">
        </div>
    </div>
</footer>
    <!--
    <?php
        readfile("./../fix/footer.html");
    ?>-->
</body>
</html>