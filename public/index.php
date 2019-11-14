<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <!-- CSS //-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/imagem.css">
    <!-- Fontes //-->
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amaranth&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Jomolhari&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700i&display=swap" rel="stylesheet">
    <!-- Importação JS //-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
</head>

<body>
    <header>
        <?php include '../includes/navbar.php'; ?>
    </header>
    <?php


    $pagina = $_GET['pagina'];
    switch ($pagina) {
        case 'menu':
            include '../pages/menu.php';
            break;
        case 'battle':
            include '../pages/user/battle.php';
            break;

        case 'login':
            include '../pages/user/login_page.php';
            break;
        default:
            include '../pages/initial.php';
            break;
    }
    ?>
</body>

</html>