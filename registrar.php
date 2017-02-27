<?php

require_once ('config.php');

$conexion = mysqli_connect($_SERVIDOR, $_USUARIO, $_CLAVE, $_BD);
if($conexion->connect_error){
    die ("Error al conectar a la base de datos");
}
if(!mysqli_set_charset($conexion, 'utf8')){
    echo "No se pudo establecer el charset";
}
$btn_registrar = filter_input(INPUT_POST, "btnRegistrar");
if(isset($btn_registrar)){
    $fuente = filter_input(INPUT_POST, "txtFuente");
    $titulo = filter_input(INPUT_POST, "txtTitulo");
    $id_tipo_material = filter_input(INPUT_POST, "slcTipoMaterial");
    $descripcion = filter_input(INPUT_POST, "txaDescripcion");
    $etiquetas = filter_input(INPUT_POST, "txtEtiquetas");
    $id_calidad = filter_input(INPUT_POST, "slcCalidad");
    $autor = filter_input(INPUT_POST, "txtAutor");
    
    if(!empty($fuente) and !empty($titulo) and !empty($id_tipo_material) and !empty($descripcion) and !empty($id_calidad) and !empty($etiquetas)){
        // Insertar contenido...
        $url_descripcion = "contenidos/" . $titulo . "_" . time() . ".txt";
        $url_descripcion = str_ireplace(" ", "_", $url_descripcion);
        $insercion = "INSERT INTO materiales (fuente, titulo, autor, id_tipo_material, id_calidad, url_descripcion, descripcion, id_contenedor) " . 
        " VALUES (?, ?, ?, ?, ?, ?, ?, 1)";
        $sp = $conexion->prepare($insercion);
        $sp->bind_param("sssiiss", $fuente, $titulo, $autor, $id_tipo_material, $id_calidad, $url_descripcion, $descripcion);
        $resultado = $sp->execute();
        if($resultado == false){
            $template_mensaje = "Error en base de datos: " . $conexion->errno;
        }else{
            // Inserción de etiquetas
            $id = $sp->insert_id;
            $exito = true;
            $partes_etiquetas = explode(']', $etiquetas);
            if(isset($partes_etiquetas) and count($partes_etiquetas) > 0){
                foreach($partes_etiquetas as $etiqueta){
                    $etiqueta = ltrim($etiqueta, '[');
                    $etiqueta = rtrim($etiqueta, ']');
                    if(!empty($etiqueta)){
                        $insercion = "INSERT INTO etiquetas_x_materiales (etiqueta, id_material) VALUES (?, ?)";
                        $sp = $conexion->prepare($insercion);
                        $sp->bind_param('si', $etiqueta, $id);
                        $exito = $sp->execute();
                        if($exito === false){
                            break;
                        }
                    }
                }
            }

            if($exito !== false){
                $template_mensaje = "Registrado con éxito";
            } else {
                $template_mensaje = "Error en base de datos: " . $conexion->errno;
            }
            // Fin de inserción de etiquetas
        }
    }else{
        $template_mensaje = "Falta rellenar algún dato obligatorio";
    }
}

$resultado = mysqli_query($conexion, "SELECT * FROM tipos_materiales ORDER BY nombre");

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

