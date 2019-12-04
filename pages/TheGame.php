<?php
if (isset($_SESSION['user'])) {
    $userSession = $_SESSION['user'];

    if (isset($userSession)) {
        $select = mysqli_query($conexao, "SELECT u_user FROM users WHERE u_user = " . $userSession["u_user"] . "");
    }
}
if (!isset($_SESSION['user'])) :
    ?>

<?php
endif;
if (isset($_SESSION['user'])) :
    ?>

    <center>
        <!-- <img src="images/logo3.png" style=" margin-bottom:20px; margin-top:20px; " class="mx-auto d-block" alt=""height="300" width="300"> -->
        <div class="container fundoBackground fundobranco" style="width:1200; margin-bottom:50px;">

            <h1 class="gameName">Agonizing Village 1!</h1>
            <img src="images/pageGames/AV1/LogoAV.png" style=" margin-bottom:20px; margin-top:10px;" height="300" width="300">

            <div id="carouselExampleIndicators" href="#carousel-1" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <img class="d-block w-75" src="images/pageGames/AV1/InicioAV1.png" alt="Inicio">
                        <div class="carousel-caption d-none d-md-block">
                            <h5></h5>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img class="d-block w-75" src="images/pageGames/AV1/CapítuloUmAV1.png" alt="Capítulo">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Tela Capitulo um</h5>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img class="d-block w-75" src="images/pageGames/AV1/GeraldoAV1.png" alt="Geraldo">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Tela Escolha do Apelido</h5>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img class="d-block w-75" src="images/pageGames/AV1/BatalhaAV1.png" alt="Batalha">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Tela Batalha</h5>
                        </div>
                    </div>

                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <p class="sinopse">Texto para colocar a sinopse</p>
            <a href="https://drive.google.com/file/d/1VjjR90bn697hAvDxT2nKDU9pI1igpk2t/view?usp=sharing" style="margin-bottom:50px" target="_blank" class="btn btn-light mx-auto d-block fonteLabel">Baixar!</a>

        </div>

        <div class="container fundoBackground fundobranco" style="width:1200; margin-bottom:50px;">

            <h1 class="gameName">Agonizing Village 2!</h1>
            <img src="images/pageGames/AV2/LogoAV2.png" style=" margin-bottom:20px; margin-top:10px;" height="300" width="300">

            <div id="carouselExampleIndicators" href="#carousel-2" class="carousel slide" data-ride="carouse1">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <img class="d-block w-75" src="images/pageGames/AV1/InicioAV1.png" alt="Inicio">
                        <div class="carousel-caption d-none d-md-block">
                            <h5></h5>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img class="d-block w-75" src="images/pageGames/AV2/CidadeAV2.png" alt="Cidade">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Cidade</h5>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img class="d-block w-75" src="images/pageGames/AV2/CavernaUmAV2.jpg" alt="Caverna">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Caverna</h5>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img class="d-block w-75" src="images/pageGames/AV2/CavernaDoisAV2.jpg" alt="Caverna">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Caverna</h5>
                        </div>
                    </div>

                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <p class="sinopse">Texto para colocar a sinopse</p>
            <a href="https://drive.google.com/file/d/1VjjR90bn697hAvDxT2nKDU9pI1igpk2t/view?usp=sharing" target="_blank" class="btn btn-light mx-auto d-block fonteLabel">Baixar!</a>
        </div>

        <div class="container fundoBackground fundobranco" style="width:1200; margin-bottom:50px;">

            <h1 class="gameName">Agonizing Village 3!</h1>
            <img src="images/pageGames/AV2/LogoAV2.png" style=" margin-bottom:20px; margin-top:10px;" height="300" width="300">

            <div id="carouselExampleIndicators" href="#carousel-2" class="carousel slide" data-ride="carouse1">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <img class="d-block w-75" src="images/pageGames/AV1/InicioAV1.png" alt="Inicio">
                        <div class="carousel-caption d-none d-md-block">
                            <h5></h5>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img class="d-block w-75" src="images/pageGames/AV2/CidadeAV2.png" alt="Cidade">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Cidade</h5>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img class="d-block w-75" src="images/pageGames/AV2/CavernaUmAV2.jpg" alt="Caverna">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Caverna</h5>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img class="d-block w-75" src="images/pageGames/AV2/CavernaDoisAV2.jpg" alt="Caverna">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Caverna</h5>
                        </div>
                    </div>

                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <p class="sinopse">Texto para colocar a sinopse</p>
            <a href="https://drive.google.com/file/d/1VjjR90bn697hAvDxT2nKDU9pI1igpk2t/view?usp=sharing" target="_blank" class="btn btn-light mx-auto d-block fonteLabel">Jogar!</a>
        </div>

    </center>
    </div>
<?php endif ?>