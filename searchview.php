<?php 
require_once("conn.php");
if (isset($_POST['reg'])){
    $lame = mysqli_escape_string($conn,trim(strip_tags($_POST['lame'])));       
}

$queryx = mysqli_query($conn, "SELECT * FROM  euploads WHERE fulln LIKE '%$lame%'");
 
 $tammy=mysqli_num_rows($queryx);

 if($tammy==0){
 echo "<script type ='text/javascript'>
   alert('Search not found')
   </script>";


   //{header('Location:searchstudent.php');
 
 }


?>
<!DOCTYPE html>
<html lang="en">
   
<!-- Mirrored from thememinister.com/crm/view-tsaction.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 13:28:46 GMT -->
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>SEARCH RESULT <?php echo $lame;?></title>
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
      
      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>

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
       <?php if (!empty($reportalert)){echo $reportalert;}?>
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
               <img src="assets/dist/img/mini-log.png" alt="">
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
         <!-- Left side column. contains the sidebar -->
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
                  <h1>SEARCH RESULT "<?php echo $lame;?>"</h1>
                 
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
                                 
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">

                        <form method="post" action="">
                            <div class="form-group ">
                                <label>Search by name</label>
                                 <input type="text"  id="username" class="form-control" name="lame">
                                 </div>

                              <div class="form-group ">
                               <input type= "submit"  name="reg" value="Search Now"> <br>
                                <br>
                               </form>
                               </div>


                        <div class="btn-group">
                        <style>
                        #downloadResultsBtn {font-weight: bold;
            margin-top: 8px;
            margin-bottom:8px; }</style>
        <div class="btn-group">
   <button id="downloadResultsBtn" style="font-weight: bold;">Download selection</button>
</div></div>



                           <!-- ./Plugin content:powerpoint,txt,pdf,png,word,xl -->
                               <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>S/N</th>
                                       <th>FULLNAME</th>
                                       <th>MATRIC NO</th>
                                       <th>COURSE ID </th>
                                       <th>DATE OF REGISTRATION</th>
                                       <th>EXAM SHEET</th>
                                       <th>PRINT STATUS</th>

                                    </tr>
                                 </thead>
                                 <tbody>

                                    <?php $count = 1;
                                    while ($row = mysqli_fetch_assoc($queryx)) {
                                  
                                       $candid = $row['id'];
                                       $fulln = $row['fulln'];
                                       $matricno = $row['matno'];
                                       $courseid=$row['courseid'];
                                       $examsheet = $row['filelink'];
                                       $statuz = $row['statuz'];
                                       $fileURL1 = "docs/".$examsheet;
                                       $dreg = $row['dreg'];
                                       $downloadLinkId = "downloadLink" . $count;
                                    ?>
                                      
                              
                                    <tr>
                                       <th><?php echo $count;?></th>
                                       <th><?php echo $fulln;?></th>
                                       <th><?php echo $matricno;?></th>
                                       <th><?php echo $courseid; ?></th>
                                       <th><?php echo $dreg; ?></th>
                                       <th>
                                       <button>
                                       <a href="<?php echo $fileURL1; ?>" class="btn btn-primary downloadLink" data-candid="<?php echo $candid;?>"
                             download>Download</a></th>
                          
                             <th>
                                        <?php
                                          if ($statuz == 0) {
                                          $button = "NOT-PRINTED";
                                           $bname = "unprinted";
                                            $bcolour = "danger";
                                            $pstate = 0;
                                            } else {
                                         $button = "PRINTED";
                                          $bname = "printed";
                                          $bcolour = "success";
                                         $pstate = 1;
                                          }
        
                                         ?>
                                  
                            <button type="button" class="btn btn-<?php echo $bcolour; ?>"><?php echo $button; ?></button></th>
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

       
    
            <script>
   function downloadAttendance() {
      // Get table data
      var table = document.getElementById('dataTableExample1');

      // Specify the column indices you want to exclude
      var excludedColumns = [5, 6]; // Adjust the column indices as needed

      // Create a sheet with all columns excluding the specified ones
      var sheetData = [];
      var rows = table.rows;

      for (var i = 0; i < rows.length; i++) {
         var rowData = [];
         for (var j = 0; j < rows[i].cells.length; j++) {
            // Only include if the column index is not in the excluded list
            if (!excludedColumns.includes(j)) {
               rowData.push(rows[i].cells[j].innerText);
            }
         }
         sheetData.push(rowData);
      }

      // Create a workbook
      var wb = XLSX.utils.book_new();
      var sheet = XLSX.utils.aoa_to_sheet(sheetData);
      XLSX.utils.book_append_sheet(wb, sheet, 'Sheet1');

      // Save the workbook to a file
      XLSX.writeFile(wb, 'studentlist.xlsx');
   }

   // Attach the function to the button click event
   $(document).ready(function() {
      $('#downloadResultsBtn').on('click', function() {
         downloadAttendance();
      });
   });
</script>



<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function() {
    $('.downloadLink').on('click', function(e) {
        e.preventDefault(); // Prevent the default download behavior

        // Get the candidate ID from the data attribute
        var candid = $(this).data('candid');

        // Store the download link in a variable
        var downloadLink = $(this).attr('href');

        // Attempt to download the file
        $.ajax({
            url: downloadLink, // Use the download link directly
            method: 'GET',
            success: function(data) {
                // If the download is successful, update the database using AJAX
                $.ajax({
                    url: 'updateStatus.php',
                    method: 'POST',
                    data: { candid: candid },
                    success: function(response) {
                        // If the update is successful, trigger the download
                        window.location.href = downloadLink;
                        
                        // Alert messages
                        alert("File downloaded successfully and Print status changed!");

                        // Refresh the page after a short delay (adjust the delay as needed)
                        setTimeout(function() {
                            location.reload();
                        }, 1000); // 1000 milliseconds = 1 second
                    },
                    error: function(xhr, status, error) {
                        console.error("Error updating print status:", error);
                        alert("Error updating print status. Check the console for details.");
                    }
                });
            },
            error: function(xhr, status, error) {
                // If the download fails, show an error message
                console.error("Error downloading file:", error);
                alert("Error downloading file. Check the console for details.");
            }
        });
    });
});
</script>


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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
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

