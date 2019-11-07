<?php
session_start();

            include '../../includes/navbar.php';
            include '../../includes/header.php';
        ?>
<html>
    <body>
        <div class="container">   
            <form method="post">
                <div class="form-row">
                    <div class="col">    

                        <center><label for="armor" class="text-light fonteLabel">Armadura Adicional</label></center>
                        <input type="text" class="form-control" placeholder="Armadura" name="armor"><br>

                        <center><label for="attack" class="text-light fonteLabel">Poder de Ataque</label></center>
                        <input type="text" class="form-control" placeholder="Poder de ataque" name="attack"><br>
                        
                        <center><label for="life" class="text-light fonteLabel">Vida adicional</label></center>
                        <input type="text" class="form-control" placeholder="Vida Adicional" name="life"><br>

                        <center><label for="energy" class="text-light fonteLabel">Energia</label></center>
                        <input type="text" class="form-control" placeholder="Energia" name="energy"><br>

                        <center><label for="crit" class="text-light fonteLabel">Chance de Crítico</label></center>
                        <input type="text" class="form-control" placeholder="Chance de Crítico" name="crit"><br>

                        <center><label for="price" class="text-light fonteLabel">Preço</label></center>
                        <input type="text" class="form-control" placeholder="Preço" name="price"><br>

                        <button type="submit" class="btn btn-light mx-auto d-block fonteLabel">Enviar</button>

                    </div>
                </div>
            </form>
        </div>
    </body>
</html>