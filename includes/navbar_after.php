<?php
if (isset($userSession)) {
  $select = mysqli_query($conexao, "SELECT u_user FROM users WHERE u_user = " . $userSession["u_user"] . "");
}
?>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark flex-nowrap">
  <a class="navbar-brand" href="?pagina=menu"><img src="images/logo.png" width="80px"> </a> <button class="navbar-toggler mr-2" type="button" data-toggle="collapse" data-target="#navbar5">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php?pagina=menu">
          <i class="fab fa-facebook-f"></i> Menu
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?pagina=games">
          <i class="fab fa-facebook-f"></i> Games
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item dropdown clicavel">
        <a class="nav-link dropdown-toggle clicavel " id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user "></i><?php echo $userSession["u_user"]; ?></a>
        <div class="dropdown-menu dropdown-menu-right dropdown-info clicavel" aria-labelledby="navbarDropdownMenuLink-4">
          <a class="dropdown-item" href="index.php?pagina=account">Minha Conta</a>
          <a class="dropdown-item" href="http://localhost/SteelFreak/actions/logout.php">Log out</a>
        </div>
      </li>
    </ul>
  </div>
</nav>