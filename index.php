<?php

ini_set('display_errors', '1');
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
            $template_materiales[$i]["calidad"] = nl2br($fila["calidad"]);
            $i++;
        }
    }
}

$servidor = $_SERVIDOR;
$usuario = $_USUARIO;
$clave = $_CLAVE;
$bd = $_BD;

$buscar_todo = filter_input(INPUT_GET, "btnBuscarTodo");
$buscar_libros = filter_input(INPUT_GET, "btnBuscarLibros");
$buscar_no_vistos = filter_input(INPUT_GET, "btnBuscarNoVistos");
if(isset($buscar_todo)){
    $conexion = mysqli_connect("localhost", $usuario, $clave, $bd);
    mysqli_set_charset($conexion, 'utf8');
    $consulta = <<<SQL
        SELECT m.id AS id, m.fuente AS fuente, m.titulo AS titulo,
        m.descripcion AS descripcion, c.nombre AS calidad
        FROM materiales AS m INNER JOIN calidades AS c ON (m.id_calidad=c.id)
SQL;
    $sp = $conexion->prepare($consulta);
    $ok = $sp->execute();
	$resultado = $sp->get_result();
	cargar_template_materiales($resultado);
	mysqli_close($conexion);
}else if(isset($buscar_libros)){
	$conexion = mysqli_connect("localhost", $usuario, $clave, $bd);
    mysqli_set_charset($conexion, 'utf8');
    $consulta = <<<SQL
        SELECT m.id AS id, m.fuente AS fuente, m.titulo AS titulo,
        m.descripcion AS descripcion, c.nombre AS calidad
        FROM materiales AS m INNER JOIN calidades AS c ON (m.id_calidad=c.id)
        WHERE m.id_tipo_material=1
SQL;
    $sp = $conexion->prepare($consulta);
    $sp->execute();
    $resultado = $sp->get_result();
    cargar_template_materiales($resultado);
	mysqli_close($conexion);
}else if(isset($buscar_no_vistos)){
    $conexion = mysqli_connect("localhost", $usuario, $clave, $bd);
    mysqli_set_charset($conexion, 'utf8');
    $consulta = <<<SQL
        SELECT m.id AS id, m.fuente AS fuente, m.titulo AS titulo,
        m.descripcion AS descripcion, c.nombre AS calidad
        FROM materiales AS m INNER JOIN calidades AS c ON (m.id_calidad=c.id)
        WHERE c.id=(SELECT id FROM calidades WHERE nombre='Prometedor') OR
        c.id=(SELECT id FROM calidades WHERE nombre='Desconocida')
SQL;
    $sp = $conexion->prepare($consulta);
    $sp->execute();
    $resultado = $sp->get_result();
    cargar_template_materiales($resultado);
	mysqli_close($conexion);
}else{
    $buscar = filter_input(INPUT_GET, "txtBuscar");
    if(isset($buscar)){
        if(!empty($buscar)){
            $conexion = mysqli_connect("localhost", $usuario, $clave, $bd);
            mysqli_set_charset($conexion, 'utf8');
            $consulta = <<<SQL
                SELECT m.id AS id, m.fuente AS fuente, m.titulo AS titulo,
                m.descripcion AS descripcion, c.nombre AS calidad
                FROM materiales AS m INNER JOIN calidades AS c ON (m.id_calidad=c.id)
                WHERE m.fuente LIKE ? OR m.titulo LIKE ? OR m.descripcion LIKE ?
SQL;
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

if(!empty($template_materiales)){
    $conexion = mysqli_connect("localhost", $usuario, $clave, $bd);
    mysqli_set_charset($conexion, 'utf8');
    $tmp = array();
    foreach($template_materiales as $material){
        // Búsqueda de etiquetas
        $id = $material["id"];
        $consulta = "SELECT etiqueta FROM etiquetas_x_materiales WHERE id_material=?";
        $sp = $conexion->prepare($consulta);
        $sp->bind_param('i', $id);
        $sp->execute();
        $resultado = $sp->get_result();
        $template_etiquetas = "";
        if(!empty($resultado)){
            while($fila = $resultado->fetch_array()){
                $template_etiquetas .= '[' . $fila["etiqueta"] . ']';
            }
        }
        $material["etiquetas"] = $template_etiquetas;
        $tmp[] = $material;
        // Fin de búsqueda de etiquetas
    }
}
$template_materiales = $tmp;

require_once ('tmpl/index.tmpl.php');
