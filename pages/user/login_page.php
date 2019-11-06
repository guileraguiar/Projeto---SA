<?php
session_start();
    include '../../includes/header.php';
    include '../../includes/navbar.php';
?>
<body class="fadeInPages" style="background-size: 100%;background-image: url(../../images/fundo.png); ">
    <img src="../../images/TITULO.png"class="mx-auto d-block titulo"  alt="">    
    <div class="container fundobranco" style="width:500px;">   
            <form action="../../actions/login_validate.php"  method="post">
                <div class="form-row">
                    <div class="col">    

                        <center><label for="user" class="text-light fonteLabel">Usuário</label></center>
                        <input type="text" style="width:400px;  height:30px;text-align:center;" class=" mx-auto d-block form-control" maxlength="100" placeholder="Digite seu Usuário" name="user" required><br>
            
                        <center><label for="pass"  class="text-light fonteLabel">Senha</label></center>
                        <input type="password" style="width:400px; height:30px;text-align:center;" class="form-control mx-auto d-block" placeholder="Digite sua Senha" name="pass" required><br>

                        <button type="submit" class="btn btn-light mx-auto d-block fonteLabel" name="logar" value="logar">Entrar</button>
                        <br>
                        <center><p style="color:white;">Esqueceu a senha?<a href="http://localhost/SteelFreak/pages/user/forgot_pass.php"> Clique aqui</a> para recupera-la!</p></center>

                    </div>
                </div>
            </form>
            <p class="text-center text-danger">
            </p>   
        </div>
    </body>
</html>