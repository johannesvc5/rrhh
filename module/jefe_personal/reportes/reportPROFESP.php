<?php

$grado = $_POST['grado'];
$profesion = strtoupper($_POST['profesion']);

include '../../resources/plantilla.php';
require '../../../conexion.php';
mysqli_set_charset( $db, 'utf8');

$select = "SELECT
personal.dniPersonal, 
personal.nombreP, 
personal.apellidosP, 
personal.generoP, 
inflaboral.cargo, 
dependencia.dependencia, 
infprofesional.profesion, 
infprofesional.gradoAcad, 
infprofesional.colegiatura, 
infpersonal.telefono
FROM
personal
INNER JOIN
inflaboral
ON 
    personal.idpersonal = inflaboral.idPersonal
INNER JOIN
dependencia
ON 
    inflaboral.idDependencia = dependencia.idDependencia
INNER JOIN
infprofesional
ON 
    personal.idpersonal = infprofesional.idPersonal
INNER JOIN
infpersonal
ON 
    personal.idpersonal = infpersonal.idPersonal
WHERE
    infprofesional.gradoAcad = '$grado' AND UPPER(infprofesional.profesion) LIKE '%".$profesion."%' ";

$resultado = $db->query($select);

$pdf = new PDF7();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',9);

$pdf->Cell(190,15, '',0,0,'C');
		
$pdf->SetXY(10, 25);
$pdf->SetFillColor(0,153,204);
$pdf->SetFont('Arial','B',6);
$pdf->Cell(195,6,utf8_decode('Reporte de según Grado Académico'),1,1,'C',1,'0');
$pdf->Cell(10,6,'DNI',1,0,'C',1,'0');
$pdf->Cell(35,6,'Apellidos y Nombres.',1,0,'C',1,'0');
$pdf->Cell(6,6,utf8_decode('Sexo'),1,0,'C',1,'0');
$pdf->Cell(33,6,utf8_decode('Cargo'),1,0,'C',1,'0');
$pdf->Cell(33,6,utf8_decode('Dependencia'),1,0,'C',1,'0');
$pdf->Cell(33,6,utf8_decode('Profesión'),1,0,'C',1,'0');
$pdf->Cell(33,6,utf8_decode('Grado Académico'),1,0,'C',1,'0');
$pdf->Cell(12,6,'Coleg.',1,1,'C',1,'0');

$pdf->SetFont('Arial','',5);
		
while($row = $resultado->fetch_assoc())
{
	$pdf->Cell(10,6,utf8_decode(strtoupper($row['dniPersonal'])),1,0,'C');
	$pdf->Cell(35,6,utf8_decode($row['apellidosP'] .', '. $row['nombreP']),1,0,'C');
	$pdf->Cell(6,6,utf8_decode(strtoupper(substr($row['generoP'],0,30))),1,0,'C');
    $pdf->Cell(33,6,utf8_decode(strtoupper(substr($row['cargo'],0,30))),1,0,'C');
    $pdf->Cell(33,6,utf8_decode(strtoupper(substr($row['dependencia'],0,30))),1,0,'C');
    $pdf->Cell(33,6,utf8_decode(strtoupper(substr($row['profesion'],0,30))),1,0,'C');
    $pdf->Cell(33,6,utf8_decode(strtoupper(substr($row['gradoAcad'],0,30))),1,0,'C');
	$pdf->Cell(12,6,utf8_decode(strtoupper(substr($row['colegiatura'],0,80))),1,1,'C');		
}
$pdf->Output();
?>