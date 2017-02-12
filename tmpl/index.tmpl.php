<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Base de datos de Conocimiento</title>
		<link href="css/general.css" type="text/css" rel="stylesheet"/>
		<link href="css/index.css" type="text/css" rel="stylesheet"/>
	</head>
	<body>
		<h1>Mis conocimientos</h1>
	    <form action="index.php" method="get">

			    <input type="text" id="txtBuscar" name="txtBuscar" autocomplete="off" value="<?php echo (isset($buscar))?$buscar:"" ?>" />
			    <input type="submit" id="btnBuscar" name="btnBuscar" value="Buscar" />
			    <input type="submit" id="btnBuscarLibros" name="btnBuscarLibros" value="Buscar libros" />
                <input type="submit" id="btnBuscarTodo" name="btnBuscarTodo" value="Buscar todo" />
                <input type="submit" id="btnBuscarNoVistos" name="btnBuscarNoVistos" value="Buscar no vistos" />

	    </form>
		<?php if(isset($template_materiales) && count($template_materiales) > 0):?>
		    <table>
		        <thead>
		            <tr>
		                <th>Id</th>
        		        <th>Fuente</th>
                        <th></th>
        		        <th>Título</th>
        		        <th>Descripción</th>
                        <th>Calidad</th>
		            </tr>
		        </thead>
		        <tbody>
		            <?php for($i = 0; $i < count($template_materiales); $i++):?>
        		        <tr class="<?php echo strtolower($template_materiales[$i]["calidad"]); ?>">
        		            <td>
        		                <div>
        		                    <a href="modificar.php?id=<?php echo $template_materiales[$i]["id"]; ?>" >
        		                    <?php echo $template_materiales[$i]["id"]; ?></a>
        		                </div>
        		            </td>
        		            <td>
        		                <div>
        		                    <?php echo $template_materiales[$i]["fuente"]; ?>
        		                </div>
        		            </td>
                            <td>
                                <div>
                                    <a href="<?php echo $template_materiales[$i]["fuente"]; ?>" target="_blank">Ir</a>
                                </div>
                            </td>
        		            <td>
        		                <div>
        		                    <?php echo $template_materiales[$i]["titulo"]; ?>
        		                </div>
        		            </td>
        		            <td>
        		                <div>
        		                    <?php echo $template_materiales[$i]["descripcion"]; ?>
        		                </div>
        		            </td>
                            <td>
                                <div>
                                    <?php echo $template_materiales[$i]["calidad"]; ?>
                                </div>
                            </td>
        		        </tr>
        		    <?php endfor; ?>
		        </tbody>
		    </table>
		<?php else: ?>
		    <h4>No se encontraron resultados</h4>
		<?php endif; ?>
		<div style="margin: 10px;">
			<a href="registrar.php">Registrar</a>
		</div>
	</body>
</html>
