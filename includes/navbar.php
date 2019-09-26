<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Navbar</title>
    </head>
    <body>
       <!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark info-color colortonav">
  <a class="navbar-brand" href="#"><img src="../../images/logo.png" width="150px"</img></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link" href="http://localhost/SteelFreak/menu.php">
          <i class="fab fa-facebook-f"></i> Menu
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/SteelFreak/pages/user/register_page.php">
        <!-- index.php?pagina=orcamentos -->
          <i class="fab fa-facebook-f"></i> Cadastro
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/SteelFreak/pages/user/login_page.php">
          <i class="fab fa-facebook-f"></i> Login
        </a>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="true">
          <i class="fas fa-user"></i> Perfil </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
          <a class="dropdown-item" href="#">Minha Conta</a>
          <a class="dropdown-item" href="#">Meu Personagem</a>
          <a class="dropdown-item" href="#">Log out</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<!--/.Navbar -->
    </body>
</html>