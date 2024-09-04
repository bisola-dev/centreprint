<?php
require_once("conn.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    
    if ($id) {
        // Perform the delete operation
        $query = "DELETE FROM euploads WHERE id = ?";
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param('i', $id);

            if ($stmt->execute()) {
                $message = 'File successfully deleted';
            } else {
                $message = 'Error executing statement: ' . $stmt->error;
            }

            $stmt->close();
        } else {
            $message = 'Error preparing statement: ' . $conn->error;
        }
    } else {
        $message = 'Invalid ID';
    }

    // Close the database connection
    $conn->close();

    // Output JavaScript for alert and redirection
    echo "<script type='text/javascript'>
            alert('" . addslashes($message) . "');
            window.location.href = 'uploadexam.php';
          </script>";
} else {
    // Output JavaScript for alert and redirection when request method is not POST
    echo "<script type='text/javascript'>
            alert('Invalid request method');
            window.location.href = 'uploadexam.php';
          </script>";
}

?>
