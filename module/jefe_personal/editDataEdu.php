<?php

include ('../../conexion.php');

$grado = utf8_decode($_POST['grado']);
$profesion = utf8_decode($_POST['profesion']);
$codProf = $_POST['codProf'];
$id = $_POST['id'];

$query = "UPDATE infprofesional 
SET gradoAcad = '$grado',
profesion = '$profesion', 
colegiatura = '$codProf'
WHERE idInfProfesionaL = '$id'";

if($db->query($query)){
	header('Location: registro.php');
}else{
	echo'<script type="text/javascript"> alert("No se pudo registrar los datos. Por favor intente nuevamente."); window.location.href="registro.php";</script>';
}

?>