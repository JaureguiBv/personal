<?php
include("sesiones/iniSesion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('inc/meta.php'); ?>
    <title>Editar Usuario</title>
</head>
<body>
    <header>
    <?php include('inc/navbar.php'); ?>

    </header>
<main class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
    <section class="update w-50">
        <h1 class="text-center mb-4">Editar Candidato</h1>
        <?php
        // Este es update2.php
        if (isset($_POST['codigo'])) {
            // Primero, obtén el código del alumno
            $codigo = trim($_POST['codigo']);
            
            include("conexion.php");
            $consulta = "SELECT * FROM tblalumnos WHERE aluCodigo = '$codigo'";
            $resultado = mysqli_query($conn, $consulta);
            $alumno = mysqli_fetch_assoc($resultado);

            if ($alumno) {
                ?>
                <form method="POST" action="crudUsuarios/regUpdate.php" class="bg-light p-4 border rounded">
                    <input type="hidden" name="codigo_original" value="<?php echo htmlspecialchars($alumno['aluCodigo']); ?>">
                    <div class="form-group">
                        <label for="codigo">Código:</label>
                        <small id="mensajeError" class="text-danger mt-2" style="display: none;"></small> <!-- Mensaje de error con clase de Bootstrap -->
                        <input type="text" class="form-control" id="dni" name="codigo" value="<?php echo htmlspecialchars($alumno['aluCodigo']); ?>" onchange="validarDNI()" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <small id="nombreError" class="text-danger mt-2" style="display: none;"></small> <!-- Mensaje de error con clase de Bootstrap -->
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($alumno['aluNombre']); ?>" onchange="validarLetras()" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido:</label>
                        <small id="apellidoError" class="text-danger mt-2" style="display: none;"></small> <!-- Mensaje de error con clase de Bootstrap -->
                        <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo htmlspecialchars($alumno['aluApellido']); ?>" onchange="validarApellido()" required>
                    </div>
                    <div class="form-group">
                        <label for="candidato">Candidato:</label>
                        <input type="text" class="form-control" id="candidato" name="candidato" value="<?php echo htmlspecialchars($alumno['aluCandidato']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="usuario">Usuario:</label>
                        <small id="emailError" class=" mt-2" style="display: none;"></small> <!-- Mensaje de error con clase de Bootstrap -->
                        <input type="text" class="form-control" id="email" name="usuario" value="<?php echo htmlspecialchars($alumno['aluUsuario']); ?>" oninput="validarGmail()" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña Nueva:</label>
                        <input type="text" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" name="editar" class="btn btn-primary btn-block">Actualizar</button>
                </form>

                <?php
            } else {
                echo "<div class='alert alert-danger mt-3'>Alumno no encontrado.</div>";
            }
        } else {
            echo "<div class='alert alert-warning'>Código no recibido.</div>";
        }
        ?>
    </section>
</main>

        <?php  include('inc/scripts.php'); ?>

</body>
</html>
