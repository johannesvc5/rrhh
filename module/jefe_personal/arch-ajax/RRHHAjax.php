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
infpersonal.correo, 
infpersonal.telefono, 
inflaboral.idInfLaboral, 
inflaboral.cargo, 
inflaboral.idDependencia, 
condlaboral.idCondLaboral, 
condlaboral.condLaboral
FROM
personal
INNER JOIN
infpersonal
ON 
    personal.idpersonal = infpersonal.idPersonal
INNER JOIN
inflaboral
ON 
    personal.idpersonal = inflaboral.idPersonal
INNER JOIN
condlaboral
ON 
    inflaboral.idCondLaboral = condlaboral.idCondLaboral";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['RRHH']))
{
    $q=$db->real_escape_string($_POST['RRHH']);
    $query="SELECT
	personal.idpersonal, 
	personal.dniPersonal, 
	personal.nombreP, 
	personal.apellidosP, 
	personal.generoP, 
	personal.fNacimiento, 
	infpersonal.correo, 
	infpersonal.telefono, 
	inflaboral.idInfLaboral, 
	inflaboral.cargo, 
	inflaboral.idDependencia, 
	condlaboral.idCondLaboral, 
	condlaboral.condLaboral
    FROM
        personal
        INNER JOIN
        infpersonal
        ON 
            personal.idpersonal = infpersonal.idPersonal
        INNER JOIN
        inflaboral
        ON 
            personal.idpersonal = inflaboral.idPersonal
        INNER JOIN
        condlaboral
        ON 
            inflaboral.idCondLaboral = condlaboral.idCondLaboral
    WHERE
        personal.dniPersonal LIKE '%".$q."%' OR personal.nombreP LIKE '%".$q."%' OR personal.apellidosP LIKE '%".$q."%'";
}

