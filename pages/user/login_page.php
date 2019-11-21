 <div class="container fundobranco" style="width:500px;">
     <form action="../actions/login_validate.php" method="post">
         <div class="form-row">
             <div class="col">

                 <center><label for="user" class="text-light fonteLabel">Usuário</label></center>
                 <input type="text" style="width:400px;  height:30px;text-align:center;" class=" mx-auto d-block form-control" maxlength="100" placeholder="Digite seu Usuário" name="user" ><br>

                 <center><label for="pass" class="text-light fonteLabel">Senha</label></center>
                 <input type="password" style="width:400px; height:30px;text-align:center;" class="form-control mx-auto d-block" placeholder="Digite sua Senha" name="pass" ><br>

                 <button type="submit" class="btn btn-light mx-auto d-block fonteLabel" name="logar" value="logar">Entrar</button>
                 <br>
                 <?php 
                    $erro = (isset($_GET['erro'])) ? $_GET['erro'] : null;
                    if (isset($erro)) {
                        switch ($erro) {
                            case 1:
                                $msg = "Usuário preenchido incorretamente!";
                                break;
                            case 2:
                                $msg = "Campo senha preenchido incorretamente!";
                                break;
                        default:
                            $msg = "sucesso!";
                            break;
                        break;
                        }
                        if (isset($msg)) {
                            echo "<div class='alert alert-danger' role='alert'>
                            " . $msg . "
                            </div>";
                        }
                    }            
                 ?>
             </div>
         </div>
     </form>
     <p class="text-center text-danger">
     </p>
 </div>