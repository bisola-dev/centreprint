<?php  
$servername="localhost";
  $username="root";
  $password="";
  $dbname="uploadz";

// establishing connection with the server by passing servername, user_id, password and database name as the peremeters
  $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}
date_default_timezone_set('Africa/Lagos');
$dreg= date('M j, Y h:i a', time());
$dateform=date('Y-m-d', time());
$joyce=date('G:i');
$dkode=rand(1, 99999);

session_start();
?>

