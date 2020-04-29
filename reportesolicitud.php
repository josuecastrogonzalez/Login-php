<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
   $this->Image("bibliotecaheader.jpg",0,0, 210, 55);
    // Arial bold 15
    $this->SetFont('Arial','B',20);
    // Movernos a la derecha
    $this->Cell(50);
    // Título
    $this->Cell(100,105,'Reporte de Solicitudes',10,0,'C');
    // Salto de línea
    $this->Ln(60);
    
    
    
    $this->SetFont('Arial','B',10);
    $this->SetTextColor(0,0,0);
    $this->SetFillColor(236,227,36);
    $this->Cell(35,10,'Nombre',1,0,'C',true);
    $this->Cell(35,10,'Apellido',1,0,'C',true);
    $this->Cell(35,10,'Cedula',1,0,'C',true);
    $this->Cell(60,10,'Nombre del libro',1,0,'C',true);
    $this->Cell(25,10,'Estatus',1,1,'C',true);
   
    
    
    
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}
require 'data1.php';

$consulta = "SELECT u.name,u.cedula,l.id_libro,l.nombre_libro,solicitud.id_solicitud,solicitud.id_estudiante,solicitud.fecha_recibe,solicitud.fecha_entrega,solicitud.estatus_solicitud,solicitud.fecha_solicitud,solicitud.id_libro FROM solicitud INNER JOIN users u ON solicitud.id_estudiante=u.id INNER JOIN libros l ON solicitud.id_libro=l.id_libro";
$resultado=$conexion->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

  

while($data= $resultado->fetch_assoc()){
    
   
    $pdf->Cell(35,10, utf8_decode($data['name']),1,0,'C',0);
     $pdf->Cell(35,10, utf8_decode($data[utf8_decode('cedula')]),1,0,'C',0);
     $pdf->Cell(35,10, $data['cedula'],1,0,'C',0);
    $pdf->Cell(60,10, utf8_decode($data[utf8_decode('nombre_libro')]),1,0,'C',0);
    $pdf->Cell(25,10, utf8_decode($data[utf8_decode('estatus_solicitud')]),1,1,'C',0);
}
$pdf->Cell(80);

$pdf->Cell(10,50,'PD:Estas son todas las solicitudes, puede imprimir este reporte por si se presenta un inconveniente',0,1,'C');




$pdf->Output();

?>