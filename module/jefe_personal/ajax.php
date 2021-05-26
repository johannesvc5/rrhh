<?php

require_once '../../conexion.php';

$html = '';
$key = $_POST['key'];
 
$result = $db->query(
    'SELECT
        dependencia.idDependencia, 
        dependencia.dependencia
    FROM
        dependencia
    WHERE dependencia.dependencia LIKE "%'.$key.'%"'
);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {                
        $html .= '<div><a class="suggest-element" data="'.utf8_encode($row['dependencia']).'" data2="'.utf8_encode($row['idDependencia']).'"</a></div>';
    }
}
echo $html;
?>