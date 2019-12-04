<?php
/* Verifi login */
if (!isset($_SESSION["user"])) {
    header("Location:index.php?pagina=menu");
} 
if(isset($_SESSION["user"])){
    $userSession = $_SESSION['user'];
    $select = mysqli_query($conexao, "SELECT * FROM users WHERE u_user = '" . $userSession["u_user"] . "'");
    if ($userSession['u_type'] ==1) {
        header("Location:index.php?pagina=menu");
    }
}
?>