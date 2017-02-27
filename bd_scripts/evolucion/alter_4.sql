CREATE TABLE etiquetas_x_materiales(
    id INT AUTO_INCREMENT,
    etiqueta VARCHAR(60) NOT NULL,
    id_material INT NOT NULL,
    PRIMARY KEY(id)
)ENGINE InnoDb;

