<?php 
session_start();
    include '../../bd/connection_bd.php';
    include '../../includes/header.php';
    include '../../includes/navbar.php';

?>
<html>
    <body class="fadeInPages" style="background-size: 100%;background-image: url(../../images/fundo.png); ">
        <img src="../../images/TITULO.png"class="mx-auto d-block titulo"  alt="">    
        <div class="container fundobranco" style="width:1000px;">   
            <form action="http://localhost/SteelFreak/actions/char_validate.php" enctype="multipart/form-data" method="post">
                <div class="form-row">
                    <div class="col">    
                        <center><label for="user" class="text-light fonteLabel">Apelido</label></center>
                        <input type="text" class="form-control" maxlength="10" placeholder="ex: NoobMaster69" name="nickname" required width="10px"><br>
                        <center><label for="user" class="text-light fonteLabel">Escolha sua Raça</label></center>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Opções de Raça</label>
                                </div>
                                <select class="custom-select" for="raca" id="inputGroupSelect01" name="raca" required>
                                <option selected value="">Escolher...</option>
                                <option value="elfo">Elfo (Dano Verdadeiro)</option>
                                <option value="orc">Orc (Tanque)</option>
                                <option value="mago">Mago (Dano Mágico)</option>
                                <option value="humano">Humano (Flex)</option>
                                </select>
                            </div>
                            <center><label for="foto" class="text-light fonteLabel">Escolha a sua foto de perfil</label></center>
                            <div class="card-deck">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <input type="file" name="foto-personagem" class="btn btn-light mx-auto d-block">
                                    </div>
                                </div>
                            </div>
                            <br>
                        <button type="submit" name="enviar" class="btn btn-light mx-auto d-block fonteLabel">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>