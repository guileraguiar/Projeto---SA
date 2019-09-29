<?php
session_start();
unset($_SESSION['userLogado']);
header('Location: ../menu.php');
?>