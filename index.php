<?php

if(isset($_POST["btnBuscar"])){
    $buscar = null;
    if(isset($_POST["txtBuscar"])){
        $buscar = $_POST["txtBuscar"];
    }
    
    if(!empty($buscar)){
        $conexion = mysqli_connect("localhost", "root", "", "conocimiento");
        mysqli_set_charset($conexion, 'utf8');
        $consulta = "SELECT * FROM materiales WHERE fuente LIKE '%" . $buscar . "%' OR titulo LIKE '%" . $buscar . "%' OR descripcion LIKE '" . $buscar. "'";
        $resultado = mysqli_query($conexion, $consulta);
        $fila = array();
        $template_materiales = array();
        if(!empty($resultado)) {
            $i = 0;
            while ($fila = mysqli_fetch_array($resultado)) {
                $template_materiales[$i] = array();
                $template_materiales[$i]["id"] = $fila["id"];
                $template_materiales[$i]["fuente"] = $fila["fuente"];
                $template_materiales[$i]["titulo"] = $fila["titulo"];
                $i++;
            }
        }
        mysqli_close($conexion);
    }
}

require_once ('tmpl/index.tmpl.php');
