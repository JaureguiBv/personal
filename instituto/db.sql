-- Crear la base de datos
CREATE DATABASE gestion_academica_corregida;
USE gestion_academica_corregida;

-- Tabla de carreras
CREATE TABLE carreras (
    id_carrera INT AUTO_INCREMENT PRIMARY KEY,
    nombre_carrera VARCHAR(100) NOT NULL
);

-- Tabla de docentes
CREATE TABLE docentes (
    id_docente INT AUTO_INCREMENT PRIMARY KEY,
    nombre_docente VARCHAR(100) NOT NULL,
    edad INT NOT NULL,
    genero ENUM('M', 'F') NOT NULL
);

-- Tabla de estudiantes
CREATE TABLE estudiantes (
    id_estudiante INT AUTO_INCREMENT PRIMARY KEY,
    nombre_estudiante VARCHAR(100) NOT NULL,
    genero ENUM('M', 'F') NOT NULL,
    id_carrera INT NOT NULL,
    FOREIGN KEY (id_carrera) REFERENCES carreras(id_carrera) ON DELETE CASCADE
);

-- Tabla de materias
CREATE TABLE materias (
    id_materia INT AUTO_INCREMENT PRIMARY KEY,
    nombre_materia VARCHAR(100) NOT NULL,
    creditos INT NOT NULL
);

-- Tabla intermedia para relacionar materias y carreras
CREATE TABLE materias_carreras (
    id_materia_carrera INT AUTO_INCREMENT PRIMARY KEY,
    id_materia INT NOT NULL,
    id_carrera INT NOT NULL,
    FOREIGN KEY (id_materia) REFERENCES materias(id_materia) ON DELETE CASCADE,
    FOREIGN KEY (id_carrera) REFERENCES carreras(id_carrera) ON DELETE CASCADE
);

-- Tabla intermedia para relacionar materias y docentes
CREATE TABLE materias_docentes (
    id_materia_docente INT AUTO_INCREMENT PRIMARY KEY,
    id_materia INT NOT NULL,
    id_docente INT NOT NULL,
    FOREIGN KEY (id_materia) REFERENCES materias(id_materia) ON DELETE CASCADE,
    FOREIGN KEY (id_docente) REFERENCES docentes(id_docente) ON DELETE CASCADE
);

-- Tabla intermedia para relacionar materias y estudiantes
CREATE TABLE materias_estudiantes (
    id_materia_estudiante INT AUTO_INCREMENT PRIMARY KEY,
    id_materia INT NOT NULL,
    id_estudiante INT NOT NULL,
    FOREIGN KEY (id_materia) REFERENCES materias(id_materia) ON DELETE CASCADE,
    FOREIGN KEY (id_estudiante) REFERENCES estudiantes(id_estudiante) ON DELETE CASCADE
);



-- Insertar datos en carreras
INSERT INTO carreras (nombre_carrera) VALUES 
('Ingeniería de Sistemas'), 
('Administración'), 
('Derecho');

-- Insertar datos en docentes
INSERT INTO docentes (nombre_docente, edad, genero) VALUES 
('Carlos Pérez', 35, 'M'), 
('Ana López', 42, 'F'), 
('Juan Torres', 30, 'M');

-- Insertar datos en estudiantes
INSERT INTO estudiantes (nombre_estudiante, genero, id_carrera) VALUES 
('María Gómez', 'F', 1), 
('Luis Fernández', 'M', 1), 
('Elena Rojas', 'F', 2), 
('Pedro Sánchez', 'M', 3);

-- Insertar datos en materias
INSERT INTO materias (nombre_materia, creditos) VALUES 
('Matemáticas', 4), 
('Programación', 3), 
('Derecho Civil', 5);

-- Relacionar materias con carreras
INSERT INTO materias_carreras (id_materia, id_carrera) VALUES 
(1, 1), 
(2, 1), 
(3, 3);

-- Relacionar materias con docentes
INSERT INTO materias_docentes (id_materia, id_docente) VALUES 
(1, 1), 
(2, 1), 
(3, 2);

-- Relacionar materias con estudiantes
INSERT INTO materias_estudiantes (id_materia, id_estudiante) VALUES 
(1, 1), 
(1, 2), 
(2, 2), 
(3, 4);
