<?php


if(isset($_POST["btnRegistrar"])){
    $fuente = null;
    $titulo = null;
    $tipo_contenido = null;
    $descripcion = null;
    $calidad = null;
    if(isset($_POST["txtFuente"])){
        $fuente = $_POST["txtFuente"];
    }
    if(isset($_POST["txtTitulo"])){
        $titulo = $_POST["txtTitulo"];
    }
    if(isset($_POST["slcTipoContenido"])){
        $tipo_contenido = $_POST["slcTipoContenido"];
    }
    if(isset($_POST["txaDescripcion"])){
        $descripcion = $_POST["txaDescripcion"];
    }
    if(isset($_POST["slcCalidad"])){
        $calidad = $_POST["slcCalidad"];
    }
    
    if(is_null($fuente) || is_null($titulo) || is_null($tipo_contenido) || is_null($descripcion) || is_null($calidad)){
        // INSERT....
    }
}

$conexion = mysqli_connect("localhost", "root", "", "conocimiento");
mysqli_set_charset($conexion, 'utf8');
$resultado = mysqli_query($conexion, "SELECT * FROM tipos_materiales");

$fila = array();
$template_tipos_contenido = array();
if(!empty($resultado)) {
    while ($fila = mysqli_fetch_array($resultado)) {
        $template_tipos_contenido[$fila["id"]] = $fila["nombre"];
    }
}

$resultado = mysqli_query($conexion, "SELECT * FROM calidades");
$fila = array();
$template_calidades = array();
if(!empty($resultado)) {
    while($fila = mysqli_fetch_array($resultado)){
        $template_calidades[$fila["id"]] = $fila["nombre"];
    }
}

mysqli_close($conexion);

require_once ("tmpl/registrar.tmpl.php");
?>
