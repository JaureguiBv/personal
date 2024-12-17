<?php
include 'db.php';

if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];

    // Obtener el soldado actual
    $sql = "SELECT * FROM Soldado WHERE Codigo_Soldado = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$codigo]);
    $soldado = $stmt->fetch(PDO::FETCH_ASSOC);

    // Obtener los valores para los selects
    $cuerpos = $conn->query("SELECT * FROM Cuerpo");
    $companias = $conn->query("SELECT * FROM Compania");
    $cuarteles = $conn->query("SELECT * FROM Cuartel");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Obtener los datos del formulario
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $grado = $_POST['grado'];
        $codigoCuerpo = $_POST['codigoCuerpo'];
        $numeroCompania = $_POST['numeroCompania'];
        $codigoCuartel = $_POST['codigoCuartel'];

        // Actualizar el soldado en la base de datos
        $sql = "UPDATE Soldado SET Nombre = ?, Apellidos = ?, Grado = ?, Codigo_Cuerpo = ?, Numero_Compania = ?, Codigo_Cuartel = ?
                WHERE Codigo_Soldado = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nombre, $apellidos, $grado, $codigoCuerpo, $numeroCompania, $codigoCuartel, $codigo]);
        header("location: index.php");
        echo "Soldado actualizado exitosamente!";
    }
}
?>

<form action="editar_soldado.php?codigo=<?= $soldado['Codigo_Soldado'] ?>" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nom" onchange="validarNombre()" value="<?= $soldado['Nombre'] ?>" required><br>

    <label for="apellidos">Apellidos:</label>
    <input type="text" name="apellidos" id="ape" onchange="validarApellido()" value="<?= $soldado['Apellidos'] ?>" required><br>

    <label for="grado">Grado:</label>
    <input type="text" name="grado" id="car" onchange="validarCargo()" value="<?= $soldado['Grado'] ?>" required><br>

    <!-- Select para Cuerpo -->
    <label for="codigoCuerpo">Cuerpo:</label>
    <select name="codigoCuerpo" required>
        <option value="">Seleccione un cuerpo</option>
        <?php while ($cuerpo = $cuerpos->fetch(PDO::FETCH_ASSOC)) { ?>
            <option value="<?= $cuerpo['Codigo_Cuerpo'] ?>" <?= $soldado['Codigo_Cuerpo'] == $cuerpo['Codigo_Cuerpo'] ? 'selected' : '' ?>>
                <?= $cuerpo['Denominacion'] ?>
            </option>
        <?php } ?>
    </select><br>

    <!-- Select para Compañía -->
    <label for="numeroCompania">Compañía:</label>
    <select name="numeroCompania" required>
        <option value="">Seleccione una compañía</option>
        <?php while ($compania = $companias->fetch(PDO::FETCH_ASSOC)) { ?>
            <option value="<?= $compania['Numero_Compania'] ?>" <?= $soldado['Numero_Compania'] == $compania['Numero_Compania'] ? 'selected' : '' ?>>
                <?= $compania['Actividad_Principal'] ?>
            </option>
        <?php } ?>
    </select><br>

    <!-- Select para Cuartel -->
    <label for="codigoCuartel">Cuartel:</label>
    <select name="codigoCuartel" required>
        <option value="">Seleccione un cuartel</option>
        <?php while ($cuartel = $cuarteles->fetch(PDO::FETCH_ASSOC)) { ?>
            <option value="<?= $cuartel['Codigo_Cuartel'] ?>" <?= $soldado['Codigo_Cuartel'] == $cuartel['Codigo_Cuartel'] ? 'selected' : '' ?>>
                <?= $cuartel['Nombre'] ?> - <?= $cuartel['Ubicacion'] ?>
            </option>
        <?php } ?>
    </select><br>

    <input type="submit" value="Actualizar Soldado">
</form>
<script src="valNombree.js"></script>
<script src="valApellidoe.js"></script>
<script src="valCargoe.js"></script>