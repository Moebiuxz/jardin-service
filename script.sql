CREATE DATABASE arduin_bd;
USE arduin_bd;

DROP TABLE IF EXISTS tipo_riego;
CREATE TABLE tipo_riego(
  tipo_id INT NOT NULL,
  tipo_descripcion VARCHAR(150),
  eliminar_estado BOOLEAN DEFAULT FALSE,
  PRIMARY KEY (tipo_id)
);

DROP TABLE IF EXISTS usuario;
CREATE TABLE usuario(
  usuario_rut VARCHAR(12),
  usuario_nombre VARCHAR(150),
  usuario_apellido VARCHAR(150),
  eliminar_estado BOOLEAN DEFAULT FALSE,
  PRIMARY KEY (usuario_rut)
);

DROP TABLE IF EXISTS tipo_cuenta;
CREATE TABLE tipo_cuenta(
  tipo_id INT NOT NULL,
  tipo_descripcion VARCHAR(100),
  eliminar_estado BOOLEAN DEFAULT FALSE,
  PRIMARY KEY (tipo_id)
);

DROP TABLE IF EXISTS cuenta;
CREATE TABLE cuenta(
  cuenta_id INT AUTO_INCREMENT,
  fk_usuario_rut VARCHAR(12),
  cuenta_clave VARCHAR(150),
  fk_cuenta_tipo INT,
  eliminar_estado BOOLEAN DEFAULT FALSE,
  FOREIGN KEY (fk_usuario_rut) REFERENCES usuario(usuario_rut),
  FOREIGN KEY (fk_cuenta_tipo) REFERENCES tipo_cuenta(tipo_id),
  PRIMARY KEY (cuenta_id)
);

DROP TABLE IF EXISTS riego;
CREATE TABLE riego(
  riego_id INT AUTO_INCREMENT,
  riego_fecha DATETIME,
  riego_temperatura FLOAT,
  riego_humedad FLOAT,
  fk_riego_tipo INT,
  fk_riego_usuario VARCHAR(12),
  eliminar_estado BOOLEAN DEFAULT FALSE,
  FOREIGN KEY (fk_riego_tipo) REFERENCES tipo_riego(tipo_id),
  FOREIGN KEY (fk_riego_usuario) REFERENCES usuario(usuario_rut),
  PRIMARY KEY (riego_id)
);

DROP TABLE IF EXISTS tipo_sensor;
CREATE TABLE tipo_sensor(
  tipo_id INT NOT NULL,
  tipo_descripcion VARCHAR(250),
  eliminar_estado BOOLEAN DEFAULT FALSE,
  PRIMARY KEY (tipo_id)
);

DROP TABLE IF EXISTS sensor;
CREATE TABLE sensor(
  sensor_id INT NOT NULL,
  sensor_modelo VARCHAR(150),
  sensor_descripcion VARCHAR(150),
  fk_sensor_tipo INT,
  eliminar_estado BOOLEAN DEFAULT FALSE,
  FOREIGN KEY (fk_sensor_tipo) REFERENCES tipo_sensor(tipo_id),
  PRIMARY KEY (sensor_id)
);

DROP TABLE IF EXISTS historial_sensor;
CREATE TABLE historial_sensor(
  historial_id BIGINT AUTO_INCREMENT,
  historial_valor FLOAT,
  historial_fecha VARCHAR(30),
  fk_sensor INT,
  eliminar_estado BOOLEAN DEFAULT FALSE,
  FOREIGN KEY (fk_sensor) REFERENCES sensor(sensor_id),
  PRIMARY KEY (historial_id)
);

/*INSERT POR DEFECTO*/

# TIPO DE CUENTA
INSERT INTO tipo_cuenta (tipo_id, tipo_descripcion) VALUES (
  1, 'ADMINISTRADOR'
);
INSERT INTO tipo_cuenta (tipo_id, tipo_descripcion) VALUES (
  2, 'NORMAL'
);

# USUARIO
INSERT INTO usuario (usuario_rut, usuario_nombre, usuario_apellido) VALUES (
    '18039352-8', 'Álvaro', 'Bunster'
);

# CUENTA
INSERT INTO cuenta (fk_usuario_rut, cuenta_clave, fk_cuenta_tipo) VALUES (
    '18039352-8', sha2('123456', 512), 1
);

# TIPO DE RIEGO
INSERT INTO tipo_riego (tipo_id, tipo_descripcion) VALUES (
    1, 'AUTOMÁTICO'
);
INSERT INTO tipo_riego (tipo_id, tipo_descripcion) VALUES (
    2, 'MANUAL'
);

# TIPO DE SENSOR
INSERT INTO tipo_sensor(tipo_id, tipo_descripcion) VALUES (
    1, 'HUMEDAD'
);
INSERT INTO tipo_sensor(tipo_id, tipo_descripcion) VALUES (
    2, 'TEMPERATURA'
);

# SENSOR
INSERT INTO sensor(sensor_id, sensor_modelo, sensor_descripcion, fk_sensor_tipo) VALUE (
    1, 'FC-28', 'Sensor de humedad de suelo', 1
);
INSERT INTO sensor(sensor_id, sensor_modelo, sensor_descripcion, fk_sensor_tipo) VALUE (
    2, 'DHT22', 'Sensor de temperatura y humedad ambiental', 2
);

# HISTORIAL SENSOR
INSERT INTO historial_sensor (historial_valor, historial_fecha, fk_sensor) VALUES (
    25.5, now(), 1
);
INSERT INTO historial_sensor (historial_valor, historial_fecha, fk_sensor) VALUES (
    25.5, '2017-10-17 11:01:00', 1
);
