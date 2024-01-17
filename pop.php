<?php 

require_once("conn.php");


$sematric = $_SESSION['matricno'];
$sefullnn = $_SESSION['fulln'];
$seexam = $_SESSION['exam'];
$seclazz = $_SESSION['clazz'];

$squat = mysqli_query($conn, "SELECT * FROM courses WHERE ccode ='$seexam'");
while ($row = mysqli_fetch_assoc($squat)) {
    $clazz = $row['clazz'];
    $dept = $row['dept'];
    $sessny = $row['sessn'];
    $semeg = $row['seme'];
    $starttime = $row['starttime'];
    $endtime = $row['endtime'];
    $proposeddate = $row['proposeddate'];

    $remainingTime = strtotime($endtime) - strtotime($joyce);

    if ($dateform != $proposeddate) {
        $reportalert = "This exam is not scheduled for today";
        echo "<script type ='text/javascript'>
            alert('This exam is not scheduled for today.');
            window.location.href='index.php';
        </script>";
    } elseif ($starttime > $joyce) {
        $reportalert = "This is not the scheduled time for this exam, please check back later";
        echo "<script type ='text/javascript'>
            alert('This is not the scheduled time for this exam, please check back later');
            window.location.href='index.php';
        </script>";
    } elseif ($remainingTime <= 0) {
        // Exam has already ended
        echo "<script type='text/javascript'>
                alert('You can no longer attempt this exam. This exam has already ended.');
                window.location.href='index.php';
            </script>";
    } elseif ($remainingTime <= 600 && $remainingTime > 0) {
        // Less than or equal to 10 minutes remaining
        $minutesLeft = ceil($remainingTime / 60); // Round up to the nearest minute

   
 
    }
}
?>

       