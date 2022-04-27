<?php

/** Inicializaciones */
@session_start();
include_once('../../core/variables_globales.php');
include_once('../../core/quick_function.php');
include_once('../../assets/reports/fpdf.php');
$Quick_function = new Quick_function;
/** Inicializaciones */

/** Verifica si esta logueado */
$eslogueado=$Quick_function->es_logueado();
if($eslogueado!=true){ header('Location: ../'); }
/** Verifica si esta logueado */


class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    

    $this->Image('../../img/logo-reporte.png',10,10,-90,'PNG');
    $this->SetFont('Arial','B',10);
    // Movernos a la derecha
    $this->Cell(85);
    
    // Título
    $this->Cell(80,10,'Reporte de cursos',1,0,'C');
    // Salto de línea
    $this->Ln(30);

}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10, utf8_decode('Página ').$this->PageNo().'',0,0,'C');
    //$this->Set
}
}



$select = "SELECT e.nombre, e.apellido, e.cedula, p.nombre as puesto, cu.nombre as curso, ce.detalle as detalle
           FROM  tbl_empleado e
           Inner Join tbl_puesto p on e.id_puesto = p.id
           Inner Join tbl_cursos_empleado ce on e.id = ce.id_empleado
           Inner Join tbl_cursos cu on ce.id_curso = cu.id";

$listado_items= $Quick_function->SQLDatos_SA($select);

$pdf = new PDF();
$pdf->AddPage();


while($row = $listado_items->fetch()){
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(60,6,utf8_decode('información del colaborador'),0,0,'L');$pdf->Ln(7);

    $pdf->SetFont('Arial','B',9);
    $pdf->cell(30, 7, 'Nombre',1,0,'C',0);
    $pdf->cell(30, 7, 'Apellidos',1,0,'C',0);
    $pdf->cell(30, 7, utf8_decode('Cédula'),1,0,'C',0);  
    $pdf->cell(30, 7, 'Puesto',1,0,'C',0);
    $pdf->cell(60, 7, 'Curso',1,1,'C',0);

    $pdf->SetFont('Arial','',8);
    $pdf->cell(30, 10, utf8_decode($row["nombre"]) ,1,0,'C',0);
    $pdf->cell(30, 10, utf8_decode($row['apellido']),1,0,'C',0);
    $pdf->cell(30, 10, utf8_decode($row['cedula']),1,0,'C',0);
    $pdf->cell(30, 10, utf8_decode($row['puesto']),1,0,'C',0);
    $pdf->cell(60, 10, utf8_decode($row['curso']),1,0,'C',0);$pdf->Ln(12);
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(60,6,'Detalles importantes',0,0,'L');$pdf->Ln(7);
    $pdf->SetFont('Arial','',8);
    $pdf->MultiCell(140,10, utf8_decode($row['detalle']),1,'L',FALSE);$pdf->Ln(2);
    $pdf->Ln(2);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(60,6,'__________________________________________________________________________________________________________________',0,0,'L');
    $pdf->Ln(10);
    

}

$pdf->Output();

?>



