-- Alfonso David Recio Calderon SERVIDOR Prueba Inicio de Sesion
--Tabla de Usuarios de Administracion
CREATE TABLE us_Admin(
    idUsuario tinyint unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
    correo varchar(100) NOT NULL,
    pw varchar(25) NOT NULL,
    nombre varchar(30) NOT NULL,
    perfil tinyint unsigned NOT NULL
)ENGINE=InnoDB;

INSERT INTO us_Admin(correo,pw,nombre,perfil) VALUES 
('ejemplo1@gmail.com','1234','ej1',0),
('ejemplo2@gmail.com','7890','ej2',1),
('ejemplo3@gmail.com','1122','ej3',2);