<?php
//require_once('connection.php');


require_once("conn.php");


if (isset($_POST['register'])){
   
   $fulln = trim(strip_tags($_POST['fulln']));
   $matricno = trim(strip_tags($_POST['matno']));
   $exam = trim(strip_tags($_POST['exam']));

   

  
  if($matricno == "" || $fulln == "" || $exam == "") {
  $mes="<script type ='text/javascript'>alert('please do not submit empty form.')</script>";
      $ms="do not submit an empty form 
      ";}



    else if (strlen($matricno)>18){
                 $mes='<script type="text/javascript">
        alert("The matric number in incorrect, please enter correctly.");
        </script>';

         $ms = "The matric number in incorrect, please enter correctly.";} 
        


 else {

      $sematric = $_SESSION['matricno'] = $matricno;
      $sefullnn = $_SESSION['fulln']=$fulln;
      $seexam= $_SESSION['exam']=$exam;
      $seclazz= $_SESSION['clazz']=$clazz;
     

         header("Location: uploadexam.php");

            
}

    

}



?>






<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from thememinister.com/crm/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 13:29:02 GMT -->
<head>
        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Centre Print</title>
        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/dist/img/ico/favicon.png" type="image/x-icon">
        <!-- Bootstrap -->
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <!-- Bootstrap rtl -->
        <!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
         <!-- Pe-icon-7-stroke -->
        <link href="assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
        <!-- style css -->
        <link href="assets/dist/css/stylecrm.css" rel="stylesheet" type="text/css"/>
        <!-- Theme style rtl -->
        <!--<link href="assets/dist/css/stylecrm-rtl.css" rel="stylesheet" type="text/css"/>-->
    </head>
    <body>
        <?php if (!empty($mes)){echo $mes;}?>
        <!-- Content Wrapper -->
        <div class="login-wrapper">
            <div class="back-link">
                <a href="adminlogin.php" class="btn btn-add">Admin Log in</a>
            </div>
            <div class="container-center lg">
             <div class="login-area">
                <div class="panel panel-bd panel-custom">
                    <div class="panel-heading">
                        <div class="view-header">
                            <div class="header-icon">
                                <i class="pe-7s-unlock"></i>
                            </div>
                            <div class="header-title">
                                <h3>Register</h3>
                                <small><strong>Please enter your data correctly.</strong></small>
                                <?php if (!empty($ms)){echo'<h4>'.$ms.'</h4>';}?>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form method="POST"  action="" >
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label>Full Name</label>
                                    <input type="text" value="" id="email" class="form-control" name="fulln">
                                   
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Matric No</label>
                                    <input type="text" value="" id="username" class="form-control" name="matno">
                                  
                                </div>
                                                   
                               

                                 <div class="form-group col-lg-6"  >
                                    <label>Course</label>
                                    <select class="form-control" name="exam">
                                         <option value="">click to select </option>  
          <?php $queryt = mysqli_query($conn,"SELECT * FROM courses");
        while ($row=mysqli_fetch_assoc($queryt)) {
                    $cuss = $row['ccode'];
                    $clazz = $row['clazz'];
                    
 
  ?>

                                    <option value="<?php echo $cuss;?>"><?php echo $cuss;?></option> 
                                      <?php } ?>

                                    
                                  </select>
                                      <br>


                                  
                            <div>
                                <button type="submit" name="register" class="btn btn-add ">Continue</button><br><br>
                                
                            </div>
                            
                        </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
  
        <!-- /.content-wrapper -->
        <!-- jQuery -->
        <script src="assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
        <!-- bootstrap js -->
        <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    </body>

<!-- Mirrored from thememinister.com/crm/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 13:29:02 GMT -->
</html>
