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

        $boleta = $_GET["boleta"];
        $sqlAlumno = "SELECT * FROM alumno WHERE boleta = '$boleta'";
        $resAlumno = mysqli_query($conexion, $sqlAlumno);
        $infAlumno = mysqli_fetch_row($resAlumno);
        $materias = " SELECT m.clave, m.nombre, ma.recurse FROM materia AS m INNER JOIN matalumno AS ma ON m.clave = ma.claveMat WHERE ma.boletaAlum='$boleta'";
        $resMaterias = mysqli_query($conexion, $materias);
        $txtIntroduccion = "Este reporte contiene la información de las unidades de aprendizaje que se tiene intención de inscribir el siguiente semestre.";


        $pdf = new PDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',15);
        $pdf->Ln(10);
        $pdf->Cell(0,7,utf8_decode("LISTA DE UNIDADES DE APRENDIZAJE SELECCIONADAS"),0,1,"C");
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
                $pdf->Cell(40,6,'RECURSE',1,1,'C');
            } else{
                $pdf->Cell(40,6,'POR CURSAR',1,1,'C');
            }
        }

        $pdf->Output();
    }else{
        header("location:./inicio.php");
    }
?>