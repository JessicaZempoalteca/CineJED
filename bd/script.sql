DROP DATABASE IF EXISTS nombre;
CREATE DATABASE IF NOT EXISTS nombre DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE nombre;

/*CRUD: select, create, show,, update*/
GRANT ALL PRIVILEGES ON nombre.* TO 'usuario'@'localhost' IDENTIFIED BY 'password';

CREATE TABLE roles (
  idUusario INT NOT NULL AUTO_INCREMENT,
  estatus_rol TYNIINT(1) NOT NULL DEFAULT 1 COMMENT '1: Activo, 0: Inactivo',
  rol VARCHAR(30) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB;

INSERT INTO roles VALUES (1, 1, 'Administrador');
INSERT INTO roles VALUES (2, 1, 'Operador');

CREATE TABLE usuarios (
  id INT NOT NULL AUTO_INCREMENT,
  estatus_usuario TINYINT(1) NOT NULL DEFAULT 1 COMMENT '1: Activo, 0: Inactivo',
  nombre_usuario VARCHAR(50) NOT NULL,
  apellido_usuario VARCHAR(50) NOT NULL,
  sexo_usuario TINYINT(1) NOT NULL COMMENT '1: Masculino, 2: Femenino',
  email_usuario VARCHAR(70) NOT NULL,
  password_usuario VARCHAR(64) NOT NULL,
  imagen_usuario VARCHAR(100) NOT NULL,
  id_rol INT(1) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (id_rol) REFERENCES roles(id)
)ENGINE=InnoDB;

/*windows cmd acceder a root

EJECUTAR SCRIPT
solo copiar y pegar la informacion

LEER  SOBRE
jquery validation
Bootstrap validation
ver cual queda en la plantilla

*/