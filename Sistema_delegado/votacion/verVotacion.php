<?php
include("../conexion.php");
include ("../inc/meta.php");

// Consulta para obtener el total de votos por candidato junto con su nombre y apellido
$queryCandidates = "
    SELECT 
        tblalumnos.aluCodigo AS codCandidato,
        tblalumnos.aluNombre,
        tblalumnos.aluApellido,
        COUNT(votaciones.codCandidato) AS totalVotaciones
    FROM 
        votaciones
    JOIN 
        tblalumnos ON votaciones.codCandidato = tblalumnos.aluCodigo 
    GROUP BY 
        tblalumnos.aluCodigo
";

// Consulta para contar el total de votos
$queryTotal = "SELECT COUNT(*) AS totalVotaciones FROM votaciones";
$resultTotal = mysqli_query($conn, $queryTotal);
$rowTotal = mysqli_fetch_assoc($resultTotal);
$totalVotacionesGlobal = $rowTotal['totalVotaciones'];

$resultCandidates = mysqli_query($conn, $queryCandidates);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("../inc/meta.php"); ?>
    <title>Resultados de Votación</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Resultados de Votación</h1>

        <!-- Tabla de resultados -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Código del Candidato</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Total de Votos</th>
                        <th>Porcentaje</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($resultCandidates && mysqli_num_rows($resultCandidates) > 0) {
                        while ($row = mysqli_fetch_assoc($resultCandidates)) {
                            $codigoCandidato = htmlspecialchars($row['codCandidato']);
                            $nombreCandidato = htmlspecialchars($row['aluNombre']);
                            $apellidoCandidato = htmlspecialchars($row['aluApellido']);
                            $totalCandidato = $row['totalVotaciones'];

                            // Calcular porcentaje
                            $porcentaje = $totalVotacionesGlobal > 0 ? ($totalCandidato / $totalVotacionesGlobal) * 100 : 0;

                            echo "<tr>
                                    <td>$codigoCandidato</td>
                                    <td>$nombreCandidato</td>
                                    <td>$apellidoCandidato</td>
                                    <td>$totalCandidato</td>
                                    <td>" . number_format($porcentaje, 2) . "%</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='text-center'>No se encontraron resultados.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Si no hay resultados, mostrar un mensaje -->
        <?php if (!$resultCandidates || mysqli_num_rows($resultCandidates) == 0): ?>
            <div class="alert alert-warning text-center">
                No se encontraron candidatos con votos registrados.
            </div>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS (Opcional, si se desea usar componentes interactivos como modales o tooltips) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
