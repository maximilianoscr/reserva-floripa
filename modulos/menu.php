<nav class="navbar navbar-expand-lg navbar-light fondoNavbar  static-top">
  <div class="container">
    <a class="navbar-brand" href="https://www.reserva-web.com/reserva/modulos/">
      <img src="../public/img/logo.png" alt="..." height="40">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span  class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <?
        if(!$inicio){
        ?>
        <li class="nav-item">
          <a class="nav-link active colorLetra" aria-current="page" href="/reserva/modulos/">
            <i class="fa-solid fa-house-laptop"></i> Inicio
          </a>
        </li>
        <?}?>
        <li class="nav-item">
          <a class="nav-link active colorLetra" href="reservas.php">
            <i class="fa-solid fa-calendar-days"></i> Reservas
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active colorLetra" href="departamentos.php">
            <i class="fa-solid fa-list-check"></i> Departamentos
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active colorLetra" href="clientes.php">
            <i class="fa-regular fa-address-book"></i>
            <i class="bi bi-person-lines-fill"></i>Clientes
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active colorLetra" href="propietarios.php">
            <i class="fa-regular fa-address-book"></i>
            <i class="bi bi-person-lines-fill"></i>Propietarios
          </a>
        </li>
        <li class="nav-item dropdown">
          <a style="color:red" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-circle-user"></i> <?php echo $_SESSION['usuario']; ?>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li>
              <a class="dropdown-item" href="../servidor/login/logout.php">
                <i class="fa-solid fa-right-from-bracket"></i> Salir del sistema
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>