<?php
include('./dbconnection/db.php');

// Prepare and bind


// Get POST data




$itemsData = $_POST['items'];




foreach ($itemsData as $key => $value) {


    $item_serial_no = $value['item_serial_no'];
    $item_name = $value['item_name'];
    $item_qty = $value['item_qty'];
    $item_rate = $value['item_rate'];
    $item_total = $value['item_total'];
    $item_so_number = $value['item_so_number'];
    $created_by = $value['created_by'];
    $status = "SAVE";
    $item_images = $value['ImagePreview'];










    $stmt = $con->prepare("INSERT INTO lead_details_items (item_serial_no, item_name, item_qty, item_rate, item_total, item_so_number, created_by, status,item_images) VALUES (?, ?, ?, ?, ?, ?, ?, ? ,?)");
    $stmt->bind_param("ssiiissss", $item_serial_no, $item_name, $item_qty, $item_rate, $item_total, $item_so_number, $created_by, $status,$item_images);






    if ($stmt->execute()) {
        $response["success"] = true;
        $response["message"] = "Data inserted success fully ";
    } else {

        $response["success"] = false;
        $response["error"] = "Error: " . $stmt->error;
    }





}







// $item_serial_no = $_POST['item_serial_no'];
// $item_name = $_POST['item_name'];
// $item_qty = $_POST['item_qty'];
// $item_rate = $_POST['item_rate'];
// $item_total = $_POST['item_total'];
// $item_so_number = $_POST['item_so_number'];
// $created_by = $_POST['created_by'];
// $status = $_POST['status'];

// // Execute the statement
// if ($stmt->execute()) {
//     echo "New item added successfully";
// } else {
//     echo "Error: " . $stmt->error;
// }




$response["data"] = $_POST['items'];

// Close connections
$stmt->close();
$con->close();



echo json_encode($response)


    ?>