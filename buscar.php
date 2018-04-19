<?php

require_once ('config.php');

$buscar = filter_input(INPUT_GET, "term");

$servidor = $_SERVIDOR;
$usuario = $_USUARIO;
$clave = $_CLAVE;
$bd = $_BD;

$conexion = mysqli_connect("localhost", $usuario, $clave, $bd);
mysqli_set_charset($conexion, 'utf8');
$consulta = <<<SQL
    SELECT DISTINCT(etiqueta) AS etiqueta
    FROM conocimiento.etiquetas_x_materiales
    WHERE etiqueta LIKE ?
SQL;
$sp = $conexion->prepare($consulta);
$patron = "%" . $buscar . "%";

$sp->bind_param("s", $patron);
$sp->execute();
$resultado = $sp->get_result();

$etiquetas = array();
$i = 0;
while($fila = $resultado->fetch_array()){
    $etiquetas[$i] = array();
    $etiquetas[$i]["id"] = $i;
    $etiquetas[$i]["label"] = $fila["etiqueta"];
    $etiquetas[$i]["value"] = $fila["etiqueta"];
    $i++;
}
mysqli_close($conexion);

echo json_encode($etiquetas);
