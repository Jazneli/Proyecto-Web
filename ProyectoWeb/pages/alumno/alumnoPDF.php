<?php
    session_start();
    //Clase de FPDF
    include("./../fix/fpdf182/fpdf.php");
    include("./../fix/conexion.php");

    setlocale(LC_ALL, "es_MX");

    //Plantilla
    class PDF extends FPDF{
        //Cabecera del reporte
       function Header()
       {
           //Logotipo
           $this->Image('./../../imgs/header.jpeg',5,8,200);
           //Salto de línea
           $this->Ln(20);
       }
       //Pie de Página
       function Footer()
       {
           //Termina la pág 1,5 cm hacia arriba
           $this->SetY(-15);
           //Formato del mensaje
           $this->SetFont('Arial','I',10);
           // Número de página
           $this->Cell(0,10,utf8_decode("Proyecto Web, ".strftime("%A %d de %B de %Y")),0,0,'C');
       }
    }

    //Consulta a la base de datos sobre la información del alumno
    $boleta = $_SESSION["boleta"];
    $sqlAlumno = "SELECT * FROM alumno WHERE boleta = '$boleta'";
    $resAlumno = mysqli_query($conexion, $sqlAlumno);
    $infAlumno = mysqli_fetch_row($resAlumno);

    //Consulta de la lista de materias
    $materias = " SELECT m.clave, m.nombre, ma.recurse FROM materia AS m INNER JOIN matalumno AS ma ON m.clave = ma.claveMat WHERE ma.boletaAlum='$boleta'";
    $resMaterias = mysqli_query($conexion, $materias);
   // $infMaterias = mysqli_fetch_row($resMaterias);
    
    $txtIntroduccion = "Este reporte contiene la información de las materias que se tiene intención de inscribir el siguiente semestre.";

    //Crear objeto
    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',15);
    $pdf->Ln(10);
    $pdf->Cell(0,7,utf8_decode("LISTA DE MATERIAS SELECCIONADAS"),0,1,"C");
    $pdf->SetFont('Arial','',12);
    $pdf->Ln(10);
    $pdf->Cell(0,7,"Boleta: $infAlumno[0]",0,1,"C");
    $pdf->Cell(0,7,utf8_decode("Nombre: $infAlumno[3] $infAlumno[4] $infAlumno[2]"),0,1,"C");
    $pdf->Ln(10);
    $pdf->MultiCell(0,5,utf8_decode("$txtIntroduccion"),0,1);
    $pdf->Ln(10);
    $pdf->Cell(13);
    $pdf->SetFillColor(11,97,189);
    $pdf->Cell(25,6,'ID Materia',1,0,'C',1);
    $pdf->Cell(100,6,'Nombre Unidad de Aprendizaje',1,0,'C',1);
    $pdf->Cell(40,6,'Estado',1,1,'C',1);
    $pdf->SetFont('Arial','',10);
    while ($row = $resMaterias->fetch_assoc()){
        $pdf->Cell(13);
        $pdf->Cell(25,6,$row['clave'],1,0,'C');
        $pdf->Cell(100,6,utf8_decode($row['nombre']),1,0,'C');
        if($row['recurse'] == 1){
            $pdf->Cell(40,6,'Recurse',1,1,'C');
        } else{
            $pdf->Cell(40,6,'Por Cursar',1,1,'C');
        }
    }

    $pdf->Output();
?>