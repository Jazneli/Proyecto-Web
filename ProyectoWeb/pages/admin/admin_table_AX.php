<?php
    include("./../fix/conexion.php");

    $filasAlumnos = "";
    $sqlAlumnos = "SELECT * FROM alumno ORDER BY nombre";
    $resAlumnos = mysqli_query($conexion, $sqlAlumnos);
    while($filas = mysqli_fetch_array($resAlumnos,MYSQLI_BOTH)){
        $filasAlumnos .= "<tr>
            <td>$filas[0]</td><td>$filas[1]</td><td>$filas[2] $filas[3]</td>
            <td>
                <a class='btn-floating white pulse'><i class='material-icons green-text text-darken-3 verAlmn' data-ver='$filas[0]'>remove_red_eye</i></a>&nbsp;
                <a class='btn-floating white pulse'><i class='material-icons teal-text text-accent-4 editarAlmn' data-editar='$filas[0]'>edit</i></a>&nbsp;
                <a class='btn-floating white pulse'><i class='material-icons purple-text text-darken-3 pdfAlmn' data-pdf='$filas[0]'>picture_as_pdf</i></a>&nbsp;
                <a class='btn-floating white pulse'><i class='material-icons pink-text text-darken-3 correoAlmn' data-correo='$filas[0]'>email</i></a>&nbsp;
                <a class='btn-floating white pulse'><i class='material-icons red-text text-accent-4 eliminarAlmn' data-eliminar='$filas[0]'>clear</i></a>&nbsp;
            </td>
        </tr>";
    }
?>