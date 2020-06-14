<?php 
include("./../fix/conexion.php");
session_start();
if(isset($_SESSION["boleta"])){
include("./alumno_BD.php");
$boleta=$_SESSION["boleta"];
$consulta = "SELECT count(*) AS total FROM matalumno where boletaAlum='".$boleta."'"; 
$result = mysqli_query($conexion,$consulta); 
$values = mysqli_fetch_assoc($result); 
$num_rows = $values['total']; 
$count=0;//contador para ver el numero de materias que selecciona

if($num_rows==0){//este if es para ver si ya tiene algo la BD si ya tiene algo es porque lleno el formulario y no te deja llenarlo de nuevo
    if(isset($_POST)){//comprobamos que la variable $_POST este inicializada ya que podrían no haberse enviado datos
        
        if(isset($_POST["curse"])){//jala los datos del select curse
            foreach($_POST["curse"] as $valorSelectMultiplecurse){//los asigna a una variable, hace la inserccion y aumenta el contador
                $arr[$count] = $valorSelectMultiplecurse;//asigna la clave a un arreglo en la posicion de count
                $query="INSERT INTO matalumno VALUES('".$boleta."','".$valorSelectMultiplecurse."','0')";
 			    mysqli_query($conexion,$query);
 			    $count=$count+1;
            } 
        }
        
        if(isset($_POST["recurse"])){//jala los datos del select recurse
            foreach($_POST["recurse"] as $valorSelectMultiplerecurse){//los asigna a una variable y aumenta el contador
                $arr[$count] = $valorSelectMultiplerecurse;//asigna la clave a un arreglo en la posicion de count
                $query="INSERT INTO matalumno VALUES('".$boleta."','".$valorSelectMultiplerecurse."','1')";
 			    mysqli_query($conexion, $query);
 			    $count=$count+1;
            }
        }
      
        if ($count>0 && $count<=7){//si el contador es entre 1 y 7 inserta los datos
                $longoriginal=count($arr);//esta variable es para ver de que longitud fue el arreglo donde se guardan las claves tanto de curse y recurse
                $longitudunicos=count(array_unique($arr));//array_unique devuelve un arreglo sin datos repetidos 
                if ($longoriginal>$longitudunicos) {//si la longitud del arreglo original es mayor a la que devolvio el array_unique es porque habia repetidos
                $query="delete from matalumno where boletaAlum='".$boleta."' ";//borraconsultas
                mysqli_query($conexion, $query);
                echo "NO SELECCIONES LAS MISMAS UNIDADES DE APRENDIZAJE EN PRIMERA VEZ Y RECURSE";
         } 
            else{echo "DATOS INSERTADOS CORRECTAMENTE";}
        }
        if($count>7){
	        $query="delete from matalumno where boletaAlum='".$boleta."'";
 			mysqli_query($conexion, $query);
 			echo "NO PUEDES SELECCIONAR MÁS DE 7 UNIDADES DE APRENDIZAJE";
        }  

        if ($count==0) {
            echo "NO HA SELECCIONADO NINGUNA UNIDAD DE APRENDIZAJE";
        }  
        
    }
        else{
            echo "NO SE HAN PODIDO GUARDAR LOS DATOS";
        }
}else{echo "YA SELECCIONASTE TUS UNIDADES DE APRENDIZAJE ANTERIORMENTE";}

}
?>