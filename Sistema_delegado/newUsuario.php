<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("inc/meta.php") ?>
    <title>Añadir Alumno</title>
    <link rel="stylesheet" href="css/newUsuario.css">

</head>
<body>
    <header class="cabecera">
    
    </header>
    
    <main>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3 class="text-center mb-4">Formulario de Registro</h3>
                <form action="crudUsuarios/read.php" method="POST">
                    <!-- Campo Código -->
                    <div class="container mt-5">
                        <div class="mb-3">
                            <label for="codigo" class="form-label">N° de DNI</label>
                            <small id="mensajeError" class="text-danger mt-2" style="display: none;"></small> <!-- Mensaje de error con clase de Bootstrap -->
                            <input type="text" class="form-control rounded-pill shadow-sm" id="dni" name="codigo" placeholder="Ingresa tu código" onchange="validarDNI()" required>
                        </div>
                    </div>

                    <!-- Campo Nombre -->
                    <div class="container mt-5">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <small id="nombreError" class="text-danger mt-2" style="display: none;"></small> <!-- Mensaje de error con clase de Bootstrap -->
                            <input type="text" class="form-control rounded-pill shadow-sm" id="nombre" name="nombre" placeholder="Ingresa tu nombre" onchange="validarLetras()" required>
                        </div>
                    </div>


                    <!-- Campo Apellido -->
                    <div class="container mt-5">
                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido</label>
                            <small id="apellidoError" class="text-danger mt-2" style="display: none;"></small> <!-- Mensaje de error con clase de Bootstrap -->
                            <input type="text" class="form-control rounded-pill shadow-sm" id="apellido" name="apellido" placeholder="Ingresa tu apellido" onchange="validarApellido()" required>
                        </div>
                    </div>

                    <div class="container mt-5">
                        <div class="mb-3">
                            <label for="respuesta" class="form-label">¿Serás candidato?</label >
                            <select class="form-select" id="candidato" name="candidato" required>
                                <option value="" disabled selected>Selecciona una opción</option>
                                <option value="si">Sí</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>

                    <!-- Campo Usuario -->
                    <div class="container mt-5">
                        <div class="mb-3">
                            <label for="usuario" class="form-label">Usuario</label>
                            <small id="emailError" class=" mt-2" style="display: none;"></small> <!-- Mensaje de error con clase de Bootstrap -->
                            <input type="email" class="form-control rounded-pill shadow-sm" id="email" name="usuario" placeholder="Ingresa tu usuario" oninput="validarGmail()" required>
                        </div>
                    </div>

                    <!-- Campo Contraseña -->
                    <div class="container mt-5">
                        <div class="mb-3 input-container">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control rounded-pill shadow-sm" id="password" name="password" placeholder="Ingresa tu contraseña" required>
                            <button type="button" id="togglePassword"><i class="bi bi-eye-fill"></i></button>
                        </div>
                    </div>

                    <!-- Botón Enviar -->
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary rounded-pill shadow-sm" name="registrar">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

        

    </main>
    <?php
        include("inc/scripts.php");
    ?>

</body>
</html>