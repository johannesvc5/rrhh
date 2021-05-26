<?php

include('../../conexion.php');

#Datos Personal
$dni = $_POST['dni'];
$nombres = utf8_decode($_POST['nombres']);
$apellidos = utf8_decode($_POST['apellidos']);
$fnac = $_POST['fnac'];
$selectSexo = $_POST['selectSexo'];
#Información Personal
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$región = utf8_decode($_POST['región']);
$Provincia = utf8_decode($_POST['Provincia']);
$Distrito = utf8_decode($_POST['Distrito']);
$Dirección = utf8_decode($_POST['Dirección']);
$estadoCivil = $_POST['estadoCivil'];
$hijos = $_POST['hijos'];
#Información Académica
$grado = utf8_decode($_POST['grado']);
$Profesión = utf8_decode($_POST['Profesión']);
$codProf = $_POST['codProf'];
#Información Laboral
$Cargo = utf8_decode($_POST['Cargo']);
$dependencia = utf8_decode($_POST['dependencia']);
$condLab = $_POST['condLab'];
$fechaInicio = $_POST['fechaInicio'];

$discapacidad = $_POST['discapacidad'];
$militar = $_POST['militar'];

#Inserción de datos de Personal
$queryP = "INSERT INTO personal (dniPersonal, nombreP, apellidosP, fNacimiento, generoP) VALUES ('$dni', '$nombres', '$apellidos', '$fnac', '$selectSexo')";

if ($db->query($queryP)) {
	#ID generado por la inserción
	$id=mysqli_insert_id($db);
	$queryIP="INSERT INTO infpersonal (correo, telefono, departamentoRes, provinciaRes, distritoRes, domicilioRes, estadoCivil, cantHijos, idPersonal) 
	VALUES ('$email', '$telefono', '$región', '$Provincia', '$Distrito', '$Dirección', '$estadoCivil', '$hijos', '$id')";

	$queryIL="INSERT INTO inflaboral (cargo, fechaIng, idPersonal, idDependencia, idCondLaboral)
	VALUES ('$Cargo', '$fechaInicio', '$id', '$dependencia', '$condLab')";

	$queryIA="INSERT INTO infprofesional (profesion, gradoAcad, colegiatura, idPersonal)
	VALUES ('$Profesión', '$grado', '$codProf', '$id')";

	$queryIAD="INSERT INTO infadicional (servMilitar, discapacidad, idPersonal)
	VALUES ('$militar', '$discapacidad', '$id')";

	if ($db->query($queryIP) AND $db->query($queryIL) AND $db->query($queryIA) AND $db->query($queryIAD)) {
		header("Location: registro.php");	
	}else{
		echo'<script type="text/javascript">alert("Error al guardar los datos");window.location.href="registro.php";</script>';
	}
}else{
	echo'<script type="text/javascript">alert("Error al guardar los datos");window.location.href="registro.php";</script>';
}

?>