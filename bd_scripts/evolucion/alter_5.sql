ALTER TABLE tipos_materiales
ADD COLUMN imagen VARCHAR(80);

UPDATE tipos_materiales SET imagen='libro.png' WHERE nombre='Libro';
UPDATE tipos_materiales SET imagen='url.png' WHERE nombre='URL';
UPDATE tipos_materiales SET imagen='url_wikipedia.png' WHERE nombre='URL Wikipedia';
UPDATE tipos_materiales SET imagen='articulo.png' WHERE nombre='Artículo';
UPDATE tipos_materiales SET imagen='paper.png' WHERE nombre='Paper';
UPDATE tipos_materiales SET imagen='url_github.png' WHERE nombre='URL Github';
UPDATE tipos_materiales SET imagen='video.png' WHERE nombre='Video';
UPDATE tipos_materiales SET imagen='curso_online.png' WHERE nombre='Curso online';
UPDATE tipos_materiales SET imagen='herramienta_web.png' WHERE nombre='Herramienta web';

