<?php
    session_start();
    if(isset($_SESSION["boleta"])){
        include("./alumno_BD.php");
?>
<!DOCTYPE html>
<html>
 <head>
 <title>Seleccionar Unidades de Aprendizaje</title>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
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
                        <p class="red-text text-darken-4">• ESTA ES SOLO UNA CONSULTA Y NO REPRESENTA UNA PREINSCRIPCION A LAS UNIDADES DE APRENDIZAJE SELECCIONADAS.</p>
                        <p>• Una vez registradas las unidades de aprendizaje, puedes vizualizarlas es tu pantalla de inicio y/o descargar un comprobante.<br><br>
                </div> 
          <div class="center-align">
            <form method="post" id="formcurse">
              <div class="form-group">
                <select id="curse" name="curse[]" multiple class="form-control" >
                  <?php
                      include("./../fix/conexion.php");
                      $consulta_mysql='select clave,nombre from materia order by clave asc';
                      $resultado_consulta_mysql=mysqli_query($conexion,$consulta_mysql);
                      while($lista=mysqli_fetch_assoc($resultado_consulta_mysql))
                          echo "<option  value='".$lista["clave"]."'>".$lista["nombre"]."</option>";//el nombre del option es la clave y muestra el nombre de la materia
                  ?>
                </select>
                <br />    <br />
                <select  id="recurse" name="recurse[]" multiple class="form-control" >
                  <?php
                      include("./../fix/conexion.php");
                      $consulta_mysql='select clave,nombre from materia order by clave asc';
                      $resultado_consulta_mysql=mysqli_query($conexion,$consulta_mysql);
                      while($lista=mysqli_fetch_assoc($resultado_consulta_mysql))
                          echo "<option  value='".$lista["clave"]."'>".$lista["nombre"]."</option>";//el nombre del option es la clave y muestra el nombre de la materia
                  ?>
                </select>
               </div>
              <div class="form-group right-align">
              <input type="submit" class="btn blue accent-4" name="submit" value="Registrar Materias" />
            </form>
          </div>
              <div  class="left-align">
                  <a href="./alumno.php" class="btn light-blue darken-1">Cancelar</a>
              </div>
              <br />    <br />
  </div>
 </body>
</html>
<?php
    }else{
        header("location:./../../index.php");
    }
?>

<script>
  $(document).ready(function(){
  $('#curse').multiselect({
    nonSelectedText: 'Primera vez',
  });
    $('#recurse').multiselect({
    nonSelectedText: 'Recurse',
  });
  
  $('#formcurse').on('submit', function(event){
    event.preventDefault();
    var form_data = $(this).serialize();
    $.ajax({
    url:"insertarmaterias.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
      $('#curse option:selected').each(function(){
      $(this).prop('selected', false);
      });
      $('#recurse option:selected').each(function(){
      $(this).prop('selected', false);
      });
      $('#curse').multiselect('refresh');
      $('#recurse').multiselect('refresh');
      alert(data);
    }
    });
  });
  });
</script>