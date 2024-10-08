<?php

require_once("conn.php");
require_once("pop.php");

if (isset($_POST['submit'])) {
    $targetDir = "docs/";
    $fileName = basename($_FILES["filelink"]["name"]);
    $fileName = $sefullnn . '' . $fileName;
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if (isset($_POST["submit"]) && !empty($_FILES["filelink"]["name"])) {
        if ($_FILES["filelink"]["size"] > 150000) {
            echo "<script type='text/javascript'>
                alert('Sorry, your file is too large, it should be less than 120kb.');
                  window.location.href='uploadexam.php';
                </script>";
        } else {
            // Allow certain file formats
            $allowTypes = array('doc', 'docx', 'pdf', 'xls', 'xlsx', 'ppt', 'pptx', 'txt', 'html', 'cdr', 'pub', 'pubx', 'mdb', 'accdb', 'pmd');
            if (in_array($fileType, $allowTypes)) {
                // Upload file to server
                if (move_uploaded_file($_FILES["filelink"]["tmp_name"], $targetFilePath)) {
                    // Insert image file name into database
                    $new = mysqli_query($conn, "INSERT INTO euploads (fulln, matno, courseid, filelink, dreg) VALUES('$sefullnn','$sematric','$seexam','$fileName','$dreg')");

                    echo "<script type='text/javascript'>
                            alert('Submission successful');
                            window.location.href='subsuccess.php';
                        </script>";
                }
            }
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
   
<!-- Mirrored from thememinister.com/crm/add-customer.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 13:28:08 GMT -->
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Upload Worksheet.</title>
      <!-- Favicon and touch icons -->
      <link rel="shortcut icon" href="assets/dist/img/ico/favicon.png" type="image/x-icon">
      <!-- Start Global Mandatory Style
         =====================================================================-->
      <!-- jquery-ui css -->
      <!-- Inside your HTML file -->
   
      <link href="assets/bootstrap/css/style.css" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap rtl -->
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

         <!-- Include your external JavaScript file -->
         <style>
    #countdown-timer {
        font-size: 24px;
        color: #FF5733; /* Red color, customize as needed */
        text-align: center;
        margin-top: 20px;
    }
</style>

   </head>
 
   <body class="hold-transition sidebar-mini">
 
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
              
                 <button type="button" class="close">×</button>
                
             </div>
             <div class="navbar-custom-menu">
                  <ul class="nav navbar-nav">
                     <!-- Orders -->
                     <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle admin-notification" data-toggle="dropdown"> 
                        <i class="pe-7s-cart"></i>
                        <span class="label label-primary">5</span>
                        </a>
                        <ul class="dropdown-menu">
                           <li>
                              <ul class="menu">
                                 <li >
                                    <!-- start Orders -->
                                    
                     <!-- Messages -->
                     <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="pe-7s-mail"></i>
                        <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                           <li>
                             
                     </li>
                     <!-- Tasks -->
                     <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="pe-7s-note2"></i>
                        <span class="label label-danger">6</span>
                        </a>
                        <ul class="dropdown-menu">
                           
               </div>
            </nav>
          </header>

         <!-- =============================================== -->
         <!-- Left side column. contains the sidebar -->
        <?php require_once("rsidebar.php") ?>
         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
      

            <!-- Content Header (Page header) -->
            <section class="content-header">
               
               <div class="header-title">


                  <h1>Dear <?php echo $sefullnn;?>, please upload your worksheet</h1> 
                  <small> Class: <?php echo $clazz; ?></small>,
                  <small> Department: <?php echo $dept; ?></small>,
                  <small>Course code : <?php echo $seexam;?> </small>,
                  <small> Matric no :<?php echo $sematric;?></small>,
                  <small> Semester: <?php echo $semeg;?></small>,
                  <small>session: <?php echo $sessny;?></small>.
               </div>


            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="text-center">
                        <div id="countdown-timer"></div>
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" method="POST" action="" enctype="multipart/form-data">
                              <div class="form-group">
                                 <label>Upload Exam sheets </label> 
                                 <input type="file" name="filelink" class="form-control" placeholder="please upload your your file" required>
                              </div>
 
                              <div>
                                <button type="submit" name="submit" class="btn btn-warning">UPLOAD</button>  
                             </div>

                              <div class="reset-button">
                              </div>
                                 
                              </div>

                           </form>

                   <div class="table-responsive">
               <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
               <thead>
              <tr class="info">
                <th>S/N</th>
                <th>FILE NAME</th>
                <th>DATE</th>
                <th>ACTION</th> <!-- Added column for action -->
            </tr>
        </thead>
        <tbody>
            <?php 
            $bisola = mysqli_query($conn, "SELECT * FROM euploads WHERE fulln='$sefullnn'");                         
            $count = 1;
            while ($row = mysqli_fetch_assoc($bisola)) {
                $id = $row['id'];
                $dreg = $row['dreg'];
                $fileName = $row['filelink'];
            ?>
            <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $fileName; ?></td>
                <td><?php echo $dreg; ?></td>
                <td>
                    <!-- Delete form -->
                    <form action="deleteRecord.php" method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record?');">Delete</button>
                    </form>
                </td>
            </tr>
            <?php $count++; } ?>
        </tbody>
    </table>
</div>
                           </div>
                        </div>
                     </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>


         <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function() {
    $('.delete-btn').on('click', function() {
        var button = $(this);
        var id = button.data('id');

        if (confirm('Are you sure you want to delete this record?')) {
            $.ajax({
                url: 'deleteRecord.php',
                type: 'POST',
                data: { id: id },
                success: function(response) {
                    // Check response if needed
                    if (response == 'success') {
                        button.closest('tr').remove(); // Remove the row from the table
                        alert('Record deleted successfully.');
                    } else {
                        alert('Failed to delete record.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error deleting record:", error);
                    alert("Error deleting record. Check the console for details.");
                }
            });
        }
    });
});
</script>


 
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
         <!-- Include your external JavaScript file -->
         
      <style>
    #countdown-timer {
      font-size: 24px;
        color: #FF5733; /* Red color */
        text-align: center;
        margin-top: 20px;
    }
</style>
<script type="text/javascript">
   // Retrieve remaining time from PHP session
   var remainingTime = <?php echo json_encode($_SESSION['remainingTime'] ?? 0); ?>;
   // Define alert time in seconds (15 minutes)
   var alertTime = 900; 
   // Define the updateTimer function
   function updateTimer() {
       // Calculate hours, minutes, and seconds
       var hours = Math.floor(remainingTime / 3600);
       var minutes = Math.floor((remainingTime % 3600) / 60);
       var seconds = remainingTime % 60;
       
       // Get timer element by ID
       var timerElement = document.getElementById('countdown-timer');
       
       // Update timer display
       timerElement.innerHTML = 'Remaining Time: ' + hours + 'h ' + minutes + 'm ' + seconds + 's';

       // Check if remaining time is greater than 0
       if (remainingTime > 0) {
           remainingTime--; // Decrement remaining time
           setTimeout(updateTimer, 1000); // Call updateTimer again after 1 second

           // Check if remaining time is equal to alert time
           if (remainingTime === alertTime) {
               // Show alert message
               alert('You have 15 minutes remaining! Please ensure you upload your files');
           }
       } else {
           // Time is up, redirect to specified URL
           console.log('Time is up!');
           alert('Time is up!');
           window.location.href = 'index.php';
       }
   }

   // Call updateTimer to start the countdown
   updateTimer();
</script>
