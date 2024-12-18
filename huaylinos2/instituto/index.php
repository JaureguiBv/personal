<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido al Sistema de Gestión</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <header>
        <nav class="navbar bg-body-tertiary fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Continental</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Continental</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php"><i class="bi bi-house "></i>Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="alumnos/create.php"><i class="bi bi-mortarboard"></i>Gestión de Alumnos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="profesores/create.php"><i class="bi bi-person-lock"></i>Gestión de Profesores</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="materias/read.php"><i class="bi bi-book"></i> Gestión de Materias</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="carreras/read.php"><i class="bi bi-cursor-fill"></i> Gestión de Carreras</a>
                            </li>
                            
                        </ul>
                        
                    </div>
                </div>
            </div>
        </nav>
        
    </header>

    <main>
        
    </main>

    <footer>
        <p>&copy; 2024 Sistema de Gestión de Datos</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>