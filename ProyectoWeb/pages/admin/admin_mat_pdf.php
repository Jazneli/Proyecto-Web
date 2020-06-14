<?php
    session_start();
    if(isset($_SESSION["admin"])){
        include("./../fix/conexion.php");
        require("./../fix/fpdf182/fpdf.php");
        setlocale(LC_ALL, "es_MX");

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
                // Position at 1.5 cm from bottom
                $this->SetY(-15);
                // Arial italic 8
                $this->SetFont('Arial','I',8);
                // Page number
                $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
            }
        }

        $clave = $_GET["clave"];

        $sqlMateria = "SELECT * FROM materia WHERE clave='$clave';";
        $resMateria = mysqli_query($conexion,$sqlMateria);
        $infMateria = mysqli_fetch_row($resMateria);

        $sqlAlumnos = "SELECT a.boleta, a.nombre, a.primerApe, a.segundoApe, a.correo FROM alumno a INNER JOIN matalumno ma ON a.boleta = ma.boletaAlum WHERE ma.claveMat='$clave'";
        $resAlumnos = mysqli_query($conexion, $sqlAlumnos);
        $txtIntroduccion = "Este reporte contiene la lista de alumnos que tienen intencion de cursar la unidad de aprendizaje el siguiente semestre.";
        

        $pdf = new PDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',15);
        $pdf->Ln(10);
        $pdf->Cell(0,7,utf8_decode("LISTA DE ALUMNOS QUE TIENEN INTENCIONES DE INSCRIPCIÓN"),0,1,"C");
        $pdf->SetFont('Arial','',12);
        $pdf->Ln(10);
        $pdf->Cell(0,7,utf8_decode("Unidad de aprendizaje: $infMateria[1]"),0,1,"C");
        $pdf->Cell(0,7,"Clave: $infMateria[0]",0,1,"C");
        $pdf->Ln(10);
        $pdf->MultiCell(0,5,utf8_decode("$txtIntroduccion"),0,1);
        $pdf->Ln(10);
        $pdf->Cell(13);
        $pdf->SetFillColor(11,97,189);
        $pdf->Cell(25,6,'Boleta',1,0,'C',1);
        $pdf->Cell(100,6,'Nombre',1,0,'C',1);
        $pdf->Cell(40,6,'Correo',1,1,'C',1);
        $pdf->SetFont('Arial','',10);
        while ($row = mysqli_fetch_array($resAlumnos,MYSQLI_BOTH)){
            $pdf->Cell(13);
            $pdf->Cell(25,6,$row[0],1,0,'C');
            $pdf->Cell(100,6,utf8_decode("$row[1] $row[2] $row[3]"),1,0,'C');
            $pdf->Cell(40,6,$row[4],1,1,'C');
        }
        $pdf->Output();
    }else{
        header("location:./inicio.php");
    }
?>