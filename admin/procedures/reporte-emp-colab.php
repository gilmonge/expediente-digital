
<?php
/** Inicializaciones */
@session_start();

$GLOBALS["cedula_empl"] = $_GET['cedula_empl'];

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
// Cabecera de página pdf
function Header()
{


    $this->Image('../../img/logo-reporte.png',10,10,-90,'PNG');
    $this->SetFont('Arial','B',10);
    // Movernos a la derecha
    $this->Cell(85);
    
    // Título
    $this->Cell(80,10,'Reporte por colaborador',1,0,'C');
    // Salto de línea
    $this->Ln(30);

  
    
}

// Pie de página pdf
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10, utf8_decode('Carnes Castillo - Página ').$this->PageNo().'',0,0,'C');
    //$this->Set
}

}

$select = "SELECT CONCAT(e.nombre, ' ',e.apellido) as nombre_persona, e.cedula  as cedulaempl, e.telefono, e.correo, g.nombre as grado, p.nombre as puesto, s.descripcion, su.nombre as sucursal, 
            m.detalle as inf_medica, TIMESTAMPDIFF(YEAR,e.fecha_contratacion,CURDATE()) AS annos_laborados, TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) AS edad, e.banco as banco, e.salario_actual as salario,
            e.fecha_contratacion as fec_contratacion
            FROM  tbl_empleado e
            Inner Join tbl_grado_academico g on e.id_grado_academico = g.id
            Inner Join tbl_puesto p on e.id_puesto = p.id
            Inner Join tbl_sexo s on e.id_sexo = s.id
            Inner Join tbl_sucursales su on e.id_sucursal = su.id
            left Join tbl_informacion_medica m on e.id = m.id_empleado
           WHERE e.cedula = '".$GLOBALS["cedula_empl"]."'";

$listado_items= $Quick_function->SQLDatos_SA($select);

if($listado_items->rowCount() > 0){

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',8);

while($row = $listado_items->fetch()){

    $pdf->SetFont('Arial','B',13);
    $pdf->Cell(60, 6,utf8_decode('Información del colaborador: '.($row["nombre_persona"])),0,0,'L');$pdf->Ln(3);
    $pdf->Cell(60,6,'___________________________________________',0,0,'L');$pdf->Ln(8);   

    $pdf->SetFont('Arial','B',9);
    $pdf->cell(30, 6, utf8_decode('Cédula: '.($row['cedulaempl'])),0,0,'L',0);$pdf->Ln(8);
    $pdf->cell(25, 6, utf8_decode('Teléfono: ' .($row['telefono'])),0,0,'L',0);$pdf->Ln(8);
    $pdf->cell(25, 6, utf8_decode('Correo: ' .($row['correo'])),0,0,'L',0);$pdf->Ln(8);
    $pdf->cell(25, 6, utf8_decode('Grado académico: ' .($row['grado'])),0,0,'L',0);$pdf->Ln(8);
    $pdf->cell(25, 6, utf8_decode('Puesto: ' .($row['puesto'])),0,0,'L',0);$pdf->Ln(8);
    $pdf->cell(25, 6, utf8_decode('Sexo: ' .($row['descripcion'])),0,0,'L',0);$pdf->Ln(8);
    $pdf->cell(25, 6, utf8_decode('Sucursal: ' .($row['sucursal'])),0,0,'L',0);$pdf->Ln(5);

    $pdf->SetFont('Arial','',7);
    $pdf->Cell(60,6,'___________________________________________',0,0,'L');$pdf->Ln(8);
    
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(60, 6,utf8_decode('Información medica '),0,0,'L');$pdf->Ln(3); 
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(60,6,'___________________________________________',0,0,'L');$pdf->Ln(8);
    $pdf->SetFont('Arial','',9);   
    $pdf->MultiCell(170,10, utf8_decode($row['inf_medica']),1,'L',FALSE);$pdf->Ln(8);

    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(60, 6,utf8_decode('Información adicional '),0,0,'L');$pdf->Ln(3); 
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(60,6,'___________________________________________',0,0,'L');$pdf->Ln(8);
    $pdf->cell(25, 6, utf8_decode('Fecha de contratación: ' .($row['fec_contratacion'])),0,0,'L',0);$pdf->Ln(8);
    $pdf->cell(25, 6, utf8_decode('Años laborados: ' .($row['annos_laborados'])),0,0,'L',0);$pdf->Ln(8);
    $pdf->cell(25, 6, utf8_decode('Edad del colaborador: ' .($row['edad'])),0,0,'L',0);$pdf->Ln(8);
    $pdf->cell(25, 6, utf8_decode('Entidad Bancaria: ' .($row['banco'])),0,0,'L',0);$pdf->Ln(8);
    $pdf->cell(25, 6, utf8_decode('Salario actual: ' .($row['salario'])),0,0,'L',0);$pdf->Ln(8);
    $pdf->SetFont('Arial','',7);
    $pdf->Cell(60,6,'___________________________________________',0,0,'L');$pdf->Ln(8);
    
   
}
$pdf->Output();
}
else{
    echo'<script type="text/javascript"> 
            alert("Colaborador no encontrado");
            window.location.href="../reportes.php";
         </script>';
}
?>



