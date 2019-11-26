<?php
if (isset($_SESSION['user'])) {
    $userSession = $_SESSION['user'];

    if (isset($userSession)) {
        $select = mysqli_query($conexao, "SELECT u_user FROM users WHERE u_user = " . $userSession["u_user"] . "");
    }
}
if (!isset($_SESSION['user'])) :
    ?>
    <div class="container fundobranco" style="width:750px; margin-bottom:50px;">
        <center style="margin-top:50px;">
            <h1>Bem Vindo!</h1>
        </center>
        <center>
            <div class="containerBranco" style="width:600px; margin-top:50px; margin-bottom:50px;">
                <br>
                <center>
                    <h4>Já tem a sua conta? Não? Crie agora!</h4>
                </center>
                <a href="index.php?pagina=register" class="btn btn-dark">Cadastrar</a>
                <br>
                <center>
                    <h4>Calma lá, você já tem? Então entre agora!</h4>
                </center>
                <a href="index.php?pagina=login" class="btn btn-dark">Login</a>
                <br>
                <br>
                <center>
                    <h4>Dúvidas sobre o funcionamento das batalhas? Comece com uma simples demonstração agora mesmo!</h4>
                </center>
                <a href="index.php?pagina=x" class="btn btn-dark">Introdução</a>
                </form>
                <br>
            </div>
            <br>
            <br>
            <br>
            <center>
                <h5>Você Sabia?</h5>
            </center>
            <center>
                <p style="color:white; font-family: 'Courgette', cursive;">O jogo Agonizing Village 2 foi inspirado em The Witcher 3, tanto com o
                    nome do personagem Geraldo do Rio(Geralt of Rivia), como também, o seu ambiente, totalmente inspirado no game.
                </p>
            </center>
            <br>
            <br>
            <br>
            <center>
                <h5>Você Sabia?</h5>
            </center>
            <center>
                <p style="color:white; font-family: 'Courgette', cursive;">A logo de Agonizing Village 2 é uma referência ao seu jogo
                    anterior (Agonizing Village), referindo-se ao lobo Fenrir, na qual Fenrir estava em apuros, e você poderia decidir se iria salva-lo, ou deixa-lo sozinho
                    em seu sofrimento...
                </p><img style="width:300px;" src="images/logoav2.png" alt="">
            </center>
    </div>
<?php
endif;
?>