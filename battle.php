<?php
/* navbar */
include 'actions/verify/verify_navMenu.php';
/* Fim navbar */
/* Consulta */
echo "<h1> " . $userSession["id_user"]  . " </h1>";
$select_player = mysqli_query($conexao, "SELECT * FROM characters WHERE c_type = 1 AND users_id_user = '" . $userSession["id_user"] . "'");
$select_bot = mysqli_query($conexao, "SELECT * FROM characters WHERE c_type = 2 AND users_id_user = rand ( 1 , 5 )");

if (!$select_player) {
    die("Falha na consulta do usuario");
} elseif (!$select_player) {
    die("Falha na consulta do boot");
}
/* fimconsulta */
?>
<!DOCTYPE html>
<html lang="pt-BR">
<?php include 'includes/header.php' ?>

<body class="fadeIn battleback" style="">
    <img src="images/TITULO.png" class="mx-auto d-block titulo" alt="">
    <div class="container fundobranco w-75" style="border-radius:3px; margin-bottom:20px">
        <div class="row">
            <?php
            while ($dados = mysqli_fetch_assoc($select_player)) {
                /* var_dump($dados); */
                ?>
                <div class="col-sm" style="margin:20px;">
                    <div class="card " style="width: 20rem;">
                        <img class="card-img-top" src="http://localhost/SteelFreak/images/personagens/<?= $dados['c_picture'] ?>" heith="50" width="100" alt="Imagem de capa do card">
                        <p class="battletxt">Nome: <?= $dados['c_nickname'] ?></p>
                        <p class="battletxt">Lvl: <?= $dados['c_level'] ?></p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item battletxt">
                                <span>ATK:<?= $dados['c_strenght'] ?></span>
                            </li>
                            <li class="list-group-item battletxt">
                                <span>DEF:<?= $dados['c_defense'] ?></span>
                            </li>
                            <li class="list-group-item battletxt">
                                <span>CRIT:<?= $dados['c_crit_chance'] ?></span>
                            </li>
                        </ul>
                        <div class="card-body">
                            <center>
                                <h6 class="card-title battletxt">habilidades</h5>
                            </center>
                            <ul class="list-group list-group-flush">
                                <center>
                                    <li class="list-group-item"><button class="btn btn-secondary" type="" value="">habilidade1</button></li>
                                </center>
                                <center>
                                    <li class="list-group-item"><button class="btn btn-secondary" type="" value="">habilidade2</button></li>
                                </center>
                                <center>
                                    <li class="list-group-item"><button class="btn btn-secondary" type="" value="">habilidade3</button></li>
                                </center>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            <div class="col-sm">
                Uma de três colunas
            </div>
            <div class="col-sm" style="margin:20px;">
                <div class="card " style="width: 20rem;">
                    <img class="card-img-top" src="https://i.ytimg.com/vi/BHPMFXfPNCA/hqdefault.jpg" heith="50" width="100" alt="Imagem de capa do card">
                    <p class="battletxt">Nome:</p>
                    <p class="battletxt">Lvl:</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item battletxt">
                            <span>ATK:</span>
                        </li>
                        <li class="list-group-item battletxt">
                            <span>DEF:</span>
                        </li>
                        <li class="list-group-item battletxt">
                            <span>CRIT:</span>
                        </li>
                    </ul>
                    <div class="card-body">
                        <center>
                            <h6 class="card-title battletxt">habilidades</h5>
                        </center>
                        <ul class="list-group list-group-flush">
                            <center>
                                <li class="list-group-item"><button class="btn btn-secondary" type="" value="">habilidade1</button></li>
                            </center>
                            <center>
                                <li class="list-group-item"><button class="btn btn-secondary" type="" value="">habilidade2</button></li>
                            </center>
                            <center>
                                <li class="list-group-item"><button class="btn btn-secondary" type="" value="">habilidade3</button></li>
                            </center>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php ?>

</html>