<?php
include("sesiones/iniSesion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include("inc/meta.php") ?>
    <title>Delegados</title>
    <link rel="stylesheet" href="css/bienvenidos.css">
    <!-- Bootstrap CSS para estilos y diseño responsivo -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilo para que la tabla ocupe todo el ancho de la pantalla */
        body {
            background-color: #f8f9fa;
        }
        .table-container {
            margin: 20px auto;
            width: 100%;
        }
        .table {
            width: 100%;
        }
        .table thead {
            background-color: #007bff;
            color: white;
        }
        .table tbody tr:hover {
            background-color: #f1f1f1;
        }
        .btn {
            font-size: 0.9rem;
        }
        /* Encabezado */
        .cabecera {
            background-color: #007bff;
            padding: 20px;
            color: white;
            text-align: center;
        }
    </style>
</head>
<body>
    <header class="cabecera">
        <?php 
            include("inc/navbar.php");
        ?>
    </header>
    <main class="table-container container-fluid">
        <section class="section">
            <h2 class="text-center my-4">Usuarios</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include("conexion.php");

                        if ($conn) {
                            $consulta = "SELECT * FROM tblalumnos";
                            $resultado = mysqli_query($conn, $consulta);

                            while ($row = mysqli_fetch_assoc($resultado)) {
                                echo '<tr>';
                                echo '<td>' . htmlspecialchars($row['aluCodigo']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['aluNombre']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['aluApellido']) . '</td>';
                                
                                // Acciones de eliminar y editar
                                echo '<td>';
                                echo '<form action="crudUsuarios/delete.php" method="get" style="display:inline;">';
                                echo '<input type="hidden" name="codigo" value="' . htmlspecialchars($row['aluCodigo']) . '">';
                                echo '<button type="submit" class="btn btn-danger btn-sm" name="eliminar"><i class="bi bi-trash3-fill"></i> Eliminar</button>';
                                echo '</form> ';
                                
                                echo '<form action="update.php" method="post" style="display:inline;">';
                                echo '<input type="hidden" name="codigo" value="' . htmlspecialchars($row['aluCodigo']) . '">';
                                echo '<button type="submit" class="btn btn-info btn-sm" name="editar"><i class="bi bi-pencil-fill"></i> Editar</button>';
                                echo '</form>';
                                echo '</td>';

                                echo '</tr>';
                            }
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </section>
        
        <!-- Incluir Bootstrap Icons y JS de Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </main>
</body>
</html>
