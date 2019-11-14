<?php
session_start();
    include '../../actions/verify/verify_nav.php';
?>
<?php 
    include '../../includes/header.php';
?>
<html lang="pt-BR">
    <body>
        <div class="container">   
            <form  action="../../actions/validate_equip.php" method="post">
                <div class="form-row">
                    <div class="col">    

                        <label for="armor" class="text-light fonteLabel">Armadura Adicional</label>
                        <input type="text" class="form-control" placeholder="Armadura" name="armor"><br>

                        <label for="attack" class="text-light fonteLabel">Poder de Ataque</label>
                        <input type="text" class="form-control" placeholder="Poder de ataque" name="attack"><br>
                        
                        <label for="life" class="text-light fonteLabel">Vida adicional</label>
                        <input type="text" class="form-control" placeholder="Vida Adicional" name="life"><br>

                        <label for="energy" class="text-light fonteLabel">Energia</label>
                        <input type="text" class="form-control" placeholder="Energia" name="energy"><br>

                        <label for="crit" class="text-light fonteLabel">Chance de Crítico</label>
                        <input type="text" class="form-control" placeholder="Chance de Crítico" name="crit"><br>

                        <label for="price" class="text-light fonteLabel">Preço</label>
                        <input type="text" class="form-control" placeholder="Preço" name="price"><br>

                        <label for="type_equip" class="text-light fonteLabel">Nome do Equipamento</label>
                        <input type="text" class="form-control" placeholder="Nome do Equipamento" name="type_equip"><br>

                        <button type="submit" class="btn btn-light mx-auto d-block fonteLabel">Enviar</button>

                    </div>
                </div>
            </form>
        </div>
    </body>
</html>