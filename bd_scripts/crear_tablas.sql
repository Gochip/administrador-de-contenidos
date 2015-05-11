CREATE DATABASE IF NOT EXISTS conocimiento;
USE conocimiento;

CREATE TABLE tipos_materiales(
	id INT AUTO_INCREMENT,
	nombre VARCHAR(30),
	PRIMARY KEY(id)
)ENGINE InnoDb;
CREATE TABLE calidades(
    id INT AUTO_INCREMENT,
    nombre VARCHAR(30),
    PRIMARY KEY(id)
)ENGINE InnoDb;
CREATE TABLE materiales(
	id INT AUTO_INCREMENT,
	fuente VARCHAR(256) NOT NULL,
	titulo VARCHAR(100) NOT NULL,
	autor VARCHAR(80) NOT NULL,
	id_tipo_material INT NOT NULL,
	id_calidad INT NOT NULL,
	url_descripcion VARCHAR(128) NOT NULL,
	descripcion TEXT NOT NULL,
	PRIMARY KEY(id),
	UNIQUE(fuente)
)ENGINE InnoDb;
