UPDATE calidades SET nombre='Prometedor' WHERE nombre='No visto' AND id>0;

INSERT INTO tipos_materiales(nombre) VALUES ('Curso online');
INSERT INTO tipos_materiales(nombre) VALUES ('Herramienta web');

CREATE TABLE contenedores(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255)
);

INSERT INTO contenedores(nombre) VALUES('Informática');

ALTER TABLE materiales ADD COLUMN id_contenedor INT;

UPDATE materiales SET id_contenedor=1 WHERE id>0;
