<?php
    require_once("conn.php");
     $sematric = $_SESSION['matricno'];
      $sefullnn = $_SESSION['fulln'];
      $seexam= $_SESSION['exam'];
      $seclazz= $_SESSION['clazz'];

?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from thememinister.com/crm/lockscreen.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 13:29:02 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Submission Successful</title>

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/dist/img/ico/favicon.png" type="image/x-icon">
        <!-- Bootstrap -->
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <!-- Bootstrap rtl -->
        <!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
        <!-- Font Awesome 4.7.0 -->
        <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- socicon css -->
        <link href="assets/socicon/social.css" rel="stylesheet" type="text/css"/>
        <!-- Theme style -->
        <link href="assets/dist/css/stylecrm.css" rel="stylesheet" type="text/css"/>
        <!-- Theme style rtl -->
        <!--<link href="assets/dist/css/stylecrm-rtl.css" rel="stylesheet" type="text/css"/>-->
    </head>
    <body>
        <!-- Content Wrapper -->
        <div class="lock-wrapper-page">
            
            <form method="post" action="uploadexam.php">
                <div class="user-thumb">
            
                    <img src="assets/dist/img/yct logo.jpeg" class="img-responsive img-circle img-thumbnail" alt="thumbnail">
                </div>
                <div class="form-group">
                    <h3>Dear <?php echo $sefullnn?>, you have successfully submitted your worksheet</h3>
                    <p class="text-muted"></p>
                    <div class="input-group m-t-20">
                        
                       
                        <span class="input-group-btn"> 
                            <button type="submit" class="btn btn-add">click here to go back to homepage</button> 
                        </span>
                    </div>
                </div>
                <div class="text-left">
                    <a href="exempt.php" class="btn btn-danger">log out here</a>
                </div>
            </form>
        </div>
        <!-- /.content-wrapper -->
        <!-- jQuery -->
        <script src="assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
        <!-- bootstrap js -->
        <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    </body>

<!-- Mirrored from thememinister.com/crm/lockscreen.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 13:29:02 GMT -->
</html>