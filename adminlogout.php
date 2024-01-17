<?php



session_start();

$sessmail = $_SESSION['usmal'];
$sefulln= $_SESSION['fulln'];
session_destroy();
header("Location:adminlogin.php");
exit;

  
?>


