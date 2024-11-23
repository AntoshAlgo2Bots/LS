<?php

include('../dbconnection/db.php');

header('Content-Type: application/json'); // Set the response content type to JSON

$response = []; // Initialize a response array

date_default_timezone_set("Asia/Kolkata");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'get_price' && isset($_POST['item_name'])) {
            $itemName = $_POST['item_name'];

            // Escape the input to prevent SQL injection
            $itemName = mysqli_real_escape_string($con, $itemName);

            // SQL query to get the price
            $sql = "SELECT Price, imagePath FROM item_master_temp WHERE item_code = '$itemName'";

            // Execute the query
            $result = mysqli_query($con, $sql);

            // Check if the item exists and retrieve the price
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $response['success'] = true;
                $response['price'] = $row['Price'];
                // $response['imagePath'] = $row['imagePath'];
                $response['imagePath'] = '../images/' . $row['imagePath'];
            } else {
                $response['success'] = false;
                $response['message'] = "Price not found.";
            }

        } else {
            $response['success'] = false;
            $response['message'] = "Invalid action or item name.";
        }
    } else {
        $response['success'] = false;
        $response['message'] = "No action specified.";
    }
} else {
    $response['success'] = false;
    $response['message'] = "Invalid request method.";
}

// Send the JSON response back to the frontend
echo json_encode($response);
?>
