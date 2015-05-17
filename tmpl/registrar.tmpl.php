<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
	<head>
		<meta charset="UTF-8" />
		<title>Administrador de contenido</title>
	</head>
	<body>
		<h1>Mis contenidos</h1>
		<?php if(isset($template_mensaje)):?>
		    <h3><?php echo $template_mensaje; ?></h3>
		<?php endif; ?>
		<form action="registrar.php" method="post" >
			<table>
				<tr>
					<td>
						<label>Fuente (*)</label>
					</td>
					<td>
						<input type="text" id="txtClave" name="txtFuente" style="width: 100%" autocomplete="off" />
					</td>
				</tr>
				<tr>
					<td>
						<label>Título (*)</label>
					</td>
					<td>
						<input type="text" id="txtTitulo" name="txtTitulo" style="width: 100%" autocomplete="off" />
					</td>
				</tr>
				<tr>
					<td>
						<label>Autor</label>
					</td>
					<td>
						<input type="text" id="txtAutor" name="txtAutor" style="width: 100%" autocomplete="off" />
					</td>
				</tr>
				<tr>
					<td>
						<label>Tipo (*)</label>
					</td>
					<td>
						<?php if(isset($template_tipos_materiales)): ?>
							<select name="slcTipoMaterial">
								<?php foreach($template_tipos_materiales as $valor => $texto ): ?>
									<option value="<?php echo $valor; ?>"><?php echo $texto ?></option>
								<?php endforeach; ?>
							</select>
						<?php endif; ?>
					</td>
				</tr>
				<tr>
					<td>
						<label>Descripción (*)</label>
					</td>
					<td>
						<textarea id="txaDescripcion" name="txaDescripcion" rows="15" cols="70"></textarea>
					</td>
				</tr>
				<tr>
					<td>
						<label>Calidad (*)</label>
					</td>
					<td>
					    <?php if(isset($template_calidades)): ?>
						    <select name="slcCalidad">
						        <?php foreach($template_calidades as $valor => $texto ): ?>
									    <option value="<?php echo $valor; ?>"><?php echo $texto ?></option>
							    <?php endforeach; ?>
						    </select>
						<?php endif; ?>
					</td>
				</tr>
			</table>
			<hr />
			<div>
				<input type="submit" id="btnRegistrar" name="btnRegistrar" value="Registrar" />
			</div>
		</form>
		<br />
		<a href="index.php" >Volver</a>
	</body>
</html>
