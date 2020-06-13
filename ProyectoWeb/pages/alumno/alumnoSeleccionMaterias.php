<!DOCTYPE html>
<html>
 <head>
  <title>Selección de Unidades de Aprendizaje</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
 </head>
 <body>
 <header>
    <div align="center">
        <img src="./../../imgs/header.jpeg">
    </div>
</header>
  <div class="container" style="width:600px;" align="center">
  	<h1 align="center" color="blue">Instrucciones</h1>
  	<!-- &#160; ESOS CARACTERES SOLO SON PARA PONER ESPACIOS EN BLANCO EN EL HTML -->  
  	<h3>Este espacio tiene como objetivo recopilar las intenciones de inscripcion al semestre 2021-1(Ago-Dic 2020) <br>
		en el Programa Académico de Ing. en Sistemas Computacionales (2009).</h3>
	<h3>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
			• Seleccione un total de 1 a 7 unidades de aprendizaje, entre aquellas que inscribes por primera vez y/o como recursamiento</h3>
	<h3>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
		• Una vez registradas las unidades de aprendizaje no podrás realizar cambios</h3>
	<h3>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
		• ESTA ES SOLO UNA CONSULTA Y NO REPRESENTA UNA PREINSCRIPCION A LAS UNIDADES DE APRENDIZAJE SELECCIONADAS</h3>
   	<br /><br />
   	<!-- FORMULARIO PARA MATERIAS CURSE -->  
   	<form method="post" id="primeravez">
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
    	</div>
    </form>
		<!-- FORMULARIO RECURSE -->  
    <form method="post" id="materiarecurse">
    	<div class="form-group">
     		<select id="recurse" name="recurse[]" multiple class="form-control" >
   				<?php
                    include("./../fix/conexion.php");
                   	$consulta_mysql='select clave,nombre from materia order by clave asc';
                    $resultado_consulta_mysql=mysqli_query($conexion,$consulta_mysql);
                    while($lista=mysqli_fetch_assoc($resultado_consulta_mysql))
                        echo "<option  value='".$lista["clave"]."'>".$lista["nombre"]."</option>";//el nombre del option es la clave y muestra el nombre de la materia
                ?>
     		</select>
    	</div>
   </form>
   <div class="form-group" align="right">
    	<input type="submit" class="btn btn-info" name="submit" value="Aceptar" />
   	</div>
   <br />
  </div>
  <footer>
    <div align="center">
        <img src="./../../imgs/footer3.jpeg" align="center">
    </div>
  </footer> 
 </body>
</html>


<!-- SCRIPT CURSE -->  
<script>
$(document).ready(function(){
 $('#curse').multiselect({
  nonSelectedText: 'Primera vez',
 });
 $('#primeravez').on('submit', function(event){
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
    $('#curse').multiselect('refresh');
    alert(data);
   }
  });
 });
 
 
});
</script>


<!-- SCRIPT RECURSE -->  

<script>
$(document).ready(function(){
 $('#recurse').multiselect({
  nonSelectedText: 'Recurse',
 });
 $('#materiarecurse').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"insertarmaterias.php",
   method:"POST",
   data:form_data,
   success:function(data)
   {
    $('#recurse option:selected').each(function(){
     $(this).prop('selected', false);
    });
    $('#recurse').multiselect('refresh');
    alert(data);
   }
  });
 });
 
 
});
</script>
