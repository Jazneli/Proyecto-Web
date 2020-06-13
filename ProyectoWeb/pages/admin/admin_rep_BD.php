<?php
    $sqlClaves = "SELECT claveMat, COUNT(claveMat) AS repetidos FROM matalumno GROUP BY claveMat";
    $resClaves = mysqli_query($conexion,$sqlClaves);
    $arrayClaves = [];
    $numClaves = [];
    while($filas = mysqli_fetch_array($resClaves,MYSQLI_BOTH)){
        array_push($arrayClaves,$filas[0]);
        array_push($numClaves,$filas[1]);
    }

    $filasMaterias = "";
    $sqlMat = "SELECT * FROM materia ORDER BY clave";
    $resMat = mysqli_query($conexion, $sqlMat);
    while($filas = mysqli_fetch_array($resMat,MYSQLI_BOTH)){
        $filasMaterias .= "<tr>
            <td>$filas[0]</td><td>$filas[1]</td>
        </tr>";
    }
?>