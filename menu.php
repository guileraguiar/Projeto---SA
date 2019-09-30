<!DOCTYPE html>
<html lang="en">
<!-- sucesso ao cadastrar-->
<?php
session_start();

if(isset($_SESSION['userLogado'])){
	include('Location:actions/login_validate.php');
}else{
    include 'pages/user/login_page.php';
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu</title>
    <!-- CSS //-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/imagem.css">
   
    <!-- Fontes //-->
    <link href="https://fonts.googleapis.com/css?family=Amaranth&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" rel="stylesheet">
    
    <!-- Icone //-->
    <link rel="apple-touch-icon" sizes="60x60" href="images/logo/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/logo/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="57x57" href="images/logo/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="76x76" href="images/logo/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/logo/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="images/logo/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="images/logo/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="images/logo/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="images/logo/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="images/logo/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/logo/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="images/logo/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/logo/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    
    <!-- Importação JS //-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<?php 
    include 'includes/navbar.php';
    if(isset($_GET["code"])){
        $erro = $_GET["code"];
        
            if($erro == 777){
                echo "<script>alert('Login efetuado com sucesso!!');</script>";
            }
        }
?>

</head>
<body style="background-image: url(images/fundo.png); ">
<img src="images/TITULO.png"class="mx-auto d-block titulo"  alt=""> 
    <div class="container fundobranco" style="width:1000px; margin-bottom:50px;">
        <br>
        <center><h4>Já tem a sua conta? Não? Crie agora!</h4></center>
        <form action="http://localhost/SteelFreak/pages/user/register_page.php">
        <button type="onclick" class="btn btn-light mx-auto d-block" href="http://localhost/SteelFreak/pages/user/register_page.php">Cadastrar</button>
            <br>
        </form>
        <form action="http://localhost/SteelFreak/pages/user/login_page.php">
        <center><h4>Calma lá, você já tem? Então entre agora!</h4></center>
        <button type="submit" class="btn btn-light mx-auto d-block" href="http://localhost/SteelFreak/pages/user/login_page.php">Login</button>
        </form>
        <br>
    </div>
</body>
<div class="py-2 bg-dark text-white-50 footer">
    <div class="text-center">
      <small>Copyright &copy; SteelFreak™</small>
    </div>
  </div>
</html>