<?php
require_once('pdf-report/fpdf.php');
require_once('conexio.php');
//la fecha y hora del peru
date_default_timezone_set("America/Lima");

class PDF extends FPDF

{
// Cabecera de página
function Header()
{
    //RECTANGULO grande
    $this->SetFillColor(45, 87, 156);
    $this->Rect(0,0,210,40,'FD');
     
    
    //LINEA diagonal
     $this->SetDrawColor(255,255,255);
     $this->SetLineWidth(5);
     $this->Line(190,0,210,20);
     
     // Logo
     $this->Image('imagen/logounasam.png',40,5,120,30);
     //linea fecha
     $this->SetFillColor(40, 87, 156);
     $this->Rect(0,55,210,1,'F');
     
     // Arial bold 15
     
     $this->SetFont('Arial','B',13);
     //color de letra
     $this->SetTextColor(0,0,0);
     // Movernos a la derecha
     //$this->Cell(80);
     // Título
 
    $this->Cell(120,80,utf8_decode('Reporte de tendecia de estudiantes '),0,0,'C');
    //$this->Image('imagen/img.png',60,58,7);
 
     //fecha
     $this->SetTextColor(0,0,0);
     $this->SetFont('Arial','B',13);
     $this->Cell(0,80,date("Y-m-d"),0,0,'C');
     // Salto de línea
     $this->Ln(60);
     //TABLA
     $this->SetFont('Arial','B',11);
     $this->SetTextColor(255,150,0);
     //color de fila
    $this->SetFillColor(77, 82,82, 255);
    //color de la lineas
     //$this->SetDrawColor(115,25,52);
    
    $this->Cell(100,10,'Grupo',0,0,'C',1);
    $this->Cell(30,10,'Cantidad',0,1,'C',1);


    //para la linea
    $this->SetDrawColor(44, 189, 176);
    $this->SetLineWidth(1);
    $this->Line(10,82,140,82);
    $this->Ln(5);
}

// Pie de página
function Footer()
{
   //RECTANGULO
   $this->SetFillColor(45, 87, 156);
   $this->Rect(0,280,220,2,'F');

   // Posición: a 1,5 cm del final
   $this->SetY(-15);
   // Arial italic 8
   $this->SetFont('Arial','I',8);
   // Número de página
   $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new PDF();
$pdf->AliasNbPages();//pie de pagina
$pdf->AddPage();
$pdf->setTitle('Reporte de Tendencia por grupos');
$pdf->SetFont('Arial','',10);
//color de fila

$pdf->SetDrawColor(255,255,255);
$pdf->SetLineWidth(0.2);
$cont=1;

      $conexion = BDConexion::crearInstancia();
      $sql = $conexion -> query("SELECT gu.nombre grupo, count(*) tendencia
      from alumno a
       inner join persona p on p.id=a.Persona_id
      inner join escuela e on e.id=a.Escuela_id
      inner join facultad f on f.id=e.Facultad_id
      inner join alumno_x_grupo ag on ag.Alumno_id=a.id
      inner join grupo_universitario gu on gu.id=ag.grupo_universitario_id
      inner join tipo_grupo tg on tg.id=gu.Tipo_Grupo_id
      group by gu.id order by tendencia desc;");

      foreach($sql->fetchAll() as $grupo){
            //cambio de color
        
            if ($cont==1) {
                $pdf->SetFillColor(181,232,227,255);
                $cont=0;
            }else{
                 $pdf->SetFillColor(255,255,255);
                 $cont=1;
            }
            //cargado de datos
            
            $pdf->Cell(100,10,($grupo['grupo']),1,0,'C',1);
        
            
            $pdf->Cell(30,10,($grupo['tendencia']),1,1,'C',1);
            
      }
$pdf->Output();
?>