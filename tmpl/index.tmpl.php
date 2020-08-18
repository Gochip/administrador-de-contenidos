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
            $(document).ready(function () {
                // Eventos.
                $(document).on("click", ".btn-abrir", function() {
                    $(this).parent().parent().find("td div").css("max-height", "none");
                });
                
                // Setup.
                $("#txtBuscar").autocomplete({
                    source: "buscar.php",
                    minLength: 0,
                    select: function (event, ui) {
                        //log( "Selected: " + ui.item.value + " aka " + ui.item.id );
                    }
                });
                
                $("#txtBuscar").focus();
            });
        </script>
    </head>
    <body>
        <div class="section">
            <h1 class="title">Mis contenedores de información</h1>
            <h2 class="subtitle">La nueva manera de organizar tu información</h2>
            <form action="index.php" method="get">
                <div class="columns">
                    <div class="column">
                        <div class="field has-addons">
                            <div class="control is-expanded">
                                <input type="text" class="input" id="txtBuscar" name="txtBuscar" autocomplete="off" value="<?php echo (isset($buscar)) ? $buscar : "" ?>" />
                            </div>
                            <div class="control">
                                <input type="submit" class="button is-primary" id="btnBuscar" name="btnBuscar" value="Buscar contenido" />
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <input type="submit" class="button" id="btnBuscarLibros" name="btnBuscarLibros" value="Buscar libros" />
                        <input type="submit" class="button" id="btnBuscarNoVistos" name="btnBuscarNoVistos" value="Buscar no vistos" />
                        <a href="registrar.php" class="button is-info">Registrar nuevo contenido</a>
                        <input type="submit" class="button" id="btnBuscarNoVistos" name="btnBuscarNoVistos" value="Administrar árbol de etiquetas" />
                    </div>
                </div>
            </form>
            <?php if (isset($template_materiales) && count($template_materiales) > 0): ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Tipo</th>
                            <th>Fuente</th>
                            <th>Título</th>
                            <th>Etiquetas</th>
                            <th>Comentario</th>
                            <th>Calidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < count($template_materiales); $i++): ?>
                            <tr class="<?php echo strtolower($template_materiales[$i]["calidad"]); ?>">
                                <td>
                                    <button class="button is-small btn-abrir">Abrir</button>
                                </td>
                                <td class="columna-tipo">
                                    <div>
                                        <a href="modificar.php?id=<?php echo $template_materiales[$i]["id"]; ?>" >
                                            <?php echo $template_materiales[$i]["id"]; ?>
                                            <img src="img/<?php echo $template_materiales[$i]["imagen_tipo"] ?>" width="14" title="<?php echo $template_materiales[$i]["tipo"] ?>" />
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <?php
                                        if ($template_materiales[$i]["tipo"] === "Libro" ||
                                                $template_materiales[$i]["tipo"] === "Artículo" ||
                                                $template_materiales[$i]["tipo"] === "Paper"):
                                            ?>
                                                <?php echo $template_materiales[$i]["fuente"]; ?>
                                            <?php else: ?>
                                            <a href="<?php echo $template_materiales[$i]["fuente"]; ?>" target="_blank">
                                            <?php echo $template_materiales[$i]["fuente"]; ?>
                                            </a>
        <?php endif; ?>
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
                            </tr>
                <?php endfor; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <h4 style="margin-top: 10%; text-align: center">No se encontraron resultados.</h4>
<?php endif; ?>
        </div>
    </body>
</html>
