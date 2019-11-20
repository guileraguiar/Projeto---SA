<?php
/* Verifi login */
session_start();
if(!isset($SESSION["user"])){
    header("Location:index.php?pagina=menu");
}else{
    $userSession = $_SESSION['user'];
    $select = mysqli_query($conexao,"SELECT * FROM users WHERE u_user = '".$userSession["u_user"]."'");
    if($userSession['u_type'] != 2){
        header("Location:index.php?pagina=menu");
}else{
    
}

}
?>