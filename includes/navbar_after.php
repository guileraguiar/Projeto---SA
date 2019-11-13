<!DOCTYPE html>
<?php
$userSession = $_SESSION['user'];
          $conexao = mysqli_connect("localhost", "root", "", "db_agonizingvillage");
          
          if(isset($userSession)){
          
            $select = mysqli_query($conexao,"SELECT u_user FROM users WHERE u_user = ".$userSession["u_user"]."");
          }
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        <title>Navbar</title>
    </head>
    <body>
       <!--Navbar -->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark flex-nowrap">
  <a class="navbar-brand" href="http://localhost/SteelFreak/menu.php"><img src="http://localhost/SteelFreak/images/logo.png" width="80px"</img></a>
  <button class="navbar-toggler mr-2" type="button" data-toggle="collapse" data-target="#navbar5">
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
        <a class="nav-link" href="http://localhost/SteelFreak/pages/battle/menuBatalha.php">
          <i class="fab fa-facebook-f"></i> Batalhas
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle clicavel" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i><?php echo $userSession["u_user"];?></a>
        <div class="dropdown-menu dropdown-menu-right dropdown-info clicavel" aria-labelledby="navbarDropdownMenuLink-4">
          <a class="dropdown-item" href="http://localhost/SteelFreak/pages/user/view/user_profile.php">Minha Conta</a>
          <a class="dropdown-item" href="http://localhost/SteelFreak/pages/user/configurations/config_page.php">Configurações</a>
          <a class="dropdown-item" href="http://localhost/SteelFreak/actions/logout.php">Log out</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<!--/.Navbar -->
    </body>
</html>