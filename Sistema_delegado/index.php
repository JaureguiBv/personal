<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inicio de Sesión</title>
    <?php
        include("inc/meta.php");
    ?>
    <link rel="stylesheet" href="css/inde.css">
</head>
<body>
    
<div class="fullscreen-center">
        <div class="container form-container">
            <h2 class="form-title has-text-centered mb-4">Sistema Delegados</h2>
            <form action="" method="post">
                <div class="field">
                <?php
                    include("login.php");
                ?>
                    <label for="aluUsuario" class="label">Usuario :<span class="has-text-danger">*</span></label>
                    <div class="control">
                        <input class="input is-primary" type="email" name="usuario" placeholder="Ingrese su usuario"/> 
                    </div>
                </div>
                <div class="field">
                    <label for="aluPassword" class="label">Contraseña :<span class="has-text-danger">*</span></label>
                    <div class="control">
                        <input class="input is-primary" type="password" name="password" placeholder="Ingrese su contraseña"/> 
                    </div>
                </div>
                <button type="submit" name="login" class="button is-primary is-fullwidth mt-3">Iniciar Sesión</button>
                <button  name="login" class="button is-primary is-fullwidth mt-3"><a href="loginDni.php">Iniciar sesión con DNI</a></button>
            </form>
        </div>
    </div>
    <div id="scanner"></div>

    <input type="text" id="dniField" placeholder="DNI escaneado aquí">
    <?php
        include("inc/scripts.php");
    ?>
</body>

</html>
