<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
	<head>
		<meta charset="UTF-8" />
		<title>Administrador de contenido</title>
		<link href="css/bulma.css" type="text/css" rel="stylesheet"/>
		<link href="css/general.css" type="text/css" rel="stylesheet"/>
	</head>
	<body>
	    <div class="section">
	        <h1 class="title">Modificación de mis contenidos</h1>
		    <?php if(isset($template_mensaje)):?>
		        <h3><?php echo $template_mensaje; ?></h3>
		    <?php endif; ?>
		    <form action="modificar.php?id=<?php echo $material["id"]; ?>" method="post" >
		        <div class="field">
		            <label class="label">Fuente</label>
		            <div class="control">
		                <input type="text" id="txtClave" class="input" name="txtFuente" style="width: 100%" autocomplete="off"
						    value="<?php echo $material["fuente"]; ?>" />
		            </div>
		        </div>
		        <div class="field">
		            <label class="label">Título</label>
		            <div class="control">
		                <input type="text" class="input" id="txtTitulo" name="txtTitulo" style="width: 100%" autocomplete="off"
						    value="<?php echo $material["titulo"]; ?>" />
		            </div>
		        </div>
		        <div class="field">
		            <label class="label">Autor</label>
		            <div class="control">
		                <input type="text" class="input" id="txtAutor" name="txtAutor" style="width: 100%" autocomplete="off"
						    value="<?php echo $material["autor"]?>" />
		            </div>
		        </div>
		        <div class="field">
		            <label class="label">Tipo</label>
		            <div class="control">
		                <?php if(isset($template_tipos_materiales)): ?>
		                    <div class="select">
		                        <select name="slcTipoMaterial">
							        <?php foreach($template_tipos_materiales as $valor => $texto ): ?>
							            <?php if($material["id_tipo_material"] == $valor):?>
							                <option value="<?php echo $valor; ?>" selected><?php echo $texto ?></option>
							            <?php else: ?>
							                <option value="<?php echo $valor; ?>"><?php echo $texto ?></option>
							            <?php endif; ?>
							        <?php endforeach; ?>
						        </select>
		                    </div>
					    <?php endif; ?>
		            </div>
		        </div>
		        <div class="field">
		            <label class="label">Comentario</label>
		            <div class="control">
		                <textarea id="txaDescripcion" class="textarea" name="txaDescripcion" rows="5" cols="70"><?php echo $material["descripcion"] ?></textarea>
		            </div>
		        </div>
		        <div class="field">
		            <label class="label">Etiquetas</label>
		            <div class="control">
		                <input type="text" class="input" id="txtEtiquetas" name="txtEtiquetas" style="width: 100%" autocomplete="off"
						    value="<?php echo $template_etiquetas ?>" />
		            </div>
		        </div>
		        <div class="field">
		            <label class="label">Calidad</label>
		            <div class="control">
		                <div class="select">
		                    <?php if(isset($template_calidades)): ?>
					            <select name="slcCalidad" class="select">
					                <?php foreach($template_calidades as $valor => $texto ): ?>
					                    <?php if($material["id_calidad"] == $valor):?>
					                        <option value="<?php echo $valor; ?>" selected><?php echo $texto ?></option>
							            <?php else: ?>
							                <option value="<?php echo $valor; ?>"><?php echo $texto ?></option>
							            <?php endif; ?>
						            <?php endforeach; ?>
					            </select>
					        <?php endif; ?>
		                </div>
		            </div>
		        </div>
			    <hr />
			    <div>
				    <input type="submit" id="btnModificar" class="button is-primary" name="btnModificar" value="Modificar" />
			    </div>
		    </form>
		    <br />
		    <a href="index.php" class="button" >Volver</a>
	    </div>
	</body>
</html>
