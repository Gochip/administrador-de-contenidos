<?php

$conexion = mysqli_connect("localhost", "root", "", "conocimiento");
if($conexion->connect_error){
    die ("Error al conectar a la base de datos");
}
mysqli_set_charset($conexion, 'utf8');
if(isset($_POST["btnRegistrar"])){
    $fuente = null;
    $titulo = null;
    $id_tipo_material = null;
    $descripcion = null;
    $id_calidad = null;
    $autor = null;
    if(isset($_POST["txtFuente"])){
        $fuente = $_POST["txtFuente"];
    }
    if(isset($_POST["txtTitulo"])){
        $titulo = $_POST["txtTitulo"];
    }
    if(isset($_POST["slcTipoMaterial"])){
        $id_tipo_material = $_POST["slcTipoMaterial"];
    }
    if(isset($_POST["txaDescripcion"])){
        $descripcion = $_POST["txaDescripcion"];
    }
    if(isset($_POST["slcCalidad"])){
        $id_calidad = $_POST["slcCalidad"];
    }
    if(isset($_POST["txtAutor"])){
        $autor = $_POST["txtAutor"];
    }
    
    if(!empty($fuente) and !empty($titulo) and !empty($id_tipo_material) and !empty($descripcion) and !empty($id_calidad)){
        // INSERT....
        $url_descripcion = "contenidos/" . $titulo . "_" . time() . ".txt";
        $url_descripcion = str_ireplace(" ", "_", $url_descripcion);
        $insercion = "INSERT INTO materiales (fuente, titulo, autor, id_tipo_material, id_calidad, url_descripcion, descripcion) " . 
        " VALUES ('$fuente', '$titulo', '$autor', $id_tipo_material, $id_calidad, '$url_descripcion', '$descripcion')";
        $resultado = mysqli_query($conexion, $insercion);
        if($resultado == false){
            $template_mensaje = "Error en base de datos: " . $conexion->errno;
        }else{
            $id = mysqli_insert_id($conexion);

            $file = fopen($url_descripcion, "w");
            fwrite($file, "Id:" . $id . PHP_EOL);
            fwrite($file, $descripcion . PHP_EOL);
            fclose($file);
            $template_mensaje = "Registrado con éxito";        
        }
    }else{
        $template_mensaje = "Falta rellenar algún dato";
    }
}

$resultado = mysqli_query($conexion, "SELECT * FROM tipos_materiales");

$fila = array();
$template_tipos_materiales = array();
if(!empty($resultado)) {
    while ($fila = mysqli_fetch_array($resultado)) {
        $template_tipos_materiales[$fila["id"]] = $fila["nombre"];
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
