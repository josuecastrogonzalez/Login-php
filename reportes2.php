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
    $this->Cell(100,105,'Reporte de Personas',10,0,'C');
    // Salto de línea
    $this->Ln(60);
    
    
    
    $this->SetFont('Arial','B',10);
    $this->SetTextColor(0,0,0);
    $this->SetFillColor(236,227,36);
    $this->Cell(45,10,'Nombre',1,0,'C',true);
    $this->Cell(45,10,'Apellido',1,0,'C',true);
    $this->Cell(45,10,'Cedula',1,0,'C',true);
    $this->Cell(45,10,'Libro Devuelto',1,1,'C',true);
   
    
    
    
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

$consulta = "SELECT nombre, apellido,cedula,libro_prestado,entregado FROM personas ";
$resultado=$conexion->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

  

while($data= $resultado->fetch_assoc()){
    
   
    $pdf->Cell(45,10, utf8_decode($data['nombre']),1,0,'C',0);
     $pdf->Cell(45,10, utf8_decode($data[utf8_decode('apellido')]),1,0,'C',0);
     $pdf->Cell(45,10, $data['cedula'],1,0,'C',0);
    $pdf->Cell(45,10, utf8_decode($data[utf8_decode('entregado')]),1,1,'C',0);
}
$pdf->Cell(90);

$pdf->Cell(10,50,'PD: Reporte de las personas que han alquilado libros, puede imprimir facilmente y tenerlo por si pasa algun inconveniente',0,1,'C');




$pdf->Output();

?>