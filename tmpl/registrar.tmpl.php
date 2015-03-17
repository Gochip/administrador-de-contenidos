<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
	<head>
		<meta charset="UTF-8" />
		<title>Administrador de contenido</title>
	</head>
	<body>
		<h1>Mis contenidos</h1>
		<form action="registrar.php" method="post" >
			<table>
				<tr>
					<td>
						<label>Clave: </label>
					</td>
					<td>
						<input type="text" id="txtClave" name="txtClave" style="width: 100%" />
					</td>
				</tr>
				<tr>
					<td>
						<label>Título: </label>
					</td>
					<td>
						<input type="text" id="txtTitulo" name="txtTitulo" style="width: 100%" />
					</td>
				</tr>
				<tr>
					<td>
						<label>Tipo: </label>
					</td>
					<td>
						<?php if(isset($template_tipos_contenido)): ?>
							<select>
								<?php foreach($template_tipos_contenido as $valor => $texto ): ?>
									<option value="<?php echo $valor; ?>"><?php echo $texto ?></option>
								<?php endforeach; ?>
							</select>
						<?php endif; ?>
					</td>
				</tr>
				<tr>
					<td>
						<label>Descripción: </label>
					</td>
					<td>
						<textarea id="txaDescripcion" name="txaDescripcion" rows="15" cols="70"> </textarea>
					</td>
				</tr>
				<tr>
					<td>
						<label>Calidad</label>
					</td>
					<td>
						<select>
							<option value="exc">Excelente</option>
							<option value="bue">Buena</option>
							<option value="reg">Regular</option>
							<option value="mal">Mala</option>
							<option value="no_">No sé</option>
							<option value="pro">Prometedor</option>
						</select>
					</td>
				</tr>
			</table>
			<hr />
			<div>
				<input type="submit" id="btnRegistrar" name="btnRegistrar" value="Registrar" />
			</div>
		</form>
	</body>
</html>