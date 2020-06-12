<?php
    session_start();
    if(isset($_SESSION["admin"])){
        include("./administracion_BD.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>CRUD - TW - 20202 - Administraci&oacute;n</title>
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
<script src="./../../js/administracion.js"></script>
</head>
<body>
    <header>
        <div class="fixed-action-btn click-to-toggle">
            <a class="btn-floating btn-large teal">
                <i class="fas fa-ellipsis-h"></i>
            </a>
            <ul>
                <li><a href="./../fix/cerrarSesion.php?nombreSesion=admin" class="btn-floating teal accent-4"><i class="fas fa-power-off"></i></a></li>
                <li><a href="./administracionReporte.php" class="btn-floating teal accent-4"><i class="fas fa-chart-bar"></i></a></li>
            </ul>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <table class="striped centered responsive-table">
                    <thead>
                        <tr>
                            <th>Boleta</th><th>Nombre</th><th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo $filasAlumnos; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
<?php
    }else{
        header("location:./");
    }
?>