

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
    <img src="images/logo3.png" style=" margin-bottom:20px; margin-top:20px; " class="mx-auto d-block" alt=""height="300" width="300">
    <div class="container fundoBackground fundobranco" style="width:1200; margin-bottom:50px;">

            <h1 class="gameName">Agonizing Village 2</h1>
                <img src="images/pageGames/AV2/LogoAV2.png" style=" margin-bottom:20px; margin-top:20px; " class="mx-auto d-block" alt=""height="500" width="500">

                
                <div id="carouselExampleIndicators" href="#carousel-1" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                        </ol>
                        <div class="carousel-inner">

                            <div class="carousel-item active">
                            <img class="d-block w-75" src="images/pageGames/AV2/LoginAV2.png" alt="AV2">                            
                            <div class="carousel-caption d-none d-md-block">
                            </div>
                            </div>
                            
                            <div class="carousel-item">
                            <img class="d-block w-75" src="images/pageGames/AV2/MenuAV2.png" alt="AV2">                            
                            <div class="carousel-caption d-none d-md-block">
                            <h5>Menu</h5>
                            </div>
                            </div>

                            <div class="carousel-item">
                            <img class="d-block w-75" src="images/pageGames/AV2/CidadeAV2.png" alt="AV2">
                            <div class="carousel-caption d-none d-md-block">
                            <h5>Cidade Principal de AV2</h5>
                            </div>
                            </div>

                            <div class="carousel-item">
                            <img class="d-block w-75" src="images/pageGames/AV2/CavernaUmAV2.jpg" alt="AV2">                            
                            <div class="carousel-caption d-none d-md-block">
                            <h5>Caverna de AV2</h5>
                            </div>
                            </div>

                            <div class="carousel-item">
                            <img class="d-block w-75" src="images/pageGames/AV2/CavernaDoisAV2.jpg" alt="AV2">                            
                            <div class="carousel-caption d-none d-md-block">
                            <h5>Caverna de AV2</h5>
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

                        <p class="sinopse">Baixar Agonizing Village 2</p>
                        <a href="https://drive.google.com/file/d/1pxB1Gh4hM3oHxGoi75yHR7POxfzORBiX/view?usp=sharing"
                         style="margin-bottom:20px" target="_blank" class="btn btn-light mx-auto d-block fonteLabel">Baixar!</a>
                        
                        <a href="?pagina=games"
                         style="margin-bottom:50px" class="btn btn-light mx-auto d-block fonteLabel">Voltar</a>
                    
                    </div>
</center>
    </div>
<?php endif ?>
