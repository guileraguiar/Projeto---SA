<!-- <img src="images/logoav3.png" class="mx-auto d-block" alt="" height="200" width="200"> -->
<?php
if (isset($_SESSION['user'])) {
    $userSession = $_SESSION['user'];

    if (isset($userSession)) {
        $select = mysqli_query($conexao, "SELECT u_user FROM users WHERE u_user = " . $userSession["u_user"] . "");
    }
}
?>
<div class="mt-5 mb-5">
    <img src="images/skull.gif" class="mx-auto d-block" alt="" height="300" width="240">
</div>
<?php if(!isset($userSession)):?>
<div class="container" style="text-align:center;">
    <div class="fundobranco2 profileBTxt blockWiki6">
        <center>
            <h3 style="color:yellow;">MAIS QUE PREPARADO</h3>
        </center>
        <p class="borderText textPosition">Você, após de ler todos os dados sobre o jogo, conhecer a história, os atributos, controles e um pouco sobre a vida de Geraldo do rio, está mais que na hora de criar sua conta no nosso site, encorajar-se como um grande bruxo e ir atrás do curioso paradeiro que está tomando conta de rettferdighet, por isso, vá, e mate todos os inimigos que surgirem para impedir seu trajeto, pois você está mais que preparado, LUTE!!</p>
        <div class="row p-4">
            <div class="col">
                <a href="?pagina=controlsPage" class="proximo" style="color:yellow;">Voltar</a>
            </div>
            <div class="col">
                <a href="?pagina=registerPage" class="proximo" style="color:yellow;">Cadastrar-se</a>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<?php if(isset($userSession)):?>
<div class="container" style="text-align:center;">
    <div class="fundobranco2 profileBTxt blockWiki6">
        <center>
            <h3 style="color:yellow;">MAIS QUE PREPARADO</h3>
        </center>
        <p class="borderText textPosition">Após ler todos os dados sobre o jogo, conhecer a história, os atributos, controles e um pouco sobre a vida de Geraldo do rio, está mais que na hora de  encorajar-se como um grande bruxo e ir atrás do curioso paradeiro que está tomando conta de Rettferdighet, por isso, vá, e mate todos os inimigos que surgirem para impedir sua trajetória, e não se esqueça de suas poções, pois você está mais que preparado, LUTE!!</p>
        <div class="row p-4">
            <div class="col">
                <a href="?pagina=controlsPage" class="proximo" style="color:yellow;">Voltar</a>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>