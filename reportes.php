<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
   // $this->Image("bibliotecaheader.jpg",0,0, 210, 55);//
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(50);
    // Título
    $this->Cell(100,10,'Reporte de Libros',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    
    
    $this->SetFillColor(22,22,22);
    $this->SetFont('Arial','B',10);
    $this->Cell(90,10,'Nombre del libro',1,0,'C');
    $this->Cell(45,10,'Autor',1,0,'C');
    $this->Cell(45,10,utf8_decode('Año'),1,1,'C');
    
    
    
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

$consulta = "SELECT * FROM libros";
$resultado=$conexion->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();


$pdf->SetDrawColor(25,25,12);


    

while($data= $resultado->fetch_assoc()){
    
   
    $pdf->Cell(90,10, utf8_decode($data['nombre_libro']),1,0,'C',0);
     $pdf->Cell(45,10, utf8_decode($data[utf8_decode('autor')]),1,0,'C',0);
     $pdf->Cell(45,10, $data['ano'],1,1,'C',0);
}

$pdf->Output();

?>