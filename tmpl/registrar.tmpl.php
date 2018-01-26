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
	        <h1 class="title">Mis contenidos</h1>
		    <?php if(isset($template_mensaje)):?>
		        <h3><?php echo $template_mensaje; ?></h3>
		    <?php endif; ?>
		    <form action="registrar.php" method="post" >
		        <div class="field">
		            <label class="label">Fuente (*)</label>
		            <div class="control">
		                <input type="text" id="txtClave" class="input" name="txtFuente" style="width: 100%" autocomplete="off" />
		            </div>
		        </div>
		        <div class="field">
		            <label class="label">Título (*)</label>
		            <div class="control">
		                <input type="text" id="txtTitulo" class="input" name="txtTitulo" style="width: 100%" autocomplete="off" />
		            </div>
		        </div>
		        <div class="field">
		            <label class="label">Autor (*)</label>
		            <div class="control">
		                <input type="text" id="txtAutor" class="input" name="txtAutor" style="width: 100%" autocomplete="off" />
		            </div>
		        </div>
		        <div class="field">
		            <label class="label">Tipo (*)</label>
		            <div class="control">
		                <div class="select">
		                    <?php if(isset($template_tipos_materiales)): ?>
						        <select name="slcTipoMaterial">
							        <?php foreach($template_tipos_materiales as $valor => $texto ): ?>
								        <option value="<?php echo $valor; ?>"><?php echo $texto ?></option>
							        <?php endforeach; ?>
						        </select>
					        <?php endif; ?>
		                </div>
		            </div>
		        </div>
		        <div class="field">
		            <label class="label">Comentario (*)</label>
		            <div class="control">
		                <textarea id="txaDescripcion" class="textarea" name="txaDescripcion" rows="15" cols="70"></textarea>
		            </div>
		        </div>
		        <div class="field">
		            <label class="label">Etiquetas (*)</label>
		            <div class="control">
		                <input type="text" id="txtEtiquetas" class="input" name="txtEtiquetas" style="width: 100%" autocomplete="off" />
		            </div>
		        </div>
		        <div class="field">
		            <label class="label">Calidad (*)</label>
		            <div class="control">
		                <div class="select">
		                    <?php if(isset($template_calidades)): ?>
					            <select name="slcCalidad">
					                <?php foreach($template_calidades as $valor => $texto ): ?>
								            <option value="<?php echo $valor; ?>"><?php echo $texto ?></option>
						            <?php endforeach; ?>
					            </select>
					        <?php endif; ?>
		                </div>
		            </div>
		        </div>
			    <hr />
			    <div>
				    <input type="submit" class="button is-primary" id="btnRegistrar" name="btnRegistrar" value="Registrar" />
			    </div>
		    </form>
		    <br />
		    <a href="index.php" class="button">Volver</a>
	    </div>
	</body>
</html>