$buscar=$db->query($query);
if ($buscar->num_rows > 0)
{
    $tabla.= 
    '<table class="table table-striped table-bordered table-hover table-sm" style="margin-top: 10px; font-size:11px; max-width:100%;">
        <thead class="bg-primary">
            <th class="text-center" style="color:#FFF">ID</th>
            <th class="text-center" style="color:#FFF">DNI</th>
            <th class="text-center" style="color:#FFF">Nombres</th>
            <th class="text-center" style="color:#FFF">Apellidos</th>
            <th class="text-center" style="color:#FFF">Sexo</th>
            <th class="text-center" style="color:#FFF">F.Nac.</th>
            <th class="text-center" style="color:#FFF">Mail</th>
            <th class="text-center" style="color:#FFF">Tel.</th>
            <th class="text-center" style="color:#FFF">Cargo</th>
            <th class="text-center" style="color:#FFF">Cond.Lab.</th>
            <th class="text-center" style="color:#FFF">Editar</th>
            <th class="text-center" style="color:#FFF">Fotografía</th>
            <th class="text-center" style="color:#FFF">Contrato</th>
        </thead>
        <tbody>';
        while($fila = $buscar->fetch_assoc())
        {            
            $photo='';
            $queryPHOTO="SELECT
                personal.dniPersonal, 
                fotografia.archivoF, 
                fotografia.idPersonal
            FROM
                personal
                INNER JOIN
                fotografia
                ON 
                    personal.idpersonal = fotografia.idPersonal
                WHERE
                    fotografia.idPersonal = '$fila[idpersonal]'";
            $buscarPHOTO=$db->query($queryPHOTO);
            if ($buscarPHOTO->num_rows > 0){
                $photo.='<td class="text-center"><button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target=""><img class="svg3" alt="Photo" src="../../img/icon/image-solid.svg"></button></td>';
            }else{
                $photo.='<td class="text-center"><button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#addIMG'.$fila['idpersonal'].'"><img class="svg3" alt="Photo" src="../../img/icon/image-solid.svg"></button></td>';
            }
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
                <td class="text-center">'.$fila['cargo'].'</td>
                <td class="text-center">'.$fila['condLaboral'].'</td>
                
                <td class="text-center"><button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#editRRHH'.$fila['idpersonal'].'"><img class="svg3" alt="Editar" src="../../img/icon/user-edit.svg"></button></td>
                '.$photo.'
                <td class="text-center"><button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addCont'.$fila['idpersonal'].'"><img class="svg3" alt="File" src="../../img/icon/file-pdf.svg"></button></td>
            </tr>';
            //Option sex
            $sex='';
            if($fila['generoP']=='M'){
                $sex.='<option value="M">Masculino</option>
                <option value="F">Femenino</option>';
            }else{
                $sex.='<option value="F">Femenino</option>
                <option value="M">Masculino</option>';
            }
            echo '<!-- Modal -->
            <div class="modal fade" id="editRRHH'.$fila['idpersonal'].'" tabindex="-1" role="dialog" aria-labelledby="editRRHH" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Editar Datos de Personal: '.strtoupper($fila['apellidosP']).', '.strtoupper($fila['nombreP']).' </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form action="editData.php" method="post">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="dni" class="text-dark"><strong>DNI:</strong></label>
                                            <input type="numeric" class="form-control" id="dni" name="dni" value="'.$fila['dniPersonal'].' " maxlength="8">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nombres"><strong>Nombres:</strong></label>
                                            <input type="text" class="form-control" name="nombres" value="'.$fila['nombreP'].'">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="apellidos"><strong>Apellidos:</strong></label>
                                            <input type="text" class="form-control" name="apellidos" value="'.$fila['apellidosP'].'">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="fnacimiento"><strong>Fecha de Nacimiento:</strong></label>
                                            <input type="date" class="form-control" name="fnac" value="'.$fila['fNacimiento'].'">
                                        </div>
                                        <div class="form-group col-md-6 text-center">
                                            <label for="entidad1"><strong>Sexo:</strong></label>
                                            <select class="custom-select mr-sm-2 form-select" id="selectSexo" name="selectSexo">
                                                '.$sex.'
                                            </select>
                                        </div>
                                                                                
                                        <input type="hidden" class="form-control" id="idPersonal" name="idPersonal" value="'.$fila['idpersonal'].'">
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

            echo '<!-- Modal -->
            <div class="modal fade" id="addIMG'.$fila['idpersonal'].'" tabindex="-1" role="dialog" aria-labelledby="addIMG" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Añadir Fotografía de Personal: '.strtoupper($fila['apellidosP']).', '.strtoupper($fila['nombreP']).' </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form name="enviar_archivo_frm" action="addIMG.php" method="post" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-12" id="img">
                                            <input type="file" class="custom-file-input" id="imgPhoto" name="imgPhoto" aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" for="img">Buscar Fotografía</label>
                                        </div>                                       
                                        <input type="hidden" class="form-control" id="idPersonal" name="idPersonal" value="'.$fila['idpersonal'].'">
                                        <input type="hidden" class="form-control" id="dni" name="dni" value="'.$fila['dniPersonal'].'">
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-sm-2">Añadir</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Fin Modal-->';

            echo '<!-- Modal -->
            <div class="modal fade" id="addCont'.$fila['idpersonal'].'" tabindex="-1" role="dialog" aria-labelledby="addCont" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Añadir Fotografía de Personal: '.strtoupper($fila['apellidosP']).', '.strtoupper($fila['nombreP']).' </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form name="enviar_archivo_frm" action="addFILE.php" method="post" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-12" id="img">
                                            <input type="file" class="custom-file-input" id="filePDF" name="filePDF" aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" for="img">Buscar Archivo de Contrato</label>
                                        </div>                                       
                                        <input type="hidden" class="form-control" id="idPersonal" name="idPersonal" value="'.$fila['idDependencia'].'">
                                        <input type="hidden" class="form-control" id="dni" name="dni" value="'.$fila['dniPersonal'].'">
                                        <input type="hidden" class="form-control" id="idLab" name="idLab" value="'.$fila['idInfLaboral'].'">
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-sm-2">Añadir</button>
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