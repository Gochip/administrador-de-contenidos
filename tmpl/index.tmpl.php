<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Base de datos de Conocimiento</title>
		<style>
		td{
		    padding: 10px;
		}
		</style>
	</head>
	<body>
		<h1>Mis conocimientos</h1>
	    <form action="index.php" method="get">
		    <fieldset>
			    <input type="text" id="txtBuscar" name="txtBuscar" autocomplete="off" value="<?php echo (isset($buscar))?$buscar:"" ?>" />
			    <input type="submit" id="btnBuscar" name="btnBuscar" value="Buscar" />
			    <input type="submit" id="btnBuscarLibros" name="btnBuscarLibros" value="Buscar libros" />
                <input type="submit" id="btnBuscarTodo" name="btnBuscarTodo" value="Buscar todo" />
		    </fieldset>
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
		            </tr>
		        </thead>
		        <tbody>
		            <?php for($i = 0; $i < count($template_materiales); $i++):?>
        		        <tr>
        		            <td><a href="modificar.php?id=<?php echo $template_materiales[$i]["id"]; ?>" >
        		            <?php echo $template_materiales[$i]["id"]; ?></a></td>
        		            <td><?php echo $template_materiales[$i]["fuente"]; ?></td>
                            <td><a href="<?php echo $template_materiales[$i]["fuente"]; ?>" target="_blank">Ir</a></td>
        		            <td><?php echo $template_materiales[$i]["titulo"]; ?></td>
        		            <td><?php echo $template_materiales[$i]["descripcion"]; ?></td>
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
