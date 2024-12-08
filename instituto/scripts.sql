SELECT d.id_docente, d.nombre_docente, COUNT(md.id_materia) AS total_materias
FROM docentes d
JOIN materias_docentes md ON d.id_docente = md.id_docente
GROUP BY d.id_docente, d.nombre_docente
HAVING COUNT(md.id_materia) > 1;



SELECT e.id_estudiante, e.nombre_estudiante, COUNT(me.id_materia) AS total_materias
FROM estudiantes e
JOIN materias_estudiantes me ON e.id_estudiante = me.id_estudiante
GROUP BY e.id_estudiante, e.nombre_estudiante
HAVING COUNT(me.id_materia) > 1;



SELECT me.id_estudiante, e.nombre_estudiante, md.id_docente, d.nombre_docente, COUNT(DISTINCT me.id_materia) AS total_materias
FROM materias_estudiantes me
JOIN materias_docentes md ON me.id_materia = md.id_materia
JOIN estudiantes e ON me.id_estudiante = e.id_estudiante
JOIN docentes d ON md.id_docente = d.id_docente
GROUP BY me.id_estudiante, md.id_docente
HAVING COUNT(DISTINCT me.id_materia) >= 2;



SELECT m.id_materia, m.nombre_materia, COUNT(me.id_estudiante) AS total_estudiantes
FROM materias m
JOIN materias_estudiantes me ON m.id_materia = me.id_materia
GROUP BY m.id_materia, m.nombre_materia
HAVING COUNT(me.id_estudiante) > 10;



SELECT c.id_carrera, c.nombre_carrera, COUNT(e.id_estudiante) AS total_estudiantes
FROM carreras c
JOIN estudiantes e ON c.id_carrera = e.id_carrera
GROUP BY c.id_carrera, c.nombre_carrera
ORDER BY total_estudiantes DESC;


SELECT c.id_carrera, c.nombre_carrera, COUNT(DISTINCT md.id_docente) AS total_docentes
FROM carreras c
JOIN materias_carreras mc ON c.id_carrera = mc.id_carrera
JOIN materias_docentes md ON mc.id_materia = md.id_materia
GROUP BY c.id_carrera, c.nombre_carrera
ORDER BY total_docentes DESC;


SELECT c.id_carrera, c.nombre_carrera, e.nombre_estudiante
FROM carreras c
JOIN estudiantes e ON c.id_carrera = e.id_carrera
WHERE c.nombre_carrera LIKE 'D%' AND e.genero = 'M';


SELECT m.id_materia, m.nombre_materia, m.creditos, COUNT(mc.id_carrera) AS total_carreras
FROM materias m
JOIN materias_carreras mc ON m.id_materia = mc.id_materia
WHERE m.creditos > 3
GROUP BY m.id_materia, m.nombre_materia, m.creditos
HAVING COUNT(mc.id_carrera) >= 2;


SELECT c.id_carrera, c.nombre_carrera, COUNT(e.id_estudiante) AS total_mujeres
FROM carreras c
JOIN estudiantes e ON c.id_carrera = e.id_carrera
WHERE e.genero = 'F'
GROUP BY c.id_carrera, c.nombre_carrera
ORDER BY total_mujeres DESC;
