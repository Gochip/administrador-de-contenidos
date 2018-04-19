<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Base de datos de Conocimiento</title>
		<link href="css/jquery-ui.css" rel="stylesheet">
		<link href="css/bulma.css" type="text/css" rel="stylesheet"/>
		<link href="css/general.css" type="text/css" rel="stylesheet"/>
		<link href="css/index.css" type="text/css" rel="stylesheet"/>
		<script src="js/jquery-3.3.1/jquery-3.3.1.min.js" type="text/javascript"></script>
		<script src="js/jquery-3.3.1/jquery-ui.js"></script>
		<script type="text/javascript">
		    $(document).ready(function() {
		        $("#txtBuscar").autocomplete({
                    source: "buscar.php",
                    minLength: 0,
                    select: function( event, ui ) {
                        //log( "Selected: " + ui.item.value + " aka " + ui.item.id );
                    }
                });
		    });
		</script>
	</head>
	<body>
	    <div class="section">
	        <h1 class="title">Mis conocimientos</h1>
	        <form action="index.php" method="get">
	            <div class="columns">
	                <div class="column">
	                    <input type="text" class="input" id="txtBuscar" name="txtBuscar" autocomplete="off" value="<?php echo (isset($buscar))?$buscar:"" ?>" />
	                </div>
	                <div class="column">
	                    <input type="submit" class="button is-primary" id="btnBuscar" name="btnBuscar" value="Buscar" />
			            <input type="submit" class="button" id="btnBuscarLibros" name="btnBuscarLibros" value="Buscar libros" />
                        <input type="submit" class="button" id="btnBuscarTodo" name="btnBuscarTodo" value="Buscar todo" />
                        <input type="submit" class="button" id="btnBuscarNoVistos" name="btnBuscarNoVistos" value="Buscar no vistos" />
	                </div>
	            </div>
	        </form>
		    <?php if(isset($template_materiales) && count($template_materiales) > 0):?>
		        <table class="table">
		            <thead>
		                <tr>
		                    <th>Id</th>
            		        <th>Fuente</th>
                            <th></th>
            		        <th>Título</th>
            		        <th>Etiquetas</th>
            		        <th>Comentario</th>
                            <th>Calidad</th>
                            <th>Tipo</th>
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
            		                <div class="etiquetas">
            		                    <?php echo $template_materiales[$i]["etiquetas"]; ?>
            		                </div>
            		            </td>
            		            <td>
            		                <div class="comentario" title="<?php echo $template_materiales[$i]["descripcion"]; ?>">
            		                    <?php echo $template_materiales[$i]["descripcion"]; ?>
            		                </div>
            		            </td>
                                <td>
                                    <div>
                                        <?php echo $template_materiales[$i]["calidad"]; ?>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <?php echo $template_materiales[$i]["tipo"]; ?>
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
			    <a href="registrar.php" class="button">Registrar</a>
		    </div>
	    </div>
	</body>
</html>
