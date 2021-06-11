<?php

include('../../../conexion.php');

//Regimen Laboral
$queryRL="SELECT
personal.idpersonal, 
inflaboral.idInfLaboral, 
condlaboral.condLaboral,
COUNT(*) AS totalCL
FROM
personal
INNER JOIN
inflaboral
ON 
	personal.idpersonal = inflaboral.idPersonal
INNER JOIN
condlaboral
ON 
	inflaboral.idCondLaboral = condlaboral.idCondLaboral
GROUP BY
	condlaboral.condLaboral";

$resultRL=$db->query($queryRL);

$cadRL=[];
$numRL=[];

if ($resultRL->num_rows > 0) {
	while ($rowRL = $resultRL->fetch_assoc()) {
        $cadRL[]=$rowRL['condLaboral'];
		$numRL[]=$rowRL['totalCL'];
    }
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


//Sexo
$querySEXO="SELECT
personal.generoP,
COUNT(*) AS totalSexo
FROM
personal
GROUP BY
personal.generoP";

$resultSexo=$db->query($querySEXO);
$cadSEXO=[];
$numSEXO=[];

if($resultSexo->num_rows>0){
	while($rowSEXO=$resultSexo->fetch_assoc()){
		$cadSEXO[]=$rowSEXO['generoP'];
		$numSEXO[]=$rowSEXO['totalSexo'];
	}
}

//Etapa de vida
$queryEV="SELECT
personal.fNacimiento
FROM
personal";

$resultEV=$db->query($queryEV);
$joven=0;
$adulto=0;
$aMayor=0;

if($resultEV->num_rows>0){
	while($rowEV=$resultEV->fetch_assoc()){
		$fecha_nacimiento = new DateTime($rowEV['fNacimiento']);
        $hoy = new DateTime();
        $edad = $hoy->diff($fecha_nacimiento);
        if($edad->y > 18 AND $edad->y < 27){
			$joven=$joven+1;
		}elseif($edad->y > 27 AND $edad->y < 59){
			$adulto=$adulto+1;
		}elseif($edad->y > 60){
			$aMayor=$aMayor+1;
		}
	}
}

//Semaforo

?>