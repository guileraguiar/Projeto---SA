

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
        <div id="carouselExampleIndicators" href="#carousel-1" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                
                <div class="carousel-item active">
                <img class="d-block w-25" src="images/pageGames/AV1/LogoAV.png" alt="AV1">
                <div class="carousel-caption d-none d-md-block">
                </div>
                </div>

                <div class="carousel-item">
                <img class="d-block w-25" src="images/pageGames/AV2/LogoAV2.png" alt="AV2">
                <div class="carousel-caption d-none d-md-block">
                </div>
                </div>

                <div class="carousel-item">
                <img class="d-block w-25" src="images/logoav3.png" alt="AV3">                            
                <div class="carousel-caption d-none d-md-block">>
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
    
        <div class="container fundoBackground fundobranco" style="width:1200; margin-top:50px; margin-bottom:50px;">

            <p class="sinopse">Baixar <a href="?pagina=AV1" style="text-decoration: underline;">Agonizing Village 1</a></p>
            <a href="https://drive.google.com/file/d/1VjjR90bn697hAvDxT2nKDU9pI1igpk2t/view?usp=sharing"
                style="margin-bottom:50px" target="_blank" class="btn btn-light mx-auto d-block fonteLabel">Baixar!</a>

            <p class="sinopse">Baixar <a href="?pagina=AV2" style="text-decoration: underline;">Agonizing Village 2</a></p>
            <a href="https://drive.google.com/file/d/1pxB1Gh4hM3oHxGoi75yHR7POxfzORBiX/view?usp=sharing"
            style="margin-bottom:50px" target="_blank" class="btn btn-light mx-auto d-block fonteLabel">Baixar!</a>

            <p class="sinopse">Jogar Agonizing Village 3</p>
            <a href="../public/game" style="margin-bottom:50px" target="_blank" class="btn btn-light mx-auto d-block fonteLabel">Jogar!</a>
        
        </div>
</center>
    </div>
<?php endif ?>
