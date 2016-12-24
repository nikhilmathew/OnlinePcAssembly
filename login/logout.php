<?php
session_start();
$_SESSION['user']='guest';
session_destroy();
header("Location:../pages/index.php");
?>