<?php
include 'db.php';

// Obtener los cuerpos, compañías, cuarteles y servicios para los selects
$cuerpos = $conn->query("SELECT * FROM Cuerpo");
$companias = $conn->query("SELECT * FROM Compania");
$cuarteles = $conn->query("SELECT * FROM Cuartel");
$servicios = $conn->query("SELECT * FROM Servicio");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $grado = $_POST['grado'];
    $codigoCuerpo = $_POST['codigoCuerpo'];
    $numeroCompania = $_POST['numeroCompania'];
    $codigoCuartel = $_POST['codigoCuartel'];

    // Insertar el soldado en la base de datos
    $sql = "INSERT INTO Soldado (Nombre, Apellidos, Grado, Codigo_Cuerpo, Numero_Compania, Codigo_Cuartel)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nombre, $apellidos, $grado, $codigoCuerpo, $numeroCompania, $codigoCuartel]);
    header("location: index.php");
    echo "Soldado creado exitosamente!";
}
?>

<form action="crear_soldado.php" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nom" onchange="validarNombre()" required><br>

    <label for="apellidos">Apellidos:</label>
    <input type="text" id="ape" name="apellidos" onchange="validarApellido()" required><br>

    <label for="grado">Grado:</label>
    <input type="text" id="car" name="grado" onchange="validarCargo()" required><br>

    <!-- Select para Cuerpo -->
    <label for="codigoCuerpo">Cuerpo:</label>
    <select name="codigoCuerpo" required>
        <option value="">Seleccione un cuerpo</option>
        <?php while ($cuerpo = $cuerpos->fetch(PDO::FETCH_ASSOC)) { ?>
            <option value="<?= $cuerpo['Codigo_Cuerpo'] ?>"><?= $cuerpo['Denominacion'] ?></option>
        <?php } ?>
    </select><br>

    <!-- Select para Compañía -->
    <label for="numeroCompania">Compañía:</label>
    <select name="numeroCompania" required>
        <option value="">Seleccione una compañía</option>
        <?php while ($compania = $companias->fetch(PDO::FETCH_ASSOC)) { ?>
            <option value="<?= $compania['Numero_Compania'] ?>"><?= $compania['Actividad_Principal'] ?></option>
        <?php } ?>
    </select><br>

    <!-- Select para Cuartel -->
    <label for="codigoCuartel">Cuartel:</label>
    <select name="codigoCuartel" required>
        <option value="">Seleccione un cuartel</option>
        <?php while ($cuartel = $cuarteles->fetch(PDO::FETCH_ASSOC)) { ?>
            <option value="<?= $cuartel['Codigo_Cuartel'] ?>"><?= $cuartel['Nombre'] ?> - <?= $cuartel['Ubicacion'] ?></option>
        <?php } ?>
    </select><br>

    <input type="submit" value="Crear Soldado">
</form>
<script src="valNombre.js"></script>
<script src="valApellido.js"></script>
<script src="valCargo.js"></script>
