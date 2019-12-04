<?php
if (isset($_SESSION['user'])) {
    $userSession = $_SESSION['user'];

    if (isset($userSession)) {
        $select = mysqli_query($conexao, "SELECT u_user FROM users WHERE u_user = " . $userSession["u_user"] . "");
    }
}
if (!isset($_SESSION['user'])) :
    ?>
    <img src="images/logoav3.png" style=" margin-bottom:20px; margin-top:20px; " class="mx-auto d-block" alt="" height="300" width="300">
    <div class="container fundoBackground" style="width:750px; margin-bottom:50px;">
        <center style="margin-top:50px;">
            <h1>Bem Vindo Visitante!</h1>
        </center>
        <center>
            <div class="containerBranco" style="width:600px; margin-top:50px; margin-bottom:50px;background-color:#80808099;">
                <br>
                    <h4 class="h44">Já tem a sua conta? Não? Crie agora!</h4>
                <a href="index.php?pagina=register" class="btn btn-light mx-auto d-block fonteLabel" title="Red">Cadastrar</a>
                <br>
                    <h4 class="h44">Calma lá, você já tem? Então entre agora!</h4>
                <a href="index.php?pagina=login" class="btn btn-light mx-auto d-block fonteLabel">Login</a>
                <br>
                <br>
                    <h4 class="h44">Dúvidas sobre o funcionamento do jogo? leia o guia com todos os detalhes!</h4>
                <a href="index.php?pagina=pageWiki" class="btn btn-light mx-auto d-block fonteLabel">Introdução</a>
                <br>
            </div>
    </div>
</center>
    <div class="container fundoBackground" style="width:750px; margin-bottom:50px; ">
        <div>
            <iframe width="600" height="371" src="images\fasasdafa.mp4" frameborder="0" allowfullscreen></iframe>
        </div>
        <img style="width:300px;" src="images/logoav3.png" alt="" style="">
    </div>
<?php
endif;
if (isset($_SESSION['user'])) :
    ?>

    <img id="anim" src="images/logoav3.png" style=" margin-bottom:20px; margin-top:20px; " class="mx-auto d-block" alt="" height="300" width="300">
    <h1 class="mt-5 mb-2">Bem Vindo <?php echo $userSession['u_user']; ?>!</h1>
    <div class="container fundoMenuOn profileBTxt mb-5" style="width:700px;">
        <div>
            <p style="color:black;">
                Experimente agora mesmo nosso jogo!! entre na aba Games, e selecione o jogo Agonizing Village 3, nossa mais nova criação, vinda diretamente das catacumbas de rettferdighet!
            </p>
        </div>
    </div>
    <div class="row" style="margin-left:5%;">
        <div class="BlockDevs containerDevs profileBTxt2">
        <img class="mt-2 mb-3 imgDevs" src="images/developers/felipe.jpg" class="mx-auto d-block" alt=""  height="215" width="250">
            <div class="miniBlock">
                <p>
                    Desenvolvedor js, responsável pela criação do game.
                </p>
            </div>
        </div>
        <div class="BlockDevs containerDevs profileBTxt2">
        <img class="mt-2 mb-3 imgDevs" src="images/developers/alisson.jpg" class="mx-auto d-block" alt=""  height="215" width="250">
            <div class="miniBlock">
                <p>
                    Consultor de helps, auxiliou em todas as partes do projeto.
                </p>
            </div>
        </div>
        <div class="BlockDevs containerDevs profileBTxt2">
            <img class="mt-2 mb-3 imgDevs" src="images/developers/aguiar.jpg" class="mx-auto d-block" alt=""  height="215" width="250">
            <div class="miniBlock">
                <p>
                    Desenvolvedor PHP e Web designer, responsável pela parte visual.
                </p>
            </div>
        </div>
    </div>
    <div class="row" style="margin-left:4%;">
        <div class="BlockDevs containerDevs profileBTxt2" style="margin-left:23%;">
        <img class="mt-2 mb-3 imgDevs" src="images/developers/artur.jpg" class="mx-auto d-block" alt=""  height="215" width="250">
            <div class="miniBlock">
                <p>
                    Desenvolvedor PHP e Web designer, responsável pela construção do site.
                </p>
            </div>
        </div>
        <div class="BlockDevs containerDevs profileBTxt2">
        <img class="mt-2 mb-3 imgDevs" src="images/developers/falcao.jpg" class="mx-auto d-block" alt=""  height="215" width="250">
            <div class="miniBlock">
                <p>
                    Desenvolvedor PHP e tester, responsável pelas bebidas do rolê.
                </p>
            </div>
        </div>
    </div>
<?php endif ?>