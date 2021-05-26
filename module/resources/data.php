<?php

include('../../conexion.php');

//Regimen Laboral
$queryRL="SELECT
personal.dniPersonal,
personal.nombreP,
inflaboral.condLaboral
FROM
personal
INNER JOIN inflaboral ON inflaboral.idPersonal = personal.idpersonal";

$resultRL=$db->query($queryRL);

$casRL=0;
$sieteRL=0;
$dosRL=0;

if ($resultRL->num_rows > 0) {
	while ($rowRL = $resultRL->fetch_assoc()) {
        if ($rowRL['condLaboral'] == 'CAS - DL. 1057') {
        	$casRL=$casRL+1;
        }elseif ($rowRL['condLaboral'] == 'DL. 276') {
        	$dosRL=$dosRL+1;
        }elseif ($rowRL['condLaboral'] == 'DL. 728') {
        	$sieteRL=$sieteRL+1;
        }
    }
}else{
	$casRL=0;
	$sieteRL=0;
	$dosRL=0;
}

//Nivel Educativo
$queryGA="SELECT
personal.dniPersonal,
personal.nombreP,
personal.apellidosP,
infprofesional.gradoAcad,
COUNT(*) AS TOTAL
FROM
personal
INNER JOIN infprofesional ON infprofesional.idPersonal = personal.idpersonal
GROUP BY gradoAcad";

$resultGA=$db->query($queryGA);
$contGA=$resultGA->num_rows;
$cadGA=[];
$numGA=[];

if ($resultGA->num_rows > 0) {
	while ($rowGA = $resultGA->fetch_assoc()) {
		$cadGA[]=$rowGA['gradoAcad'];
		$numGA[]=$rowGA['TOTAL'];
	}
}

//Discapacitado
$queryDISCAP="SELECT
personal.idpersonal,
infadicional.discapacidad,
discap.discapEsp,
COUNT(*) AS espDISC
FROM
personal
INNER JOIN infadicional ON infadicional.idPersonal = personal.idpersonal 
INNER JOIN discap ON discap.idInfAdicional = infadicional.idInfAdicional
GROUP BY discapEsp";

$resultDISCAP=$db->query($queryDISCAP);
$contDISCAP=$resultDISCAP->num_rows;
$cadDISCAP=[];
$numDISCAP=[];

if ($resultGA->num_rows > 0) {
	while ($rowDISCAP = $resultDISCAP->fetch_assoc()) {
		$cadDISCAP[]=$rowDISCAP['discapacidad'];
		$numDISCAP[]=$rowDISCAP['espDISC'];
	}
}

//Servicio Militar
$queryMIL="SELECT
personal.idpersonal,
Count(*) AS espMIL,
infadicional.servMilitar
FROM
personal
INNER JOIN infadicional ON infadicional.idPersonal = personal.idpersonal
GROUP BY servMilitar";

$resultMIL=$db->query($queryMIL);
$contMIL=$resultMIL->num_rows;
$cadMIL=[];
$numMIL=[];

if ($resultMIL->num_rows > 0) {
	while ($rowMIL = $resultMIL->fetch_assoc()) {
		$cadDISCAP[]=$rowMIL['servMilitar'];
		$numDISCAP[]=$rowMIL['espMIL'];
	}
}

?>