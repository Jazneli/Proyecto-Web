<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Proyecto Web</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link href="../../js/plugins/validetta/validetta.min.css" rel="stylesheet">
    <link href="../../js/plugins/confirm/jquery-confirm.min.css" rel="stylesheet">
    <link href="../../css/general.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="../../js/plugins/validetta/validetta.min.js"></script>
    <script src="../../js/plugins/validetta/validettaLang-es-ES.js"></script>
    <script src="../../js/plugins/confirm/jquery-confirm.min.js"></script>
    <script src="../../js/indexAdmin.js"></script>
</head>
<body>
    <header>
        <div class="row center-align">
            <div class="col s12 m12"></div>
                <img src="../../imgs/header.jpeg" class="responsive-img center-align">
            </div>
        </div>
    </header>
    <main class="main">
        <div class="container">
            <div class="row center-align">
                <div class="col s12 m12">
                    <div class="flow-text">
                        <h3 class="blue-text text-darken-4">Acceso restringido <br> Espacio reservado para administradores</h3>
                    </div>
                </div>
            </div>
            <div class="row center-align">
                <h1><i class="fas fa-lock fa-2x blue-text text-accent-4"></i></h1>
            </div>
            <div class="row">
                <form id="formAdmin" autocomplete="off">
                <div class="col s12 m4 offset-m4 input-field">
                    <i class="fas fa-user-tie blue-text text-accent-4 prefix"></i>
                    <label for="usuario">Usuario</label>
                    <input type="text" id="usuario" name="usuario" data-validetta="required">
                </div>
                <div class="col s12 m4 offset-m4 input-field">
                    <i class="fas fa-key blue-text text-accent-4 prefix"></i>
                    <label for="contrasena">Contrase&ntilde;a</label>
                    <input type="password" id="contrasena" name="contrasena" data-validetta="required,minLength[6]">
                </div>
                <div class="col s12 m4 offset-m4 input-field">
                    <input type="submit" class="btn blue" style="width:100%;" value="Entrar">
                </div>
                </form>
            </div>
        </div>
    </main>
    <footer class="page-footer grey darken-3">
        <div>
            <div class="col s12 m12"></div>
                <img src="../../imgs/footer3.jpeg" class="responsive-img center-align">
            </div>
        </div>
    </footer>
</body>
</html>