<?php
session_start();
require_once 'bd/connection_bd.php';

$userSession = $_SESSION['user'];
if(isset($userSession)): 
$select = mysqli_query($conexao,"SELECT * FROM characters WHERE u_user = ".$userSession["c_nickname"]."");

?>
<!DOCTYPE html>
<html lang="pt-BR">
<?php include 'includes/header.php' ?>
<body class="fadeIn" style="background-size: 100%;background-image:; ">
    <img src="images/TITULO.png" class="mx-auto d-block titulo" alt="">
    <div class="container fundobranco w-75" style="border-radius:3px; margin-bottom:20px">
        <div class="row">
            <div class="col-sm" style="margin:20px;">
                <div class="card " style="width: 20rem;">
                    <img class="card-img-top" src="https://i.ytimg.com/vi/BHPMFXfPNCA/hqdefault.jpg" heith="50" width="100" alt="Imagem de capa do card">
                    <p class="battletxt">Nome:<?php echo $userSession["c_nickname"] ?></p>
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
<?php endif;?>
</html>