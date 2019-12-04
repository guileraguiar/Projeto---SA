<!DOCTYPE html <?php require_once '../bd/connection_bd.php'; ?>>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bem Vindo</title>
    <!-- CSS //-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/imagem.css">
    <link rel="stylesheet" href="css/gallery.theme.css">
    <link rel="stylesheet" href="css/gallery.min.css">
    <link rel="stylesheet" href="css/typewriter2.css">
    <link rel="stylesheet" href="css/circleImage.css">
    <!-- Fontes //-->
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amaranth&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Jomolhari&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700i&display=swap" rel="stylesheet">
    <!-- Importação JS //-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="js/typewriter.js"></script>
    <style>
        body {
            cursor: url(images/dwarven_gauntlet.png), default;
            /* document.location.href = ""; no evento onlick */
        }
    </style>
</head>

<header>
    <?php include '../actions/verify/verify_nav.php'; ?>
</header>
<?php
if (!isset($_SESSION['user'])) :
    ?>

    <body class=" bodyIndex fadeInPages backgroundFalse">
    <?php
    endif;
    if (isset($_SESSION['user'])) :
        ?>

        <body class=" bodyIndex fadeInPages backgroundReal">
        <?php
        endif;
        $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : null;
        switch ($pagina) {
            case 'menu':
                include '../pages/menu.php';
                break;
            case 'Issues':
                include '../pages/knownIssues.php';
                break;
            case 'games':
                include '../pages/TheGame.php';
                break;
            case 'AV1':
                include '../pages/pageAV1.php';
                break;
            case 'AV2':
                include '../pages/pageAV2.php';
                break;
            case 'login':
                include '../pages/user/login_page.php';
                break;
            case 'register':
                include '../pages/user/register_page.php';
                break;
            case 'viewUsers':
                include '../pages/user/tables/table_user.php';
                break;
            case 'account':
                include '../pages/user/view/user_profile.php';
                break;
            case 'alterPass':
                include '../pages/user/alter_pass.php';
                break;
            case 'pageWiki':
                include '../pages/user/wiki_pageOne.php';
                break;
            case 'pageWiki2':
                include '../pages/user/wiki_pageTwo.php';
                break;
            case 'pageWiki3':
                include '../pages/user/wiki_pageThree.php';
                break;
            case 'controlsPage':
                include '../pages/user/controls_page.php';
                break;
            case 'prepared':
                include '../pages/user/prepared.php';
                break;
            case 'alterUsersTable':
                include '../pages/user/tables/alterUsers.php';
                break;
            case 'historyGame':
                include '../pages/user/historyGame.php';
                break;
            default:
                include '../pages/initial.php';
                break;
        }
        ?>
        </body>
        <div class="py-3 bg-dark fonteNavNav footer">
            <div class="text-center">
                <a class="navbar-brand" href="?pagina=menu"><img src="images/logo.png" width="80px"> </a>
                <small> &copy;2018 SteelFreak™</small>
                <a class="navbar-brand" target="_blank" title="Facebook SteelFreak" href="https://www.facebook.com/SteelFreak-106772890807670/"><img src="images/facebookIcon.png" width="80px"> </a>
                <a class="navbar-brand" target="_blank" title="Twitter SteelFreak" href="https://twitter.com/freak_steel"><img src="images/original.png" width="80px"> </a>
            </div>
        </div>
        </div>

</html>