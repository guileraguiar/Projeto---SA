<?php
session_start();

?>    
    <?php 
        include '../../includes/navbar_after.php';
        require '../../includes/header.php';
?>
<body class="fadeInPages" style="background-size: 100%;background-image: url(../../images/fundo.png); ">
    <img src="../../images/TITULO.png"class="mx-auto d-block titulo"  alt="">  

    <div class="container fundobranco" style="width:500px;">   
        <center><h1>Renomear <br> Usuário</h1></center>
            <form action="../../actions/login_validate.php"  method="post">
                <div class="form-row">
                    <div class="col">    

                            <center><label for="user" class="text-light fonteLabel">Usuário</label></center>
                            <input type="text" style="width:400px;  height:30px;text-align:center;" class=" mx-auto d-block form-control" maxlength="100" placeholder="Usuário" name="user" required><br>
                
                            <center><label for="pass"  class="text-light fonteLabel">Senha</label></center>
                            <input type="password" style="width:400px; height:30px;text-align:center;" class="form-control mx-auto d-block" minlength="6" placeholder="Senha" name="pass" required><br>

                        <button type="submit" class="btn btn-light mx-auto d-block fonteLabel" name="editar">Enviar</button>
                        <br>
                        <button type="reset" class="btn btn-light mx-auto d-block fonteLabel" name="cancel" href="http://localhost/SteelFreak/menu.php">Cancelar</button>
                    </div>
                </form>
                </p>
        </div>
        
    <!--    <div class="py-3 bg-dark text-white-50 footer">//-->
    <!--    <div class="text-center">//-->
    <!--      <small>Copyright &copy; SteelFreak™</small>//-->
    <!--    </div>//-->
    <!--</div>//-->
    </body>
</html>