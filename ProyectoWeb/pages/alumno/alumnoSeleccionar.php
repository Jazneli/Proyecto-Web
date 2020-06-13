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
<title>Seleccionar Unidades de Aprendizaje</title>
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
<script>
 $(document).ready(function(){
    $('select').formSelect();
  });
</script>
</head>
<body>
    <?php
        readfile("./../fix/header.html");
    ?>
    <main class="valign-wrapper">
        <div class="container">
            <div class="row">
            <?php echo $inf; ?>
                <div class="col s12">
                    <div class="flow-text">
                        <p class="blue-text text-darken-4 center-align">Selección de Unidades de Aprendizaje</p>
                        <p class="blue-text text-darken-4"> Instrucciones:</p>
                    </div>
                        <p>• Este espacio tiene como objetivo recopilar las intenciones de inscripcion al semestre 2021-1(Ago-Dic 2020)
		                en el Programa Académico de Ing. en Sistemas Computacionales (2009).</p>
                        <p>• Seleccione un total de 1 a 7 unidades de aprendizaje, entre aquellas que inscribes por primera vez y/o como recursamiento.</p>
                        <p>• Una vez registradas las unidades de aprendizaje no podrás realizar cambios.</p>
                        <p class="red-text text-darken-4">• ESTA ES SOLO UNA CONSULTA Y NO REPRESENTA UNA PREINSCRIPCION A LAS UNIDADES DE APRENDIZAJE SELECCIONADAS.</p> <br><br>
                </div> 
                <form id="formSeleccionarPrimera" autocomplete="off">
                    <div class="input-field col s12">
                        <select multiple="true" id="curse"name="curse[]" multiple class="form-control">
                            <?php
                            include("./../fix/conexion.php");
                            $consulta_mysql='select clave,nombre from materia order by clave asc';
                            $resultado_consulta_mysql=mysqli_query($conexion,$consulta_mysql);
                            while($lista=mysqli_fetch_assoc($resultado_consulta_mysql))
                                echo "<option  value='".$lista["clave"]."'>".$lista["nombre"]."</option>";//el nombre del option es la clave y muestra el nombre de la materia
                            ?>
                        </select>
                        <label>Curse 1era vez</label>
                    </div>
                </form>
                <form id="formSeleccionarRecurse" autocomplete="off">
                    <div class="input-field col s12">
                        <select multiple="true" id="recurse">
                            <?php
                                include("./../fix/conexion.php");
                                $consulta_mysql='select clave,nombre from materia order by clave asc';
                                $resultado_consulta_mysql=mysqli_query($conexion,$consulta_mysql);
                                while($lista=mysqli_fetch_assoc($resultado_consulta_mysql))
                                    echo "<option  value='".$lista["clave"]."'>".$lista["nombre"]."</option>";//el nombre del option es la clave y muestra el nombre de la materia
                            ?>
                        </select>
                        <label>Recurse</label>
                    </div>   
                    <div class="row right-align">
                        <input type="submit" class="btn blue accent-4" value="Registrar">
                    </div>
                </form>
                <div class="section">
                    <div class="row left-align">
                        <a href="./alumno.php" class="btn light-blue darken-1">Cancelar</a>
                    </div>
                </div>
            </div>
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
