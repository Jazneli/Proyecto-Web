<?php
    $sqlClaves = "SELECT claveMat, COUNT(claveMat) AS repetidos FROM matalumno GROUP BY claveMat";
    $resClaves = mysqli_query($conexion,$sqlClaves);
    $arrayClaves = [];
    $numClaves = [];
    while($filas = mysqli_fetch_array($resClaves,MYSQLI_BOTH)){
        array_push($arrayClaves,$filas[0]);
        array_push($numClaves,$filas[1]);
    }

    // Ahora solo muestra materias que tienen intenciones
    $filasMaterias = "";
    $sqlMat = "SELECT m.clave, m.nombre FROM materia m INNER JOIN matalumno ma ON m.clave=ma.claveMat;";
    $resMat = mysqli_query($conexion, $sqlMat);
    while($filas = mysqli_fetch_array($resMat,MYSQLI_BOTH)){
        $filasMaterias .= "<tr>
            <td>$filas[0]</td><td>$filas[1]</td>
            <td>
                <a class='btn-floating white pulse'><i class='material-icons purple-text text-darken-3 pdfMat' data-pdf='$filas[0]'>picture_as_pdf</i></a>&nbsp;
            </td>
        </tr>";
    }
?>