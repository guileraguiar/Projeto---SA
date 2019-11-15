<?php
    include '../../includes/header.php';
    include '../../actions/verify/verify_nav.php';
?>
<?php include '../../includes/header.php'; ?>
<html lang="pt-BR" id="altPass">
    <body class="fadeInPages" style="background-image: url(../../images/fundo.png); ">
        <img src="../../images/TITULO.png"class="mx-auto d-block titulo"  alt="">    
        <div class="container fundobranco" style="width:500px;"> 
            <form action="../../actions/alter_pass.php"  method="post">
                <div class="form-row">
                    <div class="col">    

                        <center><label for="user" class="text-light fonteLabel">Senha Atual</label></center>
                        <input type="password" style="width:400px;  height:30px;text-align:center;" class=" mx-auto d-block form-control" maxlength="100" placeholder="Atual senha" name="pass" required><br>

                        <center><label for="pass" class="text-light fonteLabel">Nova senha</label></center>
                        <input type="password" style="width:400px;  height:30px;text-align:center;" class=" mx-auto d-block form-control" maxlength="100" placeholder="Nova senha" name="newPass" required><br>

                        <center><label for="cpass"  class="text-light fonteLabel">Confirmar senha</label></center>
                        <input type="password" style="width:400px; height:30px;text-align:center;" class="form-control mx-auto d-block" minlength="6" placeholder="Confirmar nova senha" name="cNewPass" required><br>
                        
                        <button type="submit" class="btn btn-light mx-auto d-block fonteLabel" name="alterar">Alterar</button>

                    </div>
                </div>
            </form>
        </div>
    </body>
</html>