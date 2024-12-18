SELECT d.id_docente, d.nombre, d.apellido, COUNT(dm.id_materia) AS total_materias
FROM Docente d
JOIN Docente_Materia dm ON d.id_docente = dm.id_docente
GROUP BY d.id_docente, d.nombre, d.apellido
HAVING COUNT(dm.id_materia) > 1;




SELECT a.id_alumno, a.nombre, a.apellido, COUNT(am.id_materia) AS total_materias
FROM Alumno a
JOIN Alumno_Materia am ON a.id_alumno = am.id_alumno
GROUP BY a.id_alumno, a.nombre, a.apellido
HAVING COUNT(am.id_materia) > 1;




SELECT a.id_alumno, a.nombre, a.apellido, d.id_docente, d.nombre AS docente_nombre, COUNT(am.id_materia) AS total_materias
FROM Alumno a
JOIN Alumno_Materia am ON a.id_alumno = am.id_alumno
JOIN Docente_Materia dm ON am.id_materia = dm.id_materia
JOIN Docente d ON dm.id_docente = d.id_docente
GROUP BY a.id_alumno, d.id_docente
HAVING COUNT(am.id_materia) >= 2;



SELECT m.id_materia, m.nombre, COUNT(am.id_alumno) AS total_estudiantes
FROM Materia m
JOIN Alumno_Materia am ON m.id_materia = am.id_materia
GROUP BY m.id_materia, m.nombre
HAVING COUNT(am.id_alumno) > 10;




SELECT c.id_carrera, c.nombre, COUNT(a.id_alumno) AS total_estudiantes
FROM Carrera c
JOIN Alumno a ON c.id_carrera = a.id_carrera
GROUP BY c.id_carrera, c.nombre
ORDER BY total_estudiantes DESC;




SELECT c.id_carrera, c.nombre, COUNT(DISTINCT dm.id_docente) AS total_docentes
FROM Carrera c
JOIN Materia m ON c.id_carrera = m.id_carrera
JOIN Docente_Materia dm ON m.id_materia = dm.id_materia
GROUP BY c.id_carrera, c.nombre
ORDER BY total_docentes DESC;





SELECT c.id_carrera, c.nombre, a.id_alumno, a.nombre AS alumno_nombre, a.apellido
FROM Carrera c
JOIN Alumno a ON c.id_carrera = a.id_carrera
WHERE c.nombre LIKE 'D%' AND a.sexo = 'M';





SELECT d.id_docente, d.nombre, d.apellido, d.edad, COUNT(dm.id_materia) AS total_materias
FROM Docente d
JOIN Docente_Materia dm ON d.id_docente = dm.id_docente
WHERE d.edad BETWEEN 30 AND 40
GROUP BY d.id_docente, d.nombre, d.apellido, d.edad
HAVING COUNT(dm.id_materia) >= 2;



SELECT m.id_materia, m.nombre, m.creditos, COUNT(DISTINCT c.id_carrera) AS total_carreras
FROM Materia m
JOIN Carrera c ON m.id_carrera = c.id_carrera
WHERE m.creditos > 3
GROUP BY m.id_materia, m.nombre, m.creditos
HAVING COUNT(DISTINCT c.id_carrera) >= 2;



SELECT c.id_carrera, c.nombre, COUNT(a.id_alumno) AS total_mujeres
FROM Carrera c
JOIN Alumno a ON c.id_carrera = a.id_carrera
WHERE a.sexo = 'F'
GROUP BY c.id_carrera, c.nombre
ORDER BY total_mujeres DESC;
