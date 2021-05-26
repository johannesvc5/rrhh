<?php

include('../../conexion.php');

$file_name = $_FILES["imgPhoto"]["name"];
$file_type = $_FILES["imgPhoto"]["type"];
$file_size = $_FILES["imgPhoto"]["size"];
$file_tmp_name = $_FILES["imgPhoto"]["tmp_name"];
$file_error = $_FILES["imgPhoto"]["error"];

$file_ad = getimagesize($file_tmp_name);

$dniP = $_POST['dni'];
$idpersonal = $_POST['idPersonal'];

//Verifica tipo de fotografía
if($file_type == 'image/jpeg' OR $file_type == 'image/jpg' OR $file_type == 'image/png'){
    echo "Imagen acepatada"."<br>";
    //Verifica Tamaño de Fotografía
    if($file_size <= 100000){
        echo "el tamaño de la imagen es aceptada"."<br>";
        //Verifica Ancho y Alto de Fotografía
        if($file_ad[0] <= 378 AND $file_ad[1] <= 508){
            echo ":)";
            
            $destino = "../files/img/".$dniP.'_photo.jpeg';
            $name = $dniP.'_photo.jpeg';
            
            if (move_uploaded_file($file_tmp_name, $destino)) {
                //Insert data photo
                $queryPHOTO = "INSERT INTO fotografia(archivoF, idpersonal) VALUES ('$name', '$idpersonal')";
                if ($db->query($queryPHOTO)) {
                    header('Location: registro.php');
                }else{
                    echo'<script type="text/javascript"> alert("NO SE PUDO SUBIR EL ARCHIVO. INTENTE NUEVAMENTE :)"); window.location.href="registro.php";</script>';
                }
            }else{
                echo'<script type="text/javascript"> alert("NO SE PUDO SUBIR EL ARCHIVO. INTENTE NUEVAMENTE :)"); window.location.href="reporteador.php";</script>';
            }

        }else{
            echo "El archivo no tiene margenes de tamaño carnet";
        }
    }else{
        echo "Archivo demasiado grande";
    }
}else{
    echo "El archivo no es imagen";
}

?>
