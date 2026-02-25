CREATE DATABASE crud;
USE crud;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    apellido VARCHAR(100),
    email VARCHAR(150),
    telefono VARCHAR(20),
    direccion VARCHAR(200),
    ciudad VARCHAR(100),
    pais VARCHAR(100),
    fecha_nacimiento DATE,
    genero VARCHAR(20),
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO usuarios
(nombre, apellido, email, telefono, direccion, ciudad, pais, fecha_nacimiento, genero)
VALUES
('Juan', 'Perez', 'juan@email.com', '2221111111', 'Calle 1', 'Puebla', 'Mexico', '1990-01-01', 'Masculino'),
('Maria', 'Lopez', 'maria@email.com', '2222222222', 'Calle 2', 'Puebla', 'Mexico', '1992-05-12', 'Femenino'),
('Carlos', 'Gomez', 'carlos@email.com', '3333333333', 'Calle 3', 'CDMX', 'Mexico', '1988-03-22', 'Masculino'),
('Ana', 'Martinez', 'ana@email.com', '4444444444', 'Calle 4', 'Guadalajara', 'Mexico', '1995-07-30', 'Femenino'),
('Luis', 'Hernandez', 'luis@email.com', '5555555555', 'Calle 5', 'Monterrey', 'Mexico', '1993-11-10', 'Masculino');