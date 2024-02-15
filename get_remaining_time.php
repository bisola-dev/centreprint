<?php

// Check if the 'id' parameter is set in the URL
if(isset($_GET['id'])) {
    // Get the value of the 'id' parameter from the URL
    $id = $_GET['id'];

    echo "ID received: " . $id . "\n";
    // Include the connection file
    require_once("conn.php");

    // Retrieve the updated end time from your database using the provided ID
    $query = "SELECT endtime FROM your_table WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        // Calculate the remaining time based on the updated end time
        $updatedEndTime = strtotime($row['endtime']);
        $currentTimestamp = strtotime($joyce);
        $remainingTime = max(0, $updatedEndTime - $currentTime); // Ensure remaining time is not negative

        // Debugging: Output intermediate values
        echo "Updated End Time: " . date('Y-m-d H:i:s', $updatedEndTime) . "\n";
        echo "Current Time: " . date('Y-m-d H:i:s', $currentTime) . "\n";
        echo "Remaining Time: " . $remainingTime . "\n";

        echo json_encode($remainingTime);
    } else {
        // If no record is found or any other error occurs, return an error message or appropriate value
        echo json_encode(null); // Return null or any other appropriate value
    }
} else {
    // If 'id' parameter is not set, return an error message or appropriate value
    echo json_encode(null); // Return null or any other appropriate value
}
?>

