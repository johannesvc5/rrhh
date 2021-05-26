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
personal.generoP, 
personal.fNacimiento, 
infadicional.servMilitar, 
infadicional.discapacidad, 
infpersonal.correo, 
infpersonal.telefono, 
infpersonal.estadoCivil, 
infpersonal.cantHijos
FROM
personal
INNER JOIN
infadicional
ON 
    personal.idpersonal = infadicional.idPersonal
INNER JOIN
infpersonal
ON 
    personal.idpersonal = infpersonal.idPersonal";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['Otros']))
{
    $q=$db->real_escape_string($_POST['Otros']);
    $query="SELECT
        personal.idpersonal, 
        personal.dniPersonal, 
        personal.nombreP, 
        personal.apellidosP, 
        personal.generoP, 
        personal.fNacimiento, 
        infadicional.servMilitar, 
        infadicional.discapacidad, 
        infpersonal.correo, 
        infpersonal.telefono, 
        infpersonal.estadoCivil, 
        infpersonal.cantHijos
    FROM
        personal
        INNER JOIN
        infadicional
        ON 
            personal.idpersonal = infadicional.idPersonal
        INNER JOIN
        infpersonal
        ON 
            personal.idpersonal = infpersonal.idPersonal
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
            <th class="text-center" style="color:#FFF">Sexo</th>
            <th class="text-center" style="color:#FFF">F.Nac.</th>
            <th class="text-center" style="color:#FFF">Correo</th>
            <th class="text-center" style="color:#FFF">Teléfono</th>
            <th class="text-center" style="color:#FFF">Est.Civil</th>
            <th class="text-center" style="color:#FFF">Hijos</th>
            <th class="text-center" style="color:#FFF">Ser.Militar</th>
            <th class="text-center" style="color:#FFF">Discap.</th>
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
                <td class="text-center">'.$fila['generoP'].'</td>
                <td class="text-center">'.$fila['fNacimiento'].'</td>
                <td class="text-center">'.$fila['correo'].'</td>
                <td class="text-center">'.$fila['telefono'].'</td>
                <td class="text-center">'.$fila['estadoCivil'].'</td>
                <td class="text-center">'.$fila['cantHijos'].'</td>
                <td class="text-center">'.$fila['servMilitar'].'</td>
                <td class="text-center">'.$fila['discapacidad'].'</td>
                
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
                                        
                                        <input type="hidden" class="form-control" id="id" name="id" value="">
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