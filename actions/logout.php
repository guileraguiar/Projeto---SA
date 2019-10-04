<?php
session_start();
$userSession= $_SESSION['user'];
if (isset($_SESSION['user']));
session_destroy();
header('Location: ../menu.php');
?>