<?php
    require_once 'pages/fix/conexion.php';

    if(!empty($_POST)){
      if (empty($_POST['boleta']) || empty($_POST['contrasena'])) { //verificamos que no esten vacios los campos 
     echo "<h1>ingrese sus datos </h1> <br>"; //cambiar por un alert
      }else{ //en caso de que no esten vacios 
        //Datos obtenidos por POST
        $bol = $_POST['boleta'];
        $contra = $_POST['contrasena'];

        //Consulta en la base de datos
        $q="SELECT * FROM alumno WHERE boleta='$bol' AND contrasena='$contra'";
        $query = mysqli_query($conexion,$q);
        $result =mysqli_num_rows($query); //numero de filas
        $datos =mysqli_fetch_array($query);//arreglo con los datos que se obtienen de la consulta 

        if ($result==0) { //comparando si no encuetra filas puedes comparar con los datos de la sig manera $datos["boleta"]==$bol
               echo "<h1>error result datos incorrectos $q filas encontradas: $result $datos</h1> <br>"; //cambiar por un alert
        }
        else{
          $_SESSION['active']=true;
          //podemos tener sesiones con los datos de cada campo de la BD
          $_SESSION['boleta']=$data['boleta'];
          $_SESSION['contrasena']=$data['contrasena'];
         header("location: ./pages/alumno/alumno.php");
         session_destroy();
     }
   }
  }
?>