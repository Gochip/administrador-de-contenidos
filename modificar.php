<?php

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT, array("options" => array("min_range" => 1)));

$template_mensaje = null;

if(is_null($id)){
    die ("No se detectó un id");
}else if($id == false){
    die ("No se detectó un id válido");
}else{
    $conexion = mysqli_connect("localhost", "root", "", "conocimiento");
    mysqli_set_charset($conexion, 'utf8');
    
    if(isset($_POST["btnModificar"])){
        if(isset($_POST["txtTitulo"])){
            $titulo = $_POST["txtTitulo"];
        }
        if(isset($_POST["txtAutor"])){
            $autor = $_POST["txtAutor"];
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
        if(isset($titulo) and isset($autor) and isset($id_tipo_material) and isset($descripcion) 
        and isset($id_calidad)){
            $actualizacion = "UPDATE materiales SET titulo='$titulo', autor='$autor', 
            id_tipo_material=$id_tipo_material, descripcion='$descripcion', id_calidad=$id_calidad
            WHERE id=$id";

            $res = mysqli_query($conexion, $actualizacion);
            if($res == false){
                echo "Error al ejecutar la actualización";
            }else{
                $template_mensaje = "Modificado con éxito";
            }
        }
    }
    
    $consulta = "SELECT * FROM materiales WHERE id='$id'";
    
    $resultado = mysqli_query($conexion, $consulta);
    $material = array();
    $material = mysqli_fetch_array($resultado);
    if(empty($material)){
        $template_mensaje = "No existe ese id";
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

