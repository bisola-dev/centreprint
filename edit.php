<?php 

require_once("conn.php");
$sessmail = $_SESSION['usmal'];
$sefulln= $_SESSION['fulln'];

if(empty($sessmail)){header("Location:adminlogout.php");}  

if (isset($_POST['edit'])){
   $crease=trim(strip_tags($_POST['crease3']));
   $dept = trim(strip_tags($_POST['dept3']));
   $clazz = trim(strip_tags($_POST['clazz3']));
   $ccode = trim(strip_tags($_POST['ccode3']));
   $ctitl = trim(strip_tags($_POST['ctitl3']));
   $sessn = trim(strip_tags($_POST['sessn3']));
   $seme = trim(strip_tags($_POST['seme3']));
   $exdate=trim(strip_tags($_POST['exdate']));
   $examstart=trim(strip_tags($_POST['examstart']));
   $examend=trim(strip_tags($_POST['examend']));}




if (isset($_POST['reg'])){
   $crease3m=trim(strip_tags($_POST['crease3']));
   $exdatem=trim(strip_tags($_POST['exdate']));
   $examstartm=trim(strip_tags($_POST['starttime']));
   $examendm=trim(strip_tags($_POST['examend']));

//echo  $examstartm.''.$examendm.''.$proposeddate;

   
  if($exdatem==""||$examstartm==""||$examendm=="") {
  $mes="<script type ='text/javascript'>alert('please do not submit empty form.')</script>";
      $ms="do not submit an empty form 
      ";}

 else {  
//echo $examstartm.''.$examendm.''.$exdatem;
 $new22 = "UPDATE courses SET starttime='$examstartm', endtime='$examendm', proposeddate='$exdatem' WHERE id = $crease3m" ;

  if (mysqli_query($conn, $new22)) { 
echo $mes="<script type='text/javascript'>
        alert('Details successfully updated');
        window.location.href='exam.php';
        </script>";}
 
else{
  echo $mes="<script type='text/javascript'>
        alert('Details unsuccessfully please retry');
         window.location.href='exam.php';
        </script>";
         





}
}
}

  



                                         

   //echo $dept3.''.$clazz3.''.$ctitl3.''.$ccode3;


?>

<!DOCTYPE html>
<html lang="en">
   
<!-- Mirrored from thememinister.com/crm/view-tsaction.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 13:28:46 GMT -->
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title> Edit Exam </title>
      <!-- Favicon and touch icons -->
      <link rel="shortcut icon" href="assets/dist/img/ico/favicon.png" type="image/x-icon">
      <!-- Start Global Mandatory Style
         =====================================================================-->
      <!-- jquery-ui css -->
      <link href="assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap -->
      <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap rtl -->
      <!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
      <!-- Lobipanel css -->
      <link href="assets/plugins/lobipanel/lobipanel.min.css" rel="stylesheet" type="text/css"/>
      <!-- Pace css -->
      <link href="assets/plugins/pace/flash.css" rel="stylesheet" type="text/css"/>
      <!-- Font Awesome -->
      <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
      <!-- Pe-icon -->
      <link href="assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
      <!-- Themify icons -->
      <link href="assets/themify-icons/themify-icons.css" rel="stylesheet" type="text/css"/>
      <!-- dataTables css -->
      <link href="assets/plugins/datatables/dataTables.min.css" rel="stylesheet" type="text/css"/>
      <!-- End Global Mandatory Style
         =====================================================================-->
      <!-- Start Theme Layout Style
         =====================================================================-->
      <!-- Theme style -->
      <link href="assets/dist/css/stylecrm.css" rel="stylesheet" type="text/css"/>
      <!-- Theme style rtl -->
      <!--<link href="assets/dist/css/stylecrm-rtl.css" rel="stylesheet" type="text/css"/>-->
      <!-- End Theme Layout Style
         =====================================================================-->
   </head>
   <body class="hold-transition sidebar-mini">
           <?php if (!empty($mes)){echo $ms;}?>
    <!--preloader-->
      <div id="preloader">
         <div id="status"></div>
      </div>
      <!-- Site wrapper -->
      <div class="wrapper">
         <header class="main-header">
            <a href="index-2.html" class="logo">
               <!-- Logo -->
               <span class="logo-mini">
               <img src="assets/dist/img/mini-logo.png" alt="">
               </span>
               <span class="logo-lg">
               <img src="assets/dist/img/logss.png" alt="">
               </span>
            </a>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top">
               <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                  <!-- Sidebar toggle button-->
                  <span class="sr-only">Toggle navigation</span>
                  <span class="pe-7s-angle-left-circle"></span>
               </a>
               <!-- searchbar-->
              
                     
                                    
            </nav>

         </header>
         <!-- =============================================== -->
         <aside class="main-side">
            <!-- sidebar -->
       <?php require_once('adminsidebar.php')?>
            <!-- /.sidebar -->
         </aside>
         <!-- =============================================== -->
         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-money"></i>
               </div>
               <div class="header-title">
                  <h1>EDIT EXAM TIME </h1>  <h4><b>Department:<?php echo $dept;?>, Class:<?php echo $clazz;?>, Course code:<?php echo $ccode;?>, Course title:<?php echo $ctitl;?>, Session:<?php echo $sessn;?>, Semester:<?php echo $seme;?></h4></b>
                  
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="exam.php">
                                 <h4>Back</h4>
                              </a>
                           </div>
                        </div>
                  

                           <form method="post" action="">
                            <div class="form-group ">
                                
                                     <div class="form-group ">
                                    <label>Exam Date </label>
                                    <input type="hidden"  id="username" class="form-control" name="crease3"
                                  value= "<?php echo $crease;?>" >

                                    <input type="date"  id="username" class="form-control" name="exdate" value="<?php echo $exdate;?>" >
                                     </div>

                                     <div class="form-group ">
                                    <label>Exam Time start </label>
                                    <input type="time"  id="username" class="form-control" name="starttime" value="<?php echo $examstart;?>">
                                     </div>
                                      
                                      <div class="form-group ">
                                    <label>Exam Time end </label>
                                    <input type="time"  id="username" class="form-control" name="examend" value="<?php echo $examend;?>" >
                                     </div>


                                <div class="form-group ">
                               <input type= "submit"  name="reg" value="UPDATE"> <br>
                                <br>

</form>
 </div>
                                 </tbody>
                              </table>       
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
         <footer class="main-footer">
            <strong>Copyright &copy;2020 <a href="#">CITM</a>.</strong> All rights reserved.
         </footer>
      </div>
      <!-- ./wrapper -->
      <!-- Start Core Plugins
         =====================================================================-->
      <!-- jQuery -->
      <script src="assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
      <!-- jquery-ui --> 
      <script src="assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>
      <!-- Bootstrap -->
      <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      <!-- lobipanel -->
      <script src="assets/plugins/lobipanel/lobipanel.min.js" type="text/javascript"></script>
      <!-- Pace js -->
      <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
      <!-- table-export js -->
      <script src="assets/plugins/table-export/tableExport.js" type="text/javascript"></script>
      <script src="assets/plugins/table-export/jquery.base64.js" type="text/javascript"></script>
      <script src="assets/plugins/table-export/html2canvas.js" type="text/javascript"></script>
      <script src="assets/plugins/table-export/sprintf.js" type="text/javascript"></script>
      <script src="assets/plugins/table-export/jspdf.js" type="text/javascript"></script>
      <script src="assets/plugins/table-export/base64.js" type="text/javascript"></script>
      <!-- dataTables js -->
      <script src="assets/plugins/datatables/dataTables.min.js" type="text/javascript"></script>
      <!-- SlimScroll -->
      <script src="assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
      <!-- FastClick -->
      <script src="assets/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
      <!-- CRMadmin frame -->
      <script src="assets/dist/js/custom.js" type="text/javascript"></script>
      <!-- End Core Plugins
         =====================================================================-->
      <!-- Start Theme label Script
         =====================================================================-->
      <!-- Dashboard js -->
      <script src="assets/dist/js/dashboard.js" type="text/javascript"></script>
      <!-- End Theme label Script
         =====================================================================-->

   </body>

<!-- Mirrored from thememinister.com/crm/view-tsaction.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 13:28:46 GMT -->
</html>

