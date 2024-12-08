<?php
require_once 'config/database.php';
require_once 'controllers/PacienteController.php';

$db = (new Database())->getConnection();
$controller = new PacienteController($db);

$message = "";
$paciente = null;

// Verificar si hay un paciente para editar
if (isset($_GET['pacienteID'])) {
    $pacienteID = $_GET['pacienteID'];
    $pacientes = $controller->index();
    foreach ($pacientes as $p) {
        if ($p['pacienteID'] == $pacienteID) {
            $paciente = $p;
            break;
        }
    }
}

// Procesar las solicitudes de creación y actualización
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create'])) {
        $message = $controller->store([
            'apellidos' => $_POST['apellidos'],
            'primerNombre' => $_POST['primerNombre'],
            'fecha' => $_POST['fecha'],
            'sexo' => $_POST['sexo'],
            'peso' => $_POST['peso'],
            'altura' => $_POST['altura'],
            'vacunado' => $_POST['vacunado'],
        ]);
    } elseif (isset($_POST['update'])) {
        $message = $controller->update([
            'pacienteID' => $_POST['pacienteID'],
            'apellidos' => $_POST['apellidos'],
            'primerNombre' => $_POST['primerNombre'],
            'fecha' => $_POST['fecha'],
            'sexo' => $_POST['sexo'],
            'peso' => $_POST['peso'],
            'altura' => $_POST['altura'],
            'vacunado' => $_POST['vacunado'],
        ]);
    }
}

// Procesar eliminación
if (isset($_GET['delete'])) {
    $message = $controller->destroy($_GET['delete']);
    header("Location: index.php?message=" . urlencode($message));
    exit;
}

$pacientes = $controller->index();
if (isset($_GET['message'])) {
    $message = urldecode($_GET['message']);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Pacientes</title>
</head>
<body>
    <h1>Gestión de Pacientes</h1>

    <!-- Mostrar mensaje -->
    <?php if (!empty($message)): ?>
        <p style="color: green;"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>
 
    <!-- Formulario para crear o actualizar -->
    <h2><?= isset($paciente) ? 'Editar Paciente' : 'Agregar Paciente' ?></h2>
    <form method="POST">
        <input type="hidden" name="pacienteID" value="<?= isset($paciente) ? $paciente['pacienteID'] : '' ?>">

        <label>Apellidos:</label>
        <input type="text" name="apellidos" required value="<?= isset($paciente) ? $paciente['apellidos'] : '' ?>">

        <label>Primer Nombre:</label>
        <input type="text" name="primerNombre" required value="<?= isset($paciente) ? $paciente['primerNombre'] : '' ?>">

        <label>Fecha:</label>
        <input type="date" name="fecha" required value="<?= isset($paciente) ? $paciente['fecha'] : '' ?>">

        <label>Sexo:</label>
        <select name="sexo" required>
            <option value="M" <?= isset($paciente) && $paciente['sexo'] == 'M' ? 'selected' : '' ?>>Masculino</option>
            <option value="F" <?= isset($paciente) && $paciente['sexo'] == 'F' ? 'selected' : '' ?>>Femenino</option>
        </select>

        <label>Peso:</label>
        <input type="number" step="0.01" name="peso" required value="<?= isset($paciente) ? $paciente['peso'] : '' ?>">

        <label>Altura:</label>
        <input type="number" step="0.01" name="altura" required value="<?= isset($paciente) ? $paciente['altura'] : '' ?>">

        <label>Vacunado:</label>
        <select name="vacunado" required>
            <option value="Y" <?= isset($paciente) && $paciente['vacunado'] == 'Y' ? 'selected' : '' ?>>Sí</option>
            <option value="N" <?= isset($paciente) && $paciente['vacunado'] == 'N' ? 'selected' : '' ?>>No</option>
        </select>

        <button type="submit" name="create">Agregar</button>
        <?php if (isset($paciente)): ?>
            <button type="submit" name="update">Actualizar</button>
        <?php endif; ?>
    </form>

    <h2>Listado de Pacientes</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Apellidos</th>
                <th>Primer Nombre</th>
                <th>Fecha</th>
                <th>Sexo</th>
                <th>Peso</th>
                <th>Altura</th>
                <th>Vacunado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pacientes as $paciente): ?>
                <tr>
                    <td><?= $paciente['pacienteID'] ?></td>
                    <td><?= htmlspecialchars($paciente['apellidos']) ?></td>
                    <td><?= htmlspecialchars($paciente['primerNombre']) ?></td>
                    <td><?= htmlspecialchars($paciente['fecha']) ?></td>
                    <td><?= htmlspecialchars($paciente['sexo']) ?></td>
                    <td><?= htmlspecialchars($paciente['peso']) ?></td>
                    <td><?= htmlspecialchars($paciente['altura']) ?></td>
                    <td><?= htmlspecialchars($paciente['vacunado']) ?></td>
                    <td>
                        <a href="index.php?delete=<?= $paciente['pacienteID'] ?>">Eliminar</a>
                        <a href="index.php?pacienteID=<?= $paciente['pacienteID'] ?>">Editar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
