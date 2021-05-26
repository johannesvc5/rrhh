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
infpersonal.idInfPersonal, 
infpersonal.correo, 
infpersonal.telefono, 
infpersonal.departamentoRes, 
infpersonal.provinciaRes, 
infpersonal.distritoRes, 
infpersonal.domicilioRes, 
infpersonal.estadoCivil, 
infpersonal.cantHijos
FROM
personal
INNER JOIN
infpersonal
ON 
    personal.idpersonal = infpersonal.idPersonal";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['Educ']))
{
    $q=$db->real_escape_string($_POST['Educ']);
    $query="SELECT
	personal.idpersonal, 
	personal.dniPersonal, 
	personal.nombreP, 
	personal.apellidosP,
    infpersonal.idInfPersonal, 
	infpersonal.correo, 
	infpersonal.telefono, 
	infpersonal.departamentoRes, 
	infpersonal.provinciaRes, 
	infpersonal.distritoRes, 
	infpersonal.domicilioRes, 
	infpersonal.estadoCivil, 
	infpersonal.cantHijos
    FROM
	personal
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
            <th class="text-center" style="color:#FFF">Correo</th>
            <th class="text-center" style="color:#FFF">Teléfono</th>
            <th class="text-center" style="color:#FFF">Departamento</th>
            <th class="text-center" style="color:#FFF">Provincia</th>
            <th class="text-center" style="color:#FFF">Distrito</th>
            <th class="text-center" style="color:#FFF">Domicilio</th>
            <th class="text-center" style="color:#FFF">Est.Civil</th>
            <th class="text-center" style="color:#FFF">Hijos</th>
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
                <td class="text-center">'.$fila['departamentoRes'].'</td>
                <td class="text-center">'.$fila['provinciaRes'].'</td>
                <td class="text-center">'.$fila['distritoRes'].'</td>
                <td class="text-center">'.$fila['domicilioRes'].'</td>
                <td class="text-center">'.$fila['estadoCivil'].'</td>
                <td class="text-center">'.$fila['cantHijos'].'</td>
                
                <td class="text-center"><button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#editPers'.$fila['idpersonal'].'"><img class="svg3" alt="Editar" src="../../img/icon/user-edit.svg"></button></td>

            </tr>';

            echo '<!-- Modal -->
            <div class="modal fade" id="editPers'.$fila['idpersonal'].'" tabindex="-1" role="dialog" aria-labelledby="editPers" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Editar Datos de Personal: '.strtoupper($fila['nombreP']).' '.strtoupper($fila['apellidosP']).'</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form action="editDataPer.php" method="post">
                                <!--Editar Datos de Resolución-->
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="telefono" class="text-dark"><strong>Número de Teléfono:</strong></label>
                                            <input type="numeric" class="form-control" id="telefono" name="telefono" value="'.$fila['telefono'].'" maxlength="9">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="email"><strong>Correo Electrónico:</strong></label>
                                            <input type="mail" class="form-control" name="email" value="'.$fila['correo'].'">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="región"><strong>Región de Residencia:</strong></label>
                                            <input type="text" class="form-control" name="region" value="'.$fila['departamentoRes'].'">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="Provincia"><strong>Provincia de Residencia:</strong></label>
                                            <input type="text" class="form-control" name="Provincia" value="'.$fila['provinciaRes'].'">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="Distrito"><strong>Distrito de Residencia:</strong></label>
                                            <input type="text" class="form-control" name="Distrito" value="'.$fila['distritoRes'].'">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="Dirección"><strong>Dirección de Residencia:</strong></label>
                                            <input type="text" class="form-control" name="Direccion" value="'.$fila['domicilioRes'].'">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="estadoCivil"><strong>Estado Civil:</strong></label>
                                            <select class="custom-select mr-sm-2 form-select" id="estadoCivil" name="estadoCivil">
                                                <option value="'.$fila['estadoCivil'].'">'.$fila['estadoCivil'].'</option>
                                                <option value="Soltero">Soltero</option>
                                                <option value="Casado">Casado</option>
                                                <option value="Divorciado">Divorciado</option>
                                                <option value="Viudo">Viudo</option>
                                                <option value="Conviviente">Conviviente</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="hijos" class="text-dark"><strong>Cantidad de Hijos:</strong></label>
                                            <input type="numeric" class="form-control" id="hijos" name="hijos" value="'.$fila['cantHijos'].'" maxlength="2">
                                        </div>
                                        <input type="hidden" class="form-control" id="id" name="id" value="'.$fila['idInfPersonal'].'">
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