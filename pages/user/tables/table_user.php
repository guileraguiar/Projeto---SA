<?php 
include '../actions/verify/verify_lvlAccess.php';
include '../actions/verify/verify_users.php';
?>
<img src="images/logo3.png" class="mx-auto d-block" alt="" height="200" width="200">
    <center>
        <div class="container fundobranco mb-5" style="margin-top: 50px;">
            <center>
                <h1 class="fonteLabel">Visualização de Usuários</h1>
            </center>
            <table class="table table-striped table-dark" border="1">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nível</th>
                        <th scope="col">Ação</th>
                    </tr>
                <tbody>
                <?php 
                $msgDel = (isset($_GET['msgDel'])) ? $_GET['msgDel'] : null;
                        if (isset($msgDel)) {
                            switch ($msgDel) {
                                case 1:
                                    $msg = "Usuário foi excluído com sucesso!";
                                    break;
                                case 2:
                                    $msg2 = "Não foi possível excluir este usuário!";
                                    break;
                            default:
                                $msg = "Selecione alguma opção!";
                                break;
                            }
                            if (isset($msg)){
                                echo "<center><div class='alert alert-success' role='alert'>
                                " . $msg . "
                                </div></center>";
                            }elseif(isset($msg2)){
                                echo "<center><div class='alert alert-danger' role='alert'>
                                " . $msg2 . "
                                </div></center>";
                            }
                        }
                       
                   
                    $busca = mysqli_query($conexao, "SELECT * FROM users");
                    $arrUser = mysqli_fetch_all($busca, MYSQLI_ASSOC);


                    foreach ($arrUser as $chave => $valor) {
                        echo "<tr>";
                        echo "<th>" . $valor["id_user"] . "</th>";
                        echo "<th>" . $valor["u_user"] . "</th>";
                        echo "<th>" . $valor["u_email"] . "</th>";
                        echo "<th>" . $valor["u_type"] . "</th>";
                        echo "<th>";
                        echo "<a href='../actions/tableDelete_val.php?codigo=". $valor['id_user'] ."&tipo=".$valor['u_type']."'>Excluir</a>";
                        echo "</th>";;
                        echo "</tr>";
                    }
                    mysqli_close($conexao);
                    ?>
                </tbody>
                </thead>
            </table>
        </div>
    </center>