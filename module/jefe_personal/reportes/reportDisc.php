<?php

$discap = $_POST['discap'];

include '../../resources/plantilla.php';
require '../../../conexion.php';
mysqli_set_charset( $db, 'utf8');

$select = "SELECT
personal.dniPersonal, 
personal.nombreP, 
personal.apellidosP, 
personal.generoP, 
personal.fNacimiento, 
infpersonal.correo, 
infpersonal.telefono, 
inflaboral.cargo, 
infadicional.discapacidad
FROM
personal
INNER JOIN
infpersonal
ON 
    personal.idpersonal = infpersonal.idPersonal
INNER JOIN
inflaboral
ON 
    personal.idpersonal = inflaboral.idPersonal
INNER JOIN
infadicional
ON 
    personal.idpersonal = infadicional.idPersonal
WHERE
    infadicional.discapacidad = '$discap'";

$resultado = $db->query($select);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);

$pdf->Cell(190,15, '',0,0,'C');
		
$pdf->SetXY(10, 25);
$pdf->SetFillColor(0,153,204);
$pdf->SetFont('Arial','B',7);
$pdf->Cell(195,6,'Reporte de Servicio Militar',1,1,'C',1,'0');
$pdf->Cell(12,6,'DNI',1,0,'C',1,'0');
$pdf->Cell(44,6,'Apellidos y Nombres.',1,0,'C',1,'0');
$pdf->Cell(8,6,'Sexo',1,0,'C',1,'0');
$pdf->Cell(20,6,'F.Nacim.',1,0,'C',1,'0');
$pdf->Cell(30,6,'Correo',1,0,'C',1,'0');
$pdf->Cell(20,6,'Celular',1,0,'C',1,'0');
$pdf->Cell(49,6,'Cargo',1,0,'C',1,'0');
$pdf->Cell(12,6,'Discap.',1,1,'C',1,'0');

$pdf->SetFont('Arial','',6);
		
while($row = $resultado->fetch_assoc())
{
	$pdf->Cell(12,6,utf8_decode(strtoupper($row['dniPersonal'])),1,0,'C');
	$pdf->Cell(44,6,utf8_decode($row['apellidosP'] .', '. $row['nombreP']),1,0,'C');
	$pdf->Cell(8,6,utf8_decode(strtoupper(substr($row['generoP'],0,30))),1,0,'C');
    $pdf->Cell(20,6,utf8_decode($row['fNacimiento']),1,0,'C');
    $pdf->Cell(30,6,utf8_decode(strtoupper(substr($row['correo'],0,30))),1,0,'C');
    $pdf->Cell(20,6,utf8_decode(strtoupper(substr($row['telefono'],0,30))),1,0,'C');
    $pdf->Cell(49,6,utf8_decode(strtoupper(substr($row['cargo'],0,30))),1,0,'C');
	$pdf->Cell(12,6,utf8_decode(strtoupper(substr($row['discapacidad'],0,80))),1,1,'C');		
}
$pdf->Output();
?>