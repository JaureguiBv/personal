<?php
include("../conexion.php");

if (isset($_POST['votar'])) {
    if (strlen($_POST['codigoCandidato']) >= 1 && strlen($_POST['codigoVotante']) >= 1) {
        $codigoCandidato = trim($_POST['codigoCandidato']);
        $codigoVotante = trim($_POST['codigoVotante']);

        // Verificar si el votante ya ha votado
        $checkVoteQuery = "
            SELECT COUNT(*) AS hasVoted
            FROM votaciones
            WHERE codVotante = '$codigoVotante'
        ";
        $checkVoteResult = mysqli_query($conn, $checkVoteQuery);
        $voteRow = mysqli_fetch_assoc($checkVoteResult);

        if ($voteRow['hasVoted'] > 0) {
            echo "<div class='alert alert-warning'>Ya has votado una vez. No puedes votar nuevamente.</div>";
        } else {
            // Inserta el nuevo voto
            $consulta = "
                INSERT INTO votaciones (codCandidato, codVotante)
                SELECT aluCodigo, '$codigoVotante'
                FROM tblalumnos
                WHERE aluCandidato = 'si' AND aluCodigo = '$codigoCandidato'
            ";
            $resultado = mysqli_query($conn, $consulta);

            if ($resultado) {
                // Contar los votos por el candidato y guardar en una variable
                $queryCount = "SELECT COUNT(*) AS totalVotaciones FROM votaciones WHERE codCandidato = '$codigoCandidato'";
                $resultCount = mysqli_query($conn, $queryCount);
                $row = mysqli_fetch_assoc($resultCount);
                $totalVotaciones = $row['totalVotaciones']; // Guarda el total en una variable

                // Redireccionar a la página de bienvenida
                header("Location: ../bienvenido.php");
                exit();
            } else {
                echo "<div class='alert alert-danger'>ERROR: " . mysqli_error($conn) . "</div>";
            }
        }
    } else {
        echo "<div class='alert alert-warning'>Todos los campos son obligatorios.</div>";
    }
}
?>
