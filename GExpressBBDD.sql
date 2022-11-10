DROP DATABASE IF EXISTS GExpensesBBDD;
CREATE DATABASE GExpensesBBDD;
USE GExpensesBBDD; 

DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios (
    id_usuario VARCHAR(20) NOT NULL,
    contrasena VARCHAR(120) NOT NULL,
    email VARCHAR(50) NOT NULL,
    nombre VARCHAR(20) NOT NULL,
    apellidos VARCHAR(40) NOT NULL,
    nameuser VARCHAR (40) NOT NULL,
    PRIMARY KEY (id_usuario)
)  ENGINE=INNODB;

DROP TABLE IF EXISTS actividades;
CREATE TABLE actividades (
	id_actividad VARCHAR(20),
    nombre_actividad VARCHAR(50) NOT NULL,
    fecha_actividad DATE NOT NULL,
    PRIMARY KEY (id_actividad)
)  ENGINE=INNODB;

DROP TABLE IF EXISTS gastos;
CREATE TABLE gastos (
	id_gasto VARCHAR(20),
    divisa VARCHAR(10) NOT NULL,
    importe DECIMAL(13,2),
    PRIMARY KEY (id_gasto)
)  ENGINE=INNODB;

/*Un usuario realiza multiples actividades. Una actividad es realizada por múltiples usuarios*/
/*Un usuario puede tener múltiples gastos. Un gasto puede pertenecer a múltiples usuarios*/
/*Una actividad tiene multiples gastos. Un gastos puede pertenecer a múltiples actividades*/
DROP TABLE IF EXISTS usuarios_actividades_gastos;
CREATE TABLE usuarios_actividades_gastos (
	usuario_id VARCHAR(20),
    actividad_id VARCHAR(20),
    gasto_id VARCHAR(20),
    CONSTRAINT fk_usuarios_actividades_gastos_usuarios FOREIGN KEY (usuario_id) REFERENCES usuarios (id_usuario),
    CONSTRAINT fk_usuarios_actividades_gastos_actividades FOREIGN KEY (actividad_id) REFERENCES actividades (id_actividad),
    CONSTRAINT fk_usuarios_actividades_gastos_gastos FOREIGN KEY (gasto_id) REFERENCES gastos (id_gasto)
) ENGINE=INNODB;