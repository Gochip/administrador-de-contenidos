<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
	<head>
		<meta charset="UTF-8" />
		<title>Administrador de contenido</title>
	</head>
	<body>
		<h1>Modificación de mis contenidos</h1>
		<?php if(isset($template_mensaje)):?>
		    <h3><?php echo $template_mensaje; ?></h3>
		<?php endif; ?>
		<form action="modificar.php?id=<?php echo $material["id"]; ?>" method="post" >
			<table>
				<tr>
					<td>
						<label>Fuente: </label>
					</td>
					<td>
						<input type="text" id="txtClave" name="txtFuente" style="width: 100%" autocomplete="off"
						value="<?php echo $material["fuente"]; ?>" />
					</td>
				</tr>
				<tr>
					<td>
						<label>Título: </label>
					</td>
					<td>
						<input type="text" id="txtTitulo" name="txtTitulo" style="width: 100%" autocomplete="off"
						value="<?php echo $material["titulo"]; ?>" />
					</td>
				</tr>
				<tr>
					<td>
						<label>Autor: </label>
					</td>
					<td>
						<input type="text" id="txtAutor" name="txtAutor" style="width: 100%" autocomplete="off"
						value="<?php echo $material["autor"]?>" />
					</td>
				</tr>
				<tr>
					<td>
						<label>Tipo: </label>
					</td>
					<td>
						<?php if(isset($template_tipos_materiales)): ?>
							<select name="slcTipoMaterial">
								<?php foreach($template_tipos_materiales as $valor => $texto ): ?>
								    <?php if($material["id_tipo_material"] == $valor):?>
								        <option value="<?php echo $valor; ?>" selected><?php echo $texto ?></option>
								    <?php else: ?>
								        <option value="<?php echo $valor; ?>"><?php echo $texto ?></option>
								    <?php endif; ?>
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
						<textarea id="txaDescripcion" name="txaDescripcion" rows="15" cols="70"><?php echo $material["descripcion"] ?></textarea>
					</td>
				</tr>
				<tr>
					<td>
						<label>Calidad</label>
					</td>
					<td>
					    <?php if(isset($template_calidades)): ?>
						    <select name="slcCalidad">
						        <?php foreach($template_calidades as $valor => $texto ): ?>
						            <?php if($material["id_tipo_material"] == $valor):?>
						                <option value="<?php echo $valor; ?>" selected><?php echo $texto ?></option>
								    <?php else: ?>
								        <option value="<?php echo $valor; ?>"><?php echo $texto ?></option>
								    <?php endif; ?>
							    <?php endforeach; ?>
						    </select>
						<?php endif; ?>
					</td>
				</tr>
			</table>
			<hr />
			<div>
				<input type="submit" id="btnModificar" name="btnModificar" value="Modificar" />
			</div>
		</form>
		<br />
		<a href="index.php" >Volver</a>
	</body>
</html>
