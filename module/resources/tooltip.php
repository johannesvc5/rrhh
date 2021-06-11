<?php

include('../../../conexion.php');

$contendTooltip='';

$Distrito=['1'=> 'Chaupimarca', '2'=> 'Huachón','3'=> 'Huariaca','4'=> 'Huayllay','5'=> 'Ninacaca','6'=> 'Pallanchacra','7'=> 'Paucartambo','8'=> 'SFA. Yarusyacan','9'=> 'Simón Bolívar','10'=> 'Ticlacayan','11'=> 'Tinyahuarco','12'=> 'Vicco','13'=> 'Yanacancha', '14'=> 'Yanahuanca','15'=> 'Chacayan','16'=> 'Goyllarisquizga','17'=> 'Paucar','18'=> 'San Pedro de Pillao','19'=> 'Santa Ana de Tusi','20'=> 'Tapuc','21'=> 'Vilcabamba','22'=> 'Oxapampa','23'=> 'Chontabamba','24'=> 'Huancabamba','25'=> 'Palcazu','26'=> 'Pozuzo','27'=> 'Puerto Bermúdez','28'=> 'Villa Rica','29'=> 'Constitución'];
$temp='';
$tmpTotal=0;
for( $i=1; $i<30 ; $i++){
    
    $temp=strtoupper($Distrito[$i]);
    
    $query="SELECT
    infpersonal.departamentoRes, 
    infpersonal.provinciaRes, 
    infpersonal.distritoRes, 
    personal.dniPersonal,
    COUNT(*) AS totalDist
    FROM
    personal
    INNER JOIN
    infpersonal
    ON 
        personal.idpersonal = infpersonal.idPersonal
    WHERE
	    UPPER(infpersonal.distritoRes) LIKE '%".$temp."%'";

    $result=$db->query($query);
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            $tmpTotal=$tmpTotal+$row['totalDist'];
            $tmpCont=$row['totalDist'];
            $contendTooltip.='<div class="boxInfo" id="boxInfo'.$i.'">
                <div class="info">
                    <h3 class="titulo text-center text-uppercase">'.$Distrito[$i].'</h3>
                    <div class="row">
                        <p class="total text-center col-12">Colaboradores:</p>
                    </div>
                    <div class="row">
                        <p class="total3 text-success col-12 text-center">'.$tmpCont.'</p>
                    </div>
                    <p class="direccion text-right">Fuente: GORE Pasco</p>
                </div>
            </div>';
        }
    }
}



?>