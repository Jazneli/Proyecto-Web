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
<title>Alumno</title>
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
<script src="./../../js/alumno.js"></script>
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
                        <li class="tab col s3 blue-text text-darken-4"><a href="#info" class=" active blue-text text-darken-4"><i class="fas fa-eye"></i> Unidades de Aprendizaje</a></li>
                        <li class="tab col s3"><a href="#editar" class="blue-text text-darken-4"><i class="fas fa-edit"></i> Editar</a></li>
                        <li class="tab col s3"><a href="#contrasena" class="blue-text text-darken-4"><i class="fas fa-key"></i> Contrase&ntilde;a</a></li>
                        <li class="tab col s3"><a href="#comprobante" class="blue-text text-darken-4"><i class="fas fa-folder"></i> Comprobante</a></li>
                    </ul>
                </div>
                <div id="info" class="col s12">
                    <br>
                    <h6 class="red-text text-darken-4 center-align"> Da click en el boton para ir al formulario de seleccion de tus Unidades de Aprendizaje </h6>
                    <div class="section">
                        <div class="row center-align">
                        <a href="./alumnoSeleccionar.php" class="btn light-blue darken-1">SELECCIONAR UNIDADES DE APRENDIZAJE</a>
                    </div>
                     <div class="flow-text">
                        <p class="blue-text text-darken-4"> Lista de Unidades de Aprendizaje Seleccionadas. </p>
                    </div>
                    <div class="center-align col m12">
                        <table class="striped blue darken-1 centered responsive-table">
                            <thead>
                                <tr>
                                    <th>Clave</th>
                                    <th>Unidad de Aprendizaje</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include("./../fix/conexion.php");
                                    $materias = "SELECT m.clave, m.nombre, ma.recurse FROM materia AS m INNER JOIN matalumno AS ma ON m.clave = ma.claveMat WHERE ma.boletaAlum='$boleta'";
                                    $resMaterias = mysqli_query($conexion, $materias);
                                    while($ua=mysqli_fetch_assoc($resMaterias)){
                                        echo "<tr> <td> ".$ua["clave"]." </td> <td> ".$ua["nombre"]."</td> <td> ";
                                        if($ua['recurse']== 1){
                                            echo "RECURSE </td> <tr>";
                                        } else{
                                            echo "POR CURSAR  </td> <tr>";
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    
                    </div>
            </div>
                </div>
                <div id="editar" class="col s12">
                    <p>&nbsp;</p>
                    <div class="row">
                        <form id="formEditAlumno" autocomplete="off">
                        <div class="col s12 m4 input-field">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" name="nombre" value="<?php echo $infInfBoleta[2]; ?>" data-validetta="required">
                        </div>
                        <div class="col s12 m4 input-field">
                            <label for="primerApe">Primer apellido</label>
                            <input type="text" id="primerApe" name="primerApe" value="<?php echo $infInfBoleta[3]; ?>" data-validetta="required">
                        </div>
                        <div class="col s12 m4 input-field">
                            <label for="segundoApe">Segundo apellido</label>
                            <input type="text" id="segundoApe" name="segundoApe" value="<?php echo $infInfBoleta[4]; ?>" data-validetta="required">
                        </div>
                        <div class="col s12 m4 input-field">
                            <label for="curp">CURP</label>
                            <input type="text" id="curp" name="curp" value="<?php echo $infInfBoleta[1]; ?>" data-validetta="required,minLength[18],maxLength[18]">
                        </div>
                        <div class="col s12 m4 input-field">
                            <label for="correo">Correo</label>
                            <input type="text" id="correo" name="correo" value="<?php echo $infInfBoleta[5]; ?>" data-validetta="required,email">
                        </div>
                        <div class="col s12 m4 input-field">
                            <label for="tel">Telefóno</label>
                            <input type="text" id="tel" name="tel" value="<?php echo $infInfBoleta[7]; ?>" data-validetta="required,number,minLength[10]">
                        </div>
                        <div class="row right-align">
                            <input type="submit" class="btn blue accent-4" value="Guardar Cambios" >
                        </div>
                        </form>
                    </div>
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
                <div id="comprobante" class="col s12">
                    <div class="row center-align">
                        <div class="col s12 m12">
                            <h1>
                                <a href="./alumnoPDF.php"><i class="fab fa-adobe fa-2x blue-text accent-4"></i></a>
                            </h1>
                            <h5>PDF</h5>
                        </div>
                    </div>
                </div>
            </div>   
        </div>

    <div class="fixed-action-btn click-to-toggle">
        <a class="btn-floating btn-large blue darken-4">
            <i class="fas fa-ellipsis-h"></i>
        </a>
        <ul>
            <li><a href="./../fix/cerrarSesion.php?nombreSesion=boleta" class="btn-floating blue darken-4"><i class="fas fa-power-off"></i></a></li>
        </ul>
    </div>
    </main>
    <footer class="page-footer grey darken-3">
        <div class="row center-align">
            <div class="col s12 m12"></div>
                <?php
                    readfile("./../fix/footer.html");
                ?>
            </div>
        </div>
    </footer>
</body>
</html>
<?php
    }else{
        header("location:./../../index.php");
    }
?>