<?php
include('./dbconnection/db.php');

date_default_timezone_set("Asia/Kolkata");
session_start();
// Prepare and bind

// Get POST data
$itemsData = isset($_POST['items']) ? $_POST['items'] : [];
$record_id = isset($_POST['recordNumber']) ? $_POST['recordNumber'] : null;

$response = [
    "success" => false,
    "message" => "",
    "data" => [],
    "postItems" => $_POST
];

// Check if itemsData is empty
if (empty($itemsData)) {
    $response["message"] = "No items to process.";
    echo json_encode($response);
    exit;
}

foreach ($itemsData as $value) {
    // Extracting item data safely
    $item_serial_no = $value['item_serial_no'] ?? null;
    $item_name = $value['item_name'] ?? null;
    $item_qty = $value['item_qty'] ?? null;
    $item_rate = $value['item_rate'] ?? null;
    $item_total = $value['item_total'] ?? null;
    $item_so_number = $value['item_so_number'] ?? null;
    $created_by =$_SESSION['username'] ;
    $status = "SAVE";
    $item_images = $value['ImagePreview'] ?? null;

    // Prepare the statement
    $stmt = $con->prepare("INSERT INTO lead_details_items (item_serial_no, item_name, item_qty, item_rate, item_total, item_so_number, created_by, status, item_images, record_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiiissssi", $item_serial_no, $item_name, $item_qty, $item_rate, $item_total, $item_so_number, $created_by, $status, $item_images, $record_id);

    // Execute the statement
    if ($stmt->execute()) {
        $response["success"] = true;
        $response["message"] = "Data inserted successfully";
    } else {
        $response["success"] = false;
        $response["message"] = "Error: " . $stmt->error;
    }

    // Collect inserted data for response
    $response["data"][] = [
        'item_serial_no' => $item_serial_no,
        'item_name' => $item_name,
        'item_qty' => $item_qty,
        'item_rate' => $item_rate,
        'item_total' => $item_total,
        'item_so_number' => $item_so_number,
        'created_by' => $created_by,
        'status' => $status,
        'item_images' => $item_images,
        'record_id' => $record_id,
    ];
}

// Close connections
$stmt->close();
$con->close();

// Return response
echo json_encode($response);
?>
