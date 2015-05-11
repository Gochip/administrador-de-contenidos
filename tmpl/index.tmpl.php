<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
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
			    <input type="text" id="txtBuscar" name="txtBuscar" autocomplete="off" />
			    <input type="submit" id="btnBuscar" name="btnBuscar" value="Buscar" />
		    </fieldset>
	    </form>
		<?php if(isset($template_materiales)):?>
		    <table>
		        <thead>
		            <tr>
		                <th>Id</th>
        		        <th>Fuente</th>
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
        		            <td><?php echo $template_materiales[$i]["titulo"]; ?></td>
        		            <td><?php echo $template_materiales[$i]["descripcion"]; ?></td>
        		        </tr>
        		    <?php endfor; ?>
		        </tbody>
		    </table>
		<?php endif; ?>
		<div style="margin: 10px;">
			<a href="registrar.php">Registrar</a>
		</div>
	</body>
</html>
