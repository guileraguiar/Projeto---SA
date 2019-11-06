<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once 'camponetes/header.php';
    ?>
    <a href="index.php?pagina=cadastro"></a>
</head>

<body>
    <?php

    switch ($variable) {
        case 'cadastro':
            require_once '';
            break;

        default:
            # code...
            break;
    }
    ?>
</body>
<footer>
    <?php
    require_once 'camponetes/footer.php';
    ?>
</footer>

</html>