<?php
session_start();

require_once '../../../conexion.php';
mysqli_set_charset( $db, 'utf8');

$select="SELECT idDependencia, dependencia FROM dependencia ORDER BY dependencia ASC";
$result=$db->query($select);
$option='';
if($result->num_rows > 0){
    while($fila = $result->fetch_assoc())
    {
        $option.='<option value="'.$fila['idDependencia'].'">'.utf8_encode($fila['dependencia']).'</option>';
    }
}

$select2="SELECT condlaboral.idCondLaboral, condlaboral.condLaboral FROM condlaboral";
$result2=$db->query($select2);
$optionII='';
if($result2->num_rows > 0){
    while($fila2 = $result2->fetch_assoc())
    {
        $optionII.='<option value="'.$fila2['idCondLaboral'].'">'.utf8_encode($fila2['condLaboral']).'</option>';
    }
}

$tabla="";
$query="SELECT
personal.idpersonal, 
personal.dniPersonal, 
personal.nombreP, 
personal.apellidosP, 
inflaboral.idInfLaboral, 
inflaboral.cargo, 
condlaboral.condLaboral, 
inflaboral.fechaIng, 
inflaboral.idDependencia, 
dependencia.dependencia, 
inflaboral.idCondLaboral
FROM
condlaboral
INNER JOIN
inflaboral
ON 
    condlaboral.idCondLaboral = inflaboral.idCondLaboral
INNER JOIN
personal
ON 
    inflaboral.idPersonal = personal.idpersonal
INNER JOIN
dependencia
ON 
    inflaboral.idDependencia = dependencia.idDependencia";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['Lab']))
{
    $q=$db->real_escape_string($_POST['Lab']);
    $query="SELECT
	personal.idpersonal, 
	personal.dniPersonal, 
	personal.nombreP, 
	personal.apellidosP, 
	inflaboral.idInfLaboral, 
	inflaboral.cargo, 
	condlaboral.condLaboral, 
	inflaboral.fechaIng, 
	inflaboral.idDependencia, 
	dependencia.dependencia, 
	inflaboral.idCondLaboral
FROM
	condlaboral
	INNER JOIN
	inflaboral
	ON 
		condlaboral.idCondLaboral = inflaboral.idCondLaboral
	INNER JOIN
	personal
	ON 
		inflaboral.idPersonal = personal.idpersonal
	INNER JOIN
	dependencia
	ON 
		inflaboral.idDependencia = dependencia.idDependencia
    WHERE
    personal.dniPersonal LIKE '%".$q."%' OR personal.nombreP LIKE '%".$q."%' OR personal.apellidosP LIKE '%".$q."%'";
}

$buscar=$db->query($query);
if ($buscar->num_rows > 0)
{
    $tabla.= 
    '<table class="table table-striped table-bordered table-hover table-sm" style="margin-top: 10px; font-size:11px; max-Width:99%;">
        <thead class="bg-primary">
            <th class="text-center" style="color:#FFF">ID</th>
            <th class="text-center" style="color:#FFF">DNI</th>
            <th class="text-center" style="color:#FFF">Nombres</th>
            <th class="text-center" style="color:#FFF">Apellidos</th>
            <th class="text-center" style="color:#FFF">Cargo</th>
            <th class="text-center" style="color:#FFF">Cond.Lab.</th>
            <th class="text-center" style="color:#FFF">Ingreso</th>
            <th class="text-center" style="color:#FFF">Dependencia</th>
            <th class="text-center" style="color:#FFF">Editar</th>
        </thead>
        <tbody>';
        while($fila = $buscar->fetch_assoc())
        {            
            $tabla.=
            '<tr>
                <td class="text-center">'.$fila['idpersonal'].'</td>
                <td class="text-center">'.$fila['dniPersonal'].'</td>
                <td class="text-center">'.$fila['nombreP'].'</td>
                <td class="text-center">'.$fila['apellidosP'].'</td>
                <td class="text-center">'.$fila['cargo'].'</td>
                <td class="text-center">'.$fila['condLaboral'].'</td>
                <td class="text-center">'.$fila['fechaIng'].'</td>
                <td class="text-center">'.utf8_encode($fila['dependencia']).'</td>
                
                <td class="text-center"><button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#editLab'.$fila['idpersonal'].'"><img class="svg3" alt="Editar" src="../../img/icon/user-edit.svg"></button></td>

            </tr>';

            echo '<!-- Modal -->
            <div class="modal fade" id="editLab'.$fila['idpersonal'].'" tabindex="-1" role="dialog" aria-labelledby="editLab" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Editar Datos de Personal: '.strtoupper($fila['nombreP']).' '.strtoupper($fila['apellidosP']).'</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form action="editDataLab.php" method="post">
                                <!--Editar Datos de Resolución-->
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="cargo"><strong>Cargo:</strong></label>
                                            <input type="text" class="form-control" name="cargo" value="'.$fila['cargo'].'">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="Condición Laboral"><strong>Condición Laboral:</strong></label>
                                            <select class="custom-select mr-sm-2 form-select" id="condLab" name="condLab" onchange="myFunction(value);">
                                                <option value="'.$fila['idCondLaboral'].'">'.$fila['condLaboral'].'</option>
                                                '.$optionII.'
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="Dependencia"><strong>Dependencia:</strong></label>
                                            <select class="custom-select mr-sm-2 form-select" id="dependencia" name="dependencia" onchange="myFunction(value);">
                                                <option value="'.$fila['idDependencia'].'">'.$fila['dependencia'].'</option>
                                                '.$option.'
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="FechaIni"><strong>Fecha Inicio:</strong></label>
                                            <input type="date" class="form-control" name="fechaInicio" value="'.$fila['fechaIng'].'">
                                        </div>
                                        <input type="hidden" class="form-control" id="id" name="id" value="'.$fila['idInfLaboral'].'">
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-sm-2">Editar</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin Modal-->';
        }

    $tabla.='</tbody></table>';
} else
    {
        $tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
    }


echo $tabla;
?>