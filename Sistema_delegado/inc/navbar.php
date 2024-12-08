<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a href="usuario.php" class="navbar-item">
        Inicio
      </a>

      
      <a href="bienvenido.php" class="navbar-item">
        Ver candidatos
      </a>

      
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">
            <i class="bi bi-person-circle"></i> <?php echo $_SESSION['aluNombre'] ?>
            </a>

            <div class="navbar-dropdown">
            <a href="logout.php   " class="navbar-item">
            <strong>Cerrar Sesión</strong>
            </a>
            
        </div>
      </div>
          
        </div>
      </div>
    </div>
  </div>
</nav>