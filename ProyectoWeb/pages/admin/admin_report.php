<?php
    session_start();
    if(isset($_SESSION["admin"])){
        include("./../fix/conexion.php");
        include("./admin_rep_BD.php");        
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Administraci&oacute;n Reporte Gr&aacute;fico</title>
<meta name='viewport' content='width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no'/>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="./../../css/general.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<script>
    var claves = <?php echo json_encode($arrayClaves)?>;
    var cantidad = <?php echo json_encode($numClaves)?>;
</script>
<script src="./../../js/administracionReporte.js"></script>
</head>
<body>
    <header>
        <nav class="nav-wrapper blue darken-4">
            <div class="container">
                <a href="#" class="left sidenav-trigger" data-target="mobile-links"><i class="material-icons">menu</i></a>
                <a class="brand-logo center-on-med-and-down">Administración</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="./inicio.php" class="#">Inicio<i class="material-icons right">home</i></a></li>
                    <li><a href="./../fix/cerrarSesion.php?nombreSesion=admin" class="#">Cerrar Sesion<i class="material-icons right">power_settings_new</i></a></li>
                </ul>
            </div>
        </nav>
        <ul class="sidenav" id="mobile-links">
            <li><a href="./inicio.php" class="#"><i class="material-icons right">home</i></a></li>
            <li><a href="./../fix/cerrarSesion.php?nombreSesion=admin" class="href">Cerrar Sesion<i class="material-icons right">power_settings_new</i></a></li>
        </ul>
    </header>
    <main>
        <div class="container">
            <div class="row center-align">
                <div id="genClaves"></div>
            </div>
            <div class="row">
                <table class="striped blue lighten-4 centered responsive-table">
                    <thead>
                        <tr>
                            <th>Clave</th><th>Materia</th><th>Reporte</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo $filasMaterias; ?>
                    </tbody>
                </table>
            </div>
            <div class="row center-align">
                <a href="./inicio.php" class="btn teal">Regresar</a>
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