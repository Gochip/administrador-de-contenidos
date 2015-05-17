<?php

require_once ('config.php');

$template_materiales = array();

/**
* Carga los materiales en el template_materiales para mostrarlos.
* @param mysqli_result $materiales son los materiales a cargar.
*/
function cargar_template_materiales($materiales){
    global $template_materiales;
    if(!empty($materiales)){
        $i = 0;
        while($fila = $materiales->fetch_array()){
            $template_materiales[$i] = array();
            $template_materiales[$i]["id"] = $fila["id"];
            $template_materiales[$i]["fuente"] = $fila["fuente"];
            $template_materiales[$i]["titulo"] = $fila["titulo"];
            $template_materiales[$i]["descripcion"] = nl2br($fila["descripcion"]);
            $i++;
        }
    }
}

$servidor = $_SERVIDOR;
$usuario = $_USUARIO;
$clave = $_CLAVE;
$bd = $_BD;

$buscar_todo = filter_input(INPUT_GET, "btnBuscarTodo");
if(isset($buscar_todo)){
    $conexion = mysqli_connect("localhost", $usuario, $clave, $bd);
    mysqli_set_charset($conexion, 'utf8');
    $consulta = "SELECT * FROM materiales";
    $sp = $conexion->prepare($consulta);
    $sp->execute();
    $resultado = $sp->get_result();
    cargar_template_materiales($resultado);
}else{
    $buscar = filter_input(INPUT_GET, "txtBuscar");
    if(isset($buscar)){
        if(!empty($buscar)){
            $conexion = mysqli_connect("localhost", $usuario, $clave, $bd);
            mysqli_set_charset($conexion, 'utf8');
            $consulta = "SELECT * FROM materiales WHERE fuente LIKE ? OR titulo LIKE ? OR descripcion LIKE ?";
            $sp = $conexion->prepare($consulta);
            $patron = "%" . $buscar . "%";
            $sp->bind_param("sss", $patron, $patron, $patron);
            $sp->execute();
            $resultado = $sp->get_result();
            cargar_template_materiales($resultado);
            mysqli_close($conexion);
        }
    }
}

require_once ('tmpl/index.tmpl.php');
