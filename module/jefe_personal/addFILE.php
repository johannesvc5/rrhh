<?php

$dni = $_POST['dni'];
$id = $_POST['idPersonal'];
$idLab = $_POST['idLab'];

$archivo = $_FILES['filePDF']['tmp_name'];
$destino = "../files/pdf/".$dni.'_'.$_FILES['filePDF']['name'];
$name = $dni.'_'.$_FILES['filePDF']['name'];

require_once '../../conexion.php';

if (move_uploaded_file($archivo, $destino)) {
	$queryFILE = "INSERT INTO documentp(archivo, idInfLaboral, idDependencia) VALUES ('$name', '$idLab', '$id')";
	if ($db->query($queryFILE)) {
		header('Location: registro.php');
	}else{
		echo'<script type="text/javascript"> alert("NO SE PUDO SUBIR EL ARCHIVO. INTENTE NUEVAMENTE :)"); window.location.href="registro.php";</script>';
	}
}else{
    echo'<script type="text/javascript"> alert("NO SE PUDO SUBIR EL ARCHIVO. INTENTE NUEVAMENTE :)"); window.location.href="registro.php";</script>';
}

?>
