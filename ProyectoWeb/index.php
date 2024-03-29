<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Proyecto Web</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link href="js/plugins/validetta/validetta.min.css" rel="stylesheet">
    <link href="js/plugins/confirm/jquery-confirm.min.css" rel="stylesheet">
    <link href="css/general.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="js/plugins/validetta/validetta.min.js"></script>
    <script src="js/plugins/validetta/validettaLang-es-ES.js"></script>
    <script src="js/plugins/confirm/jquery-confirm.min.js"></script>
    <script src="js/index.js"></script>
</head>
<body>
    <header>
        <div class="row center-align">
            <div class="col s12 m12"></div>
                <img src="imgs/header.jpeg" class="responsive-img center-align">
            </div>
        </div>
    </header>
    <main class="main">
        <div class="container">
            <div class="row center-align">
                <div class="col s12 m12">
                    <div class="flow-text">
                        <p class="blue-text text-darken-4"> Bienvenido!<br> Primero Activa tu Cuenta para poder acceder al sistema. </p>
                    </div>
                </div>
            </div>
            <form id="formIndex" autocomplete="off">
            <div class="row center-align">
            <!---Campo boleta-->
                <div class="col s12 m6 input-field">
                    <i class="fas fa-user-graduate prefix blue-text text-accent-4"></i>
                    <label for="boleta">Número de Boleta</label>
                    <input type="text" id="boleta" name="boleta" maxlength="10" data-validetta="required,number,minLength[10],maxLength[10]">
                </div>
            <!---Campo contraseña-->
                <div class="col s12 m6 input-field">
                    <i class="fas fa-lock prefix blue-text text-accent-4"></i>
                    <label for="contrasena">Contrase&ntilde;a</label>
                    <input type="password" id="contrasena" name="contrasena" data-validetta="required,minLength[6]">
                </div>
            <!---Botón entrar-->
                <div class="row right-align">
                    <input type="submit" class="btn blue accent-4" value="Entrar" >
                </div>
            </div>
            </form>
            <!---Botón activar cuenta-->
            <div class="section">
                <div class="row left-align">
                   <!-- <a href="./pages/activar/activar.php" class="btn light-blue darken-1">ACTIVAR CUENTA</a> -->
                   <a href="./activar.php" class="btn light-blue darken-1">ACTIVAR CUENTA</a>
                </div>
            </div>
        </div>
    </main>
    <footer class="page-footer grey darken-3">
        <div class="row center-align">
            <div class="col s12 m12">
                <img src="imgs/footer3.jpeg" class="responsive-img center-align">
            </div>
        </div>
        <div class="row right-align">
            <a href="pages/admin/index.php" class="fas fa-user-tie fa-2x white-text text-accent-4"></a>
        </div>
    </footer>
</body>
</html>