<?php
session_start();
$sessmail = $_SESSION['usmal'];
$sefulln= $_SESSION['fulln'];

if(empty($sessmail)){header("Location:adminlogout.php");}  

?>
