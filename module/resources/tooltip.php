<?php

include('../../../conexion.php');

$contendTooltip='';

$Distrito=['1'=> 'Chaupimarca', '2'=> 'Huachón','3'=> 'Huariaca','4'=> 'Huayllay','5'=> 'Ninacaca','6'=> 'Pallanchacra','7'=> 'Paucartambo','8'=> 'SFA. Yarusyacan','9'=> 'Simón Bolívar','10'=> 'Ticlacayan','11'=> 'Tinyahuarco','12'=> 'Vicco','13'=> 'Yanacancha', '14'=> 'Yanahuanca','15'=> 'Chacayan','16'=> 'Goyllarisquizga','17'=> 'Paucar','18'=> 'San Pedro de Pillao','19'=> 'Santa Ana de Tusi','20'=> 'Tapuc','21'=> 'Vilcabamba','22'=> 'Oxapampa','23'=> 'Chontabamba','24'=> 'Huancabamba','25'=> 'Palcazu','26'=> 'Pozuzo','27'=> 'Puerto Bermúdez','28'=> 'Villa Rica','29'=> 'Constitución'];

    $contendTooltip.='<div class="boxInfo" id="boxInfo1">
        <div class="info">
            <h3 class="titulo text-center text-uppercase">Chaupimarca</h3>
            <div class="row">
                <p class="total text-primary col-9">Total:</p>
                <p class="total text-primary col-3 text-right">10</p>
            </div>
            <div class="row">
                <p class="total text-dark col-9">Educación:</p>
                <p class="total text-success col-3 text-right">10</p>
            </div>
            <div class="row">
                <p class="total text-dark col-9">Salud:</p>
                <p class="total text-success col-3  text-right">10</p>
            </div>
            <div class="row">
                <p class="total text-dark col-9">Transporte:</p>
                <p class="total text-success col-3  text-right">10</p>
            </div>
            <div class="row">
                <p class="total text-dark col-9">Agropecuario:</p>
                <p class="total text-success col-3  text-right">10</p>
            </div>
            <div class="row">
                <p class="total text-dark col-9">Saneamiento:</p>
                <p class="total text-success col-3  text-right">10</p>
            </div>
            <div class="row">
                <p class="total text-dark col-9">Otros:</p>
                <p class="total text-success col-3  text-right">10</p>
            </div>
            <p class="direccion text-right">Fuente: GORE Pasco</p>
        </div>
    </div>';


?>