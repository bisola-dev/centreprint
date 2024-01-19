<?php 

require_once("conn.php");
$sessmail = $_SESSION['usmal'];
$sefulln= $_SESSION['fulln'];

if(empty($sessmail)){header("Location:adminlogout.php");} 

date_default_timezone_set('Africa/Lagos');
$dreg= date('M j, Y h:i a', time());


if(isset($_POST["delete"])){
 $crease=trim(strip_tags($_POST['crease3']));
 echo $crease;

$sql = "DELETE FROM courses WHERE id  IN ($crease)";

 if($conn->query($sql) === TRUE){ 
  echo $mes='<script type="text/javascript">
        alert("Course successfully deleted.");
        </script>';
         $ms = "Course successfully deleted. ";

} else {
    echo "Error deleting record: " . $mysqli->error; 
}

}




if (isset($_POST['reg'])){
   $dept = trim(strip_tags($_POST['dept']));
   $clazz = trim(strip_tags($_POST['clazz']));
   $ccode = trim(strip_tags($_POST['ccode']));
   $ctitl = trim(strip_tags($_POST['ctitl']));
   $sessn = trim(strip_tags($_POST['sessn']));
   $seme = trim(strip_tags($_POST['seme']));
   $exdate=trim(strip_tags($_POST['exdate']));
   $starttime=trim(strip_tags($_POST['starttime']));
   $endtime=trim(strip_tags($_POST['endtime']));

   //echo $dept.''.$clazz.''.$ccode.''.$ctitl.''.$exdate.''.$starttime.''.$endtime;

$query2 = mysqli_query($conn, "SELECT * FROM courses WHERE ccode ='$ccode'|| sessn='sessn'");
$num_rows = mysqli_num_rows($query2);

  if($dept == "" ||$clazz == "" ||$ccode== "" ||$ctitl == "" ||$sessn == "" ||$seme == ""||$exdate==""||$starttime==""||$endtime=="") {
  $mes="<script type ='text/javascript'>alert('please do not submit empty form.')</script>";
      $ms="do not submit an empty form 
      ";

 }


else if ($num_rows > 0){ 
// do not insert
echo $session_error = "<script type ='text/javascript'>
                     alert('Either the course or session has already been saved');
                      window.location.href='exam.php';
                         </script>";}



 
 else { 

 $new22 = "INSERT INTO courses (dept,clazz,ccode,ctitl,sessn,seme,starttime,endtime,proposeddate) VALUES('$dept','$clazz','$ccode','$ctitl','$sessn','$seme','$starttime','$endtime','$exdate')";


if (mysqli_query($conn, $new22)) {
 echo $mes="<script type='text/javascript'>
        alert('Courses successfully saved');
        window.location.href='exam.php';
        </script>";}




else{
   echo $mes='<script type="text/javascript">
        alert("Course unadded please retry.");
        </script>';




}
}
  
}





// sql to delete a recordDELETE FROM `movies` WHERE `movie_id`  IN (20,21);
 
                                         

   


?>
<!DOCTYPE html>
<html lang="en">
   
<!-- Mirrored from thememinister.com/crm/view-tsaction.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 13:28:46 GMT -->
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Exam </title>
      <!-- Favicon and touch icons -->
      <link rel="shortcut icon" href="assets/dist/img/ico/favicon.png" type="image/x-icon">
      <!-- Start Global Mandatory Style
         =====================================================================-->
      <!-- jquery-ui css -->
      <!-- Inside your HTML file -->
          <link rel="stylesheet" type="text/css" href="assets/css/style.css">

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
                  <h1>EXAMLIST</h1>
                  <small>Add and Delete courses.</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                      
                              <a href="#">
                                 <h4>ADD/DELETE COURSES</h4>
                              </a>
                           </div>
                        </div>
                           <form method="post" action="">
                            <div class="form-group ">
                                <label>Department</label>
                                    <input type="text"  id="username" class="form-control" name="dept">
                                       </div>
                                  
                                   <div class="form-group ">
                                  <label> Class </label>
                                    <input type="text"  id="username" class="form-control" name="clazz">
                                    </div>

                                 <div class="form-group ">
                                    <label>Course code </label>
                                    <input type="text"  id="username" class="form-control" name="ccode">
                                    </div>

                                    <div class="form-group ">
                                    <label>Course Title </label>
                                    <input type="text"  id="username" class="form-control" name="ctitl">
                                    </div>

                                     <div class="form-group ">
                                    <label>Session </label>
                                    <input type="text"  id="username" class="form-control" name="sessn" >
                                     </div>

                                   <div class="form-group ">
                                    <label>Semester </label>
                                    <input type="text"  id="username" class="form-control" name="seme" >
                                     </div>

                                     <div class="form-group ">
                                    <label>Exam Date </label>
                                    <input type="date"  id="username" class="form-control" name="exdate" >
                                     </div>

                                     <div class="form-group ">
                                    <label>Exam Time start </label>
                                    <input type="time"  id="username" class="form-control" name="starttime" >
                                     </div>
                                      
                                      <div class="form-group ">
                                    <label>Exam Time end </label>
                                    <input type="time"  id="username" class="form-control" name="endtime" >
                                     </div>


                                <div class="form-group ">
                               <input type= "submit"  name="reg" value="Submit course"> <br>
                                <br>

</form>
 </div>


                           <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>S/N</th>
                                       <th>DEPARTMENT</th>
                                       <th>CLASS</th>
                                       <th>COURSE CODE</th>
                                       <th>COURSE TITLE</th>
                                       <th>SESSION</th>
                                       <th>SEMESTER</th>
                                       <th>VIEW</th>
                                       <th>EXAM DATE</th>
                                       <th>EXAM STARTTIME</th>
                                       <th>EXAM ENDTIME</th>
                                       <th>EDIT EXAM TIME</th>
                                       <th>REMOVE EXAM</th>
                                       
                                    </tr>
                                 </thead>
                                 <tbody>

 <?php 
            $bisola = mysqli_query($conn, "SELECT * FROM courses ORDER BY ccode ASC");                          $count = 1;
                                    while ($row = mysqli_fetch_assoc($bisola)) {
                                       $crease = $row['id'];
                                       $dept = $row['dept'];
                                       $clazz = $row['clazz'];
                                       $ccode = $row['ccode'];
                                       $ctitl = $row['ctitl'];
                                       $sessn = $row['sessn'];
                                       $seme = $row['seme'];
                                       $exdate = $row['proposeddate'];
                                       $examstart = $row['starttime'];
                                       $examend = $row['endtime'];

                                    ?>
                                       
                                    <tr>
                                       <td><?php echo $count;?></td>
                                       <td><?php echo $dept;?></td>
                                       <td><?php echo $clazz;?></td>
                                       <td><?php echo $ccode;?></td>
                                       <td><?php echo $ctitl;?></td>
                                       <td><?php echo $sessn;?></td>
                                       <td><?php echo $seme;?></td>
                                       <td><form method="POST" action="view.php" >
<input type="hidden"  value= "<?php echo $crease;?>" name="crease2">
<input type="hidden"  value= "<?php echo $dept;?>" name="dept2">
<input type="hidden"  value= "<?php echo $sessn;?>" name="sessn2">
<input type="hidden"  value= "<?php echo $ccode;?>" name="ccode2">
<p><input type="submit" name="view" value="View Submitted"></p>
 
 </form></td>



                                      <td><?php echo $exdate;?></td>
                                       <td><?php echo $examstart;?></td>
                                       <td><?php echo $examend;?></td>

                                       <td><form method="POST" action="edit.php" >
<input type="hidden"  value= "<?php echo $crease;?>" name="crease3">
<input type="hidden"  value= "<?php echo $seme;?>" name="seme3">
<input type="hidden"  value= "<?php echo $ctitl;?>" name="ctitl3">
<input type="hidden"  value= "<?php echo $clazz;?>" name="clazz3">
<input type="hidden"  value= "<?php echo $dept;?>" name="dept3">
<input type="hidden"  value= "<?php echo $sessn;?>" name="sessn3">
<input type="hidden"  value= "<?php echo $ccode;?>" name="ccode3">
<input type="hidden"  value= "<?php echo $exdate;?>" name="exdate">
<input type="hidden"  value= "<?php echo $examstart;?>" name="examstart">
<input type="hidden"  value= "<?php echo $examend;?>" name="examend">
<p><input type="submit" name="edit" value="EditExamTime"></p>

</form> 

 <td><form method="POST" action="">
<input type="hidden"  value= "<?php echo $crease;?>" name="crease3">
<p><input type="submit" name="delete" value="delete course"> </p>
 
 </form></td>
                                    </tr>
                                    <?php $count++;} ?> 
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
            <strong>Copyright &copy;<?php echo date('Y');?> <a href="#">CITM</a>.</strong> All rights reserved.
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

