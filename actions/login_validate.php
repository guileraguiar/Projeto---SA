<?php
    //conexao com o banco de dados 
    $emailUser = isset($_POST["email"])?($_POST["email"]):"";
    $User = isset($_POST["user"])?($_POST["user"]):"";
    $senhaUser = md5((isset($_POST["pass"])?($_POST["pass"]):""));

    $local = "localhost";
    $userRoot = "root";
    $passRoot = "";
    $db_name = "db_agonizingVillage";
    $conexao = mysqli_connect($local, $userRoot , $passRoot,$db_name) or die (mysqli_error()); 


    //configuração
    $link = "../pages/user/login_page.php";
    $msg = "Erro inesperado"; 
?>
<!-- redimensiona a pagina em 5 segunda (1000 milisegundos) caso login correto, ou incorreto-->
<!-- <html>
    <head>
        <title>autentication</title>
        <script type="text/javascript">

        function loginfailed(){
            setTimeout("window.location='../pages/user/login_page.php'",1000);
        }
        </script>
    </head>
    <body>
    </body>
</html>-->
<?php
    //consulta com o banco 
    if ((isset($_POST["user"]) && isset($_POST["pass"])) || isset($_SESSION["userLogado"])){
        if (isset($_POST["user"]) && isset($_POST["pass"])){
            $select = mysqli_query($conexao,"SELECT * FROM users WHERE u_user = '$User' AND u_pass = '$senhaUser'") or die(mysqli_error());
            if (mysqli_num_rows($select) != 0){
                if ($select = mysqli_fetch_assoc($select)){
                    $_SESSION["userLogado"] = $select['id_user'];
                    header("Location:login_validate.php");
                }else{
                    $msg = "Usuario ou senha incorretos!!";
                    header("Location: $link?msg=$msg");
                }
            }else{
                $msg = "Usuario ou senha incorretos!!";
                header("Location: $link?msg=$msg"); 
            }
        }else{
            $QueryLogado = mysqli_fetch_assoc(mysqli_query($conexao,"SELECT id_user, u_user, u_pass FROM users"));
            echo "Bem vindo <b>".$QueryLogado['u_user']."</b>";
        }
    }else{
        header('Location: ../menu.php');
    }

    mysqli_close($conexao);
  
?>