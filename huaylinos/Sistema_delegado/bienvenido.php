<?php
include("sesiones/iniSesion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("inc/meta.php") ?>
    <title>Delegados</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <header class="cabecera">
        <?php include("inc/navbar.php"); ?>
    </header>
    <main>
        <section class="container my-5">
            <h2 class="text-center mb-4">Candidatos a ser Delegados</h2>
            <div class="container">
                <?php
                include("conexion.php");

                if ($conn) {
                    $consulta = "SELECT aluCodigo, aluNombre, aluApellido FROM tblalumnos WHERE aluCandidato = 'si'";
                    $resultado = mysqli_query($conn, $consulta);

                    if ($resultado && mysqli_num_rows($resultado) > 0) {
                        echo '<div class="table-responsive">';
                        echo '<table class="table table-bordered table-hover">';
                        echo '<thead class="thead-dark">';
                        echo '<tr>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Acciones</th>
                              </tr>';
                        echo '</thead>';
                        echo '<tbody>';

                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            echo '<tr>';
                            echo '<td>' . htmlspecialchars($fila['aluCodigo']) . '</td>';
                            echo '<td>' . htmlspecialchars($fila['aluNombre']) . '</td>';
                            echo '<td>' . htmlspecialchars($fila['aluApellido']) . '</td>';
                            echo '<td>';

                            // Botón para eliminar el registro
                            echo '<form action="CRUD/regDELETE.php" method="post" class="d-inline">';
                            echo '<input type="hidden" name="codigo" value="' . htmlspecialchars($fila['aluCodigo']) . '">';
                            echo '<button type="submit" class="btn btn-danger btn-sm" name="eliminar">
                                    <i class="bi bi-trash3-fill"></i> Eliminar
                                  </button>';
                            echo '</form> ';

                            // Botón para votar
                            echo '<form action="votacion/regVotacion.php" method="post" class="d-inline">';
                            echo '<input type="hidden" name="codigoCandidato" value="' . htmlspecialchars($fila['aluCodigo']) . '">';
                            echo '<input type="hidden" name="codigoVotante" value="' . $codigoAlumno . '">';
                            echo '<button type="submit" class="btn btn-primary btn-sm" name="votar">
                                    <i class="bi bi-hand-thumbs-up-fill"></i> Votar
                                  </button>';
                            echo '</form> ';

                            // Botón para ver votación
                            echo '<form action="votacion/verVotacion.php" method="post" class="d-inline">';
                            echo '<input type="hidden" name="codigoCandidato" value="' . htmlspecialchars($fila['aluCodigo']) . '">';
                            echo '<input type="hidden" name="codigoVotante" value="' . $codigoAlumno . '">';
                            echo '<button type="submit" class="btn btn-info btn-sm" name="verVotacion">
                                    <i class="bi bi-eye-fill"></i> Ver Votación
                                  </button>';
                            echo '</form>';

                            echo '</td>';
                            echo '</tr>';
                        }

                        echo '</tbody>';
                        echo '</table>';
                        echo '</div>';
                    } else {
                        echo "<div class='alert alert-warning'>No se encontraron candidatos con el valor 'si'.</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger'>Error en la conexión a la base de datos.</div>";
                }
                ?>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    </main>
</body>
</html>
