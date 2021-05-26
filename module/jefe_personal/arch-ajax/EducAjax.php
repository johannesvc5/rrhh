<?php
session_start();

require_once '../../../conexion.php';
mysqli_set_charset( $db, 'utf8');

$tabla="";
$query="SELECT
personal.idpersonal, 
personal.dniPersonal, 
personal.nombreP, 
personal.apellidosP, 
infpersonal.correo, 
infpersonal.telefono,
infprofesional.idInfProfesionaL, 
infprofesional.profesion, 
infprofesional.gradoAcad, 
infprofesional.colegiatura, 
infprofesional.idInfProfesionaL
FROM
personal
INNER JOIN
infpersonal
ON 
    personal.idpersonal = infpersonal.idPersonal
INNER JOIN
infprofesional
ON 
    personal.idpersonal = infprofesional.idPersonal";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['Educ']))
{
    $q=$db->real_escape_string($_POST['Educ']);
    $query="SELECT
	personal.idpersonal, 
	personal.dniPersonal, 
	personal.nombreP, 
	personal.apellidosP, 
	infpersonal.correo, 
	infpersonal.telefono,
    infprofesional.idInfProfesionaL,  
	infprofesional.profesion, 
	infprofesional.gradoAcad, 
	infprofesional.colegiatura, 
	infprofesional.idInfProfesionaL
    FROM
        personal
        INNER JOIN
        infpersonal
        ON 
            personal.idpersonal = infpersonal.idPersonal
        INNER JOIN
        infprofesional
        ON 
            personal.idpersonal = infprofesional.idPersonal
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
            <th class="text-center" style="color:#FFF">Correo</th>
            <th class="text-center" style="color:#FFF">Teléfono</th>
            <th class="text-center" style="color:#FFF">Profesión</th>
            <th class="text-center" style="color:#FFF">Grad.Acad.</th>
            <th class="text-center" style="color:#FFF">Colegiatura</th>
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
                <td class="text-center">'.$fila['correo'].'</td>
                <td class="text-center">'.$fila['telefono'].'</td>
                <td class="text-center">'.$fila['profesion'].'</td>
                <td class="text-center">'.$fila['gradoAcad'].'</td>
                <td class="text-center">'.$fila['colegiatura'].'</td>
                
                <td class="text-center"><button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#editEduc'.$fila['idpersonal'].'"><img class="svg3" alt="Editar" src="../../img/icon/user-edit.svg"></button></td>

            </tr>';

            echo '<!-- Modal -->
            <div class="modal fade" id="editEduc'.$fila['idpersonal'].'" tabindex="-1" role="dialog" aria-labelledby="editEduc" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Editar Datos de Personal: '.strtoupper($fila['nombreP']).' '.strtoupper($fila['apellidosP']).'</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form action="editDataEdu.php" method="post">
                                <!--Editar Datos de Resolución-->
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="grado"><strong>Grado Académico:</strong></label>
                                            <select class="custom-select mr-sm-2 form-select" id="grado" name="grado" onchange="myFunction(value);">
                                            <option value="'.$fila['gradoAcad'].'">'.$fila['gradoAcad'].'</option>
                                            <option value="secundaria">Secundaria</option>
                                            <option value="superior técnico">Superior Técnico</option>
                                            <option value="universitario">Superior Universitario</option>
                                            <option value="maestria">Maestría</option>
                                            <option value="doctorado">Doctorado</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12" id="prof">
                                            <label for="Profesión"><strong>Carrera Profesional:</strong></label>
                                            <input type="text" class="form-control" name="profesion" value="'.$fila['profesion'].'">
                                        </div>
                                        <div class="form-group col-md-12" id="codP">
                                            <label for="codProf" class="text-dark"><strong>Código Profesional:</strong></label>
                                            <input type="numeric" class="form-control" id="codProf" name="codProf" value="'.$fila['colegiatura'].'">
                                        </div>
                                        <input type="hidden" class="form-control" id="id" name="id" value="'.$fila['idInfProfesionaL'].'">
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