<?php
    session_start();
    if(isset($_SESSION["admin"])){
        include("./admin_table_AX.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Proyecto Web - Admin inicio</title>
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
<script src="./../../js/administracion.js"></script>
</head>
<body>
    <header>
        <nav class="nav-wrapper blue darken-4">
            <div class="container">
                <a href="#" class="left sidenav-trigger" data-target="mobile-links"><i class="material-icons">menu</i></a>
                <a class="brand-logo center-on-med-and-down">Administración</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="./admin_report.php" class="">Reporte General<i class="material-icons right">insert_chart</i></a></li>
                    <li><a class="dropdown-trigger" href="#" data-target="dropdown1">Buscar alumno<i class="material-icons right">arrow_drop_down</i></a></li>
                    <ul id="dropdown1" class="dropdown-content">
                        <li><a class="findBoleta" href="#">Por boleta</a></li>
                        <li><a class="findCurp" href="#">Por CURP</a></li>
                    </ul>
                    <li><a href="./../fix/cerrarSesion.php?nombreSesion=admin" class="#">Cerrar Sesion<i class="material-icons right">power_settings_new</i></a></li>
                </ul>
            </div>
        </nav>
        <ul class="sidenav" id="mobile-links">
            <li><a href="./administracionReporte.php">Reporte General<i class="material-icons right">insert_chart</i></a></li>
            <li><a class="dropdown-trigger" href="#" data-target="dropdown2">Buscar alumno<i class="material-icons right">arrow_drop_down</i></a></li>
            <ul id="dropdown2" class="dropdown-content">
                <li><a class="findBoleta" href="#">Por boleta</a></li>
                <li><a class="findCurp" href="#">Por CURP</a></li>
            </ul>
            <li><a href="./../fix/cerrarSesion.php?nombreSesion=admin" class="href">Cerrar Sesion<i class="material-icons right">power_settings_new</i></a></li>
        </ul>
        <div class="fixed-action-btn click-to-toggle">
            <a class="btn-floating btn-large blue darken-4">
                <i class="fas fa-ellipsis-h"></i>
            </a>
            <ul>
                <li><a href="./../fix/cerrarSesion.php?nombreSesion=admin" class="btn-floating blue darken-4"><i class="fas fa-power-off"></i></a></li>
                <li><a href="./administracionReporte.php" class="btn-floating blue darken-4"><i class="fas fa-chart-bar"></i></a></li>
            </ul>
        </div>
    </header>
    <main class="blue darken-3">
        <div class="container">
            <div class="row">
                <table class="striped blue lighten-4 centered responsive-table">
                    <thead>
                        <tr>
                            <th>Boleta</th><th>Curp</th><th>Nombre</th><th>Opciones</th>
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