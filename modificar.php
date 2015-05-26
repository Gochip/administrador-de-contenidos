<?php

require_once ('config.php');

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT, array("options" => array("min_range" => 1)));

$template_mensaje = null;

if(is_null($id)){
    die ("No se detectó un id");
}else if($id == false){
    die ("No se detectó un id válido");
}else{
    $conexion = mysqli_connect($_SERVIDOR, $_USUARIO, $_CLAVE, $_BD);
    mysqli_set_charset($conexion, 'utf8');

    if(isset($_POST["btnModificar"])){
        $fuente = filter_input(INPUT_POST, "txtFuente");
        $titulo = filter_input(INPUT_POST, "txtTitulo");
        $autor = filter_input(INPUT_POST, "txtAutor");
        $id_tipo_material = filter_input(INPUT_POST, "slcTipoMaterial");
        $descripcion = filter_input(INPUT_POST, "txaDescripcion");
        $id_calidad = filter_input(INPUT_POST, "slcCalidad");

        if(isset($fuente) and isset($titulo) and isset($autor) and isset($id_tipo_material) and isset($descripcion) and isset($id_calidad)){
            $actualizacion = "UPDATE materiales SET fuente=?, titulo=?, autor=?, id_tipo_material=?, descripcion=?, id_calidad=? WHERE id=?";

            $sp = $conexion->prepare($actualizacion);
            $sp->bind_param('sssisii', $fuente, $titulo, $autor, $id_tipo_material, $descripcion, $id_calidad, $id);
            $resultado = $sp->execute();

            if($resultado === false){
                $template_mensaje = "Error en base de datos: " . $conexion->errno;
            }else{
                $template_mensaje = "Modificado con éxito";
            }
        }
    }
    
    $consulta = "SELECT * FROM materiales WHERE id=?";
    
    $sp = $conexion->prepare($consulta);
    $sp->bind_param('i', $id);
    $resultado = $sp->execute();
    
    $resultado = $sp->get_result();
    $material = array();
    $material = $resultado->fetch_array();
    if(empty($material)){
        $template_mensaje = "No existe un material con ese id";
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
}

require_once 'tmpl/modificar.tmpl.php';

