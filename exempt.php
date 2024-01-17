<?php
session_start();

$sematric = $_SESSION['matricno'] ;
      $sefullnn = $_SESSION['fulln'];
      $seexam= $_SESSION['exam'];
     
session_destroy();
header("Location:index.php");
exit;

  
?>