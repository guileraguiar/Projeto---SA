<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agonizing Village 3.0</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/imagem.css">
    <link href="https://fonts.googleapis.com/css?family=Amaranth&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <?php 
include '../includes/navbar.php';

?>
</head>
<header>

</header>
<body style="background-image: url(http://pm1.narvii.com/6820/7ddf33ce1599382400d041d296b0879cb397447e_00.jpg); ">
    <img src="../images/TITULO.png"class="mx-auto d-block titulo"  alt="">
        <div class="container fundobranco" style="width:500px; ">   
            <form action="../includes/validaCadastro.php" method="post">
                <div class="form-row">
                    <div class="col">    

                        <label for="user" class="text-dark fonteLabel" style="margin-left:190px;">Usuário</label>
                        <input type="text" class="form-control" maxlength="100" placeholder="Usuário" name="user" required><br>

                        <label for="pass" class="text-dark fonteLabel" style="margin-left:200px;">Senha</label>
                        <input type="password" class="form-control" minlength="6" placeholder="Senha" name="pass" required><br>

                        <label for="email" class="text-dark fonteLabel" style="margin-left:200px;">E-mail</label>
                        <input type="email" class="form-control" placeholder="seuemail@exemplo.com" name="email" required><br>

                        <button type="submit" class="btn btn-light mx-auto d-block fonteLabel">Enviar</button>

                    </div>
                </div>
            </form>
    </div>
</body>
</html>