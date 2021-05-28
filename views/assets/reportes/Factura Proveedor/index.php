<?php
require_once('rounded_rect2.php');

class ROUDED extends PDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('logo.jpg',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',20);
    // Movernos a la derecha
    $this->Cell(80);
    // Título 
    $this->Cell(30,25,'FACTURA DE PROVEEDORES',0,0,'C');
    // Salto de línea
    $this->Ln(25);
    /*Rectangulo naranja con ezquinas
    superior izquierda y derecha redondeadas*/
    $this->SetFillColor(235, 152, 78); 
    $this->RoundedRect(10, 35,190,10, 3, '12', 'DF');

    $this->SetFont('Arial','B',12);
    $this->SetFillColor(235, 152, 78); 
    $this->RoundedRect(10, 35,190,10, 3, '12', 'DF');
     
    $this->SetXY(10,100);
    $this->cell(60,15,utf8_decode("ITEM"),1,0,'C','F');

    $this->SetXY(70.3,100);
    $this->cell(35,15,utf8_decode("Categoria"),1,0,'C','F');
   

    $this->SetXY(105.3,100);
    $this->cell(25,15,utf8_decode("Cantidad"),1,0,'C','F');

    $this->SetXY(130.3,100);
    $this->cell(20,15,utf8_decode("Medida"),1,0,'C','F');

    $this->SetXY(150.3,100);
    $this->cell(50,15,utf8_decode("Total Categoria"),1,0,'C','F');
    $this->Ln(20);


}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    $this->SetFillColor(330, 152, 78);  
    $this->RoundedRect(10,260,190,10, 3, '34', 'DF');
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new ROUDED();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
//CUADRO: "INFORMACIÓN ORDEN DE MANTENIMIENTO"
$pdf->setFillColor(255);
$pdf->RoundedRect(10,50,190,14,1,'1234','DF');
$pdf->SetY(50);
$pdf->Cell(190,14,utf8_decode('INFORMACIÓN DEL PROVEEDOR'),0,0,'C');
//----------------------------------------------------------------------------
//INFORMACIÓN ORDEN DE MANTENIMIENTO
$pdf->Rect(10,70,190,25,'F');
$pdf->SetXY(20,75);
$pdf->cell(20,5,utf8_decode("Nombre Proveedor:"),0,0);

$pdf->SetXY(80,75);
$pdf->cell(20,5,utf8_decode("Nit:"),0,0);

$pdf->SetXY(140,75);
$pdf->cell(20,5,utf8_decode("Telefono:"),0,0);

$pdf->SetXY(20,90);
$pdf->cell(20,5,utf8_decode("Correo Electronico:"),0,0);

$pdf->SetXY(80,90);
$pdf->cell(20,5,utf8_decode("Dirección:"),0,0);
//-----------------------------------------------------------------------------

//HEADERS--------------------------------
$pdf->SetFillColor(235, 152, 78); 

//columna
$pdf->RoundedRect(10,120,60,120,'1','1');
//encabezado
$pdf->RoundedRect(10,100,60,15,'1','1','F');
//posición de la celda en XY
$pdf->SetXY(10,100);
$pdf->cell(60,15,utf8_decode("ITEM"),1,0,'C');


$pdf->RoundedRect(70.3,120,35,120,'0','0');
$pdf->RoundedRect(70.3,100,35,15,'1','1','F');
$pdf->SetXY(70.3,100);
$pdf->cell(35,15,utf8_decode("Categoria"),1,0,'C');

$pdf->RoundedRect(105.3,120,25,120,'0','0');
$pdf->RoundedRect(105.3,100,25,15,'1','1','F');
$pdf->SetXY(105.3,100);
$pdf->cell(25,15,utf8_decode("Cantidad"),1,0,'C');

$pdf->RoundedRect(130.3,120,20,120,'0','1');
$pdf->RoundedRect(130.3,100,20,15,'0','1','F');
$pdf->SetXY(130.3,100);
$pdf->cell(20,15,utf8_decode("Medida"),1,0,'C');

$pdf->RoundedRect(150.3,120,50,120,'1','2');
$pdf->RoundedRect(150.3,100,50,15,'1','2','F');
$pdf->SetXY(150.3,100);
$pdf->cell(50,15,utf8_decode("Total Categoria"),1,0,'C');
//---------------------------------------------

//BODY---------------------------------------------
//CUADRO PRINCIPAL(El mas grande del documento)
//$pdf->RoundedRect(10,120,190,120,'1','1234');
//$pdf->SetXY(10,240);


//TOTAL---------------- 
//$pdf->SetXY(45.3,240);

//LINEA ----------------------------------------------
$pdf->SetXY(30,274);
$pdf->cell(155,.3,"",1,0,'C');
//----------------------------------------------------

$pdf->SetXY(10,120);
//ITERACIÓN DE LA BASE DE DATOS
for($i=1;$i<=100;$i++){
  
    $valor = $i;
 
   
    $pdf->setFillColor(214, 219, 223);
    $pdf->cell(60,15,"ITEM",0,0,'C','F');
    $pdf->setFillColor(240, 178, 122);
    $pdf->cell(35,15,"ITEM",0,0,'C','F');
    $pdf->setFillColor(214, 219, 223);
    $pdf->cell(25,15,"ITEM",0,0,'C','F');
    $pdf->setFillColor(240, 178, 122);
    $pdf->cell(20,15,"ITEM",0,0,'C','F');
    $pdf->setFillColor(214, 219, 223);
    $pdf->cell(50,15,"ITEM",0,1,'C','F');
   
    $pdf->setFillColor(240, 178, 122);
    if($i == 8){
    $pdf->Ln(300);
    }
    if($i==100){
        $pdf->cell(35,15,utf8_decode("Total"),1,0,'C',"F");
        $pdf->cell(70,15,"",1,0,'C');
    }

}


$pdf->Output();
?>