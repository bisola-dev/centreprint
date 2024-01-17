<?php
require_once("conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['candid'])) {
    $candid = $_POST['candid'];

    // Validate $candid to ensure it's a valid integer
    if (!ctype_digit($candid)) {
        http_response_code(400);
        echo "Invalid request: Candid should be a valid integer.";
        exit;
    }

    // Update the database using prepared statement
    $query = "UPDATE euploads SET statuz = 1 WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $candid);

    if ($stmt->execute()) {
        echo "Success";
    } else {
        // Log the error on the server side
        error_log("Error updating record: " . $stmt->error);

        http_response_code(500); // Internal Server Error
        echo "Error updating record. Please try again later.";
    }

    $stmt->close();
} else {
    // Assuming you handle the error condition elsewhere
    if ($errorCondition) {
        $response['error'] = "File not found or another error occurred.";
        http_response_code(404); // Not Found or appropriate error code
    }
}
?>
