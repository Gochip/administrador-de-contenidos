<?php


$conexion = mysqli_connect("localhost", "root", "", "conocimiento");
mysqli_set_charset($conexion, 'utf8');
$resultado = mysqli_query($conexion, "SELECT * FROM tipos_materiales");

$fila = array();
$template_tipos_contenido = array();
if ($resultado) {
    while ($fila = mysqli_fetch_array($resultado)) {
        $template_tipos_contenido[] = $fila["nombre"];
    }
}
mysqli_close($conexion);

require_once ("tmpl/registrar.tmpl.php");
?>