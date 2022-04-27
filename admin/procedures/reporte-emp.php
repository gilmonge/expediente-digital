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
    $this->Cell(80,10,'Reporte de funcionarios',1,0,'C');
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



$select = "SELECT CONCAT(e.nombre, ' ',e.apellido) as nombre_persona, e.cedula, e.telefono, e.correo, g.nombre as grado, p.nombre as puesto, s.descripcion, su.nombre as sucursal
           FROM  tbl_empleado e
           Inner Join tbl_grado_academico g on e.id_grado_academico = g.id
           Inner Join tbl_puesto p on e.id_puesto = p.id
           Inner Join tbl_sexo s on e.id_sexo = s.id
           Inner Join tbl_sucursales su on e.id_sucursal = su.id";

$listado_items= $Quick_function->SQLDatos_SA($select);

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',8);

while($row = $listado_items->fetch()){

    
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(60, 6,utf8_decode('Información del colaborador: '.($row["nombre_persona"])),0,0,'L');$pdf->Ln(3);
    $pdf->Cell(60,6,'___________________________________________',0,0,'L');$pdf->Ln(8); 

    $pdf->SetFont('Arial','B',9);
    $pdf->cell(25, 5, utf8_decode('Cédula'),1,0,'C',0);  
    $pdf->cell(20, 5, utf8_decode('Teléfono'),1,0,'C',0);
    $pdf->cell(35, 5, 'Correo',1,0,'C',0);
    $pdf->cell(35, 5, 'Grado',1,0,'C',0);
    $pdf->cell(25, 5, 'Puesto',1,0,'C',0);
    $pdf->cell(20, 5, 'Sexo',1,0,'C',0);
    $pdf->cell(25, 5, 'Sucursal',1,1,'C',0);

    $pdf->SetFont('Arial','',8);
    $pdf->cell(25, 10, utf8_decode($row['cedula']),1,0,'C',0);
    $pdf->cell(20, 10, utf8_decode($row['telefono']),1,0,'C',0);
    $pdf->cell(35, 10, utf8_decode($row['correo']),1,0,'C',0);
    $pdf->cell(35, 10, utf8_decode($row['grado']),1,0,'C',0);
    $pdf->cell(25, 10, utf8_decode($row['puesto']),1,0,'C',0);
    $pdf->cell(20, 10, utf8_decode($row['descripcion']),1,0,'C',0);
    $pdf->cell(25, 10, utf8_decode($row['sucursal']),1,1,'C',0);$pdf->Ln(8); 
}

$pdf->Output();

?>



