<?php
include('./dbconnection/db.php');

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO items (item_serial_no, item_name, item_qty, item_rate, item_total, item_so_number, created_by, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssiiisss", $item_serial_no, $item_name, $item_qty, $item_rate, $item_total, $item_so_number, $created_by, $status);

// Get POST data
$item_serial_no = $_POST['item_serial_no'];
$item_name = $_POST['item_name'];
$item_qty = $_POST['item_qty'];
$item_rate = $_POST['item_rate'];
$item_total = $_POST['item_total'];
$item_so_number = $_POST['item_so_number'];
$created_by = $_POST['created_by'];
$status = $_POST['status'];

// Execute the statement
if ($stmt->execute()) {
    echo "New item added successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>
